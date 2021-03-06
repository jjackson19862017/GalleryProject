<?php

class Comment extends Db_object {

    protected static $db_table = "comments";
    protected static $db_table_fields = array('photo_id','author','body');
    public $id;
    public $photo_id;
    public $author;
    public $body;

    public static function create_comment($photo_id, $author, $body) {
        // Make sure nothings not empty.
        if(!empty($photo_id) && !empty($author) && !empty($body)) {
            $comment = new Comment();

            $comment->photo_id  = (int)$photo_id; // Makes sure the value is an integer.
            $comment->author    = $author;
            $comment->body      = $body;
            
            return $comment;
            $session->message("The comment has been created!");

        }   else {
            $session->message("Comment Failed.");
            return false;
        }
    } // End of create_comment

    public static function find_the_comments($photo_id) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql.= " WHERE photo_id = " . $database->escape_string($photo_id);
        $sql.= " ORDER BY photo_id ASC ";

        return self::find_by_query($sql);
    }








} // End of Comment Class
?>