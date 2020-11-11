<?php 

class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title','description','filename','type','size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK          =>"There was no error",
        UPLOAD_ERR_INI_SIZE    =>"There is error in ini size",
        UPLOAD_ERR_FORM_SIZE   =>"There is error in form size",
        UPLOAD_ERR_PARTIAL     =>"The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE     =>"There is no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR  =>"There is missing a temporary folder ",
        UPLOAD_ERR_CANT_WRITE  =>"Filed to write file to disk",
        UPLOAD_ERR_EXTENSION   =>"A php extension stopped the file upload"
      );
      
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

    public function save() {

        if($this->photo_id) {
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

            $target_path = IMAGES_PATH;
            
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
    }
} // End of Photo Class
?>