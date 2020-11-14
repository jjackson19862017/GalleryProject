<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password','first_name','last_name','user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public $tmp_path;
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
            $this->user_image = basename($file['name']);  // Basename cleans up the incoming user_image
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }
    } // End set_file


    public function save_user_and_image() {

        if($this->id) {
            // If the ID is present run update
            $this->update();
        } else {
            if(!empty($this->errors)) {
                return false; // This means we have an error.
            }

            if(empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }

            $target_path = IMAGES_PATH . DS . $this->user_image;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_image} already exists";
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

    public function image_path_and_placeholder() {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image ;
    }
   

    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * from " . self::$db_table . " WHERE ";
        $sql.= "username = '{$username}' ";
        $sql.= "AND password = '{$password}' ";
        $sql.= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false ; 
    }

    public function delete_user() {
        if($this->delete()) {
            $target_path = IMAGES_PATH . DS . $this->user_image;
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

}
?>