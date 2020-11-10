<?php

class User {


    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = self::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation($the_record){
        $the_object = new self;

        // This loops through the query and fills it with different attributes
        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        // This saves us writing out each column in the database
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }





    // Create the Querys to be made into Objects.



    public static function find_all_users() {
      return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
        // if(!empty($the_result_array)) {
        //     $first_item = array_shift($the_result_array);
        //     return $first_item;
        // } else {
        //     return false;
        // }
        return !empty($the_result_array) ? array_shift($the_result_array) : false ; // This is a short form of the commented code above.
        return $found_user;
    }

   

   




}






?>