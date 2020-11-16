<?php 

class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title','caption','description','filename','alt_text','type','size', 'user_id');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alt_text;
    public $type;
    public $size;
    public $user_id;

    public $tmp_path;
    public $upload_directory = "images";
    
      
    // This is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file) {

        // Checking if empty
        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else { // If there are no errors then set the following variables 
            $this->filename = basename($file['name']);  // Basename cleans up the incoming filename
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

        }
    } // End set_file

    public function picture_path() {
        return $this->upload_directory.DS.$this->filename;
    }

    public function save() {

        if($this->id) {
            // If the ID is present run update
            $this->update();
        } else {
            if(!empty($this->errors)) {
                return false; // This means we have an error.
            }

            if(empty($this->filename) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }

            $target_path = IMAGES_PATH . DS . $this->filename;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)) { 
                // If the ID isnt present run create
                if( $this->create()) {
                    unset($this->tmp_path);
                    return true;
                } else {
                    $this->errors[] = "The file directory was not writeable.";
                    return false;
                }
            }
        }
    } // End of Save Class

    public function delete_photo() {
        if($this->delete()) {
            $target_path = IMAGES_PATH . DS . $this->filename;
            return unlink($target_path) ? true : false;
            $session->message("Photo Deleted");
        } else {
            return false;
        }
    }
    
    public static function display_sidebar_data($photo_id)
    {
        $photo = Photo::find_by_id($photo_id);

        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
		$output .= "<p>{$photo->filename}</p>";
		$output .= "<p>{$photo->type}</p>";
		$output .= "<p>{$photo->size}</p>";

		echo $output;

    }


} // End of Photo Class
?>