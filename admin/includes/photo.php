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
        UPLOAD_ERR_OK          =>"there is no error",
        UPLOAD_ERR_INI_SIZE    =>"there is erron in ini size",
        UPLOAD_ERR_FORM_SIZE   =>"there is error in form size",
        UPLOAD_ERR_PARTIAL     =>"the uploaded file was oly partially uploaded",
        UPLOAD_ERR_NO_FILE     =>"there is no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR  =>"there is missing a temporary folder ",
        UPLOAD_ERR_CANT_WRITE  =>"filed to write file to disk",
        UPLOAD_ERR_EXTENSION   =>"a php extension stopped the file upload"
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
            $this->tmp_path = $file['tmp_path'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }

        
    }




} // End of Photo Class
?>