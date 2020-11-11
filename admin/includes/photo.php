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
    public $custom_errors = array();
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
      




} // End of Photo Class
?>