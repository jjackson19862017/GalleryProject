<?php 


class Db_object {

    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = static::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation($the_record){

        $calling_class = get_called_class();
        $the_object = new $calling_class; // Using Late Static Bindings

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
    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
      }
  
      public static function find_by_id($id) {
          global $database;
          $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
          return !empty($the_result_array) ? array_shift($the_result_array) : false ; 
      }

    // This gets all the keys and column names from our table
    protected function properties() {
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    // Escapes all the Strings from our properties
    protected function clean_properties() {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }


    // If the data doesn't exist, Create it or Update it
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) .") ";
        $sql.= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();
        // This stops us having to type our each update field and values
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql.= implode(", ", $properties_pairs);
        $sql.= " WHERE id= "    . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false; 
    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql.= "WHERE id = " . $database->escape_string($this->id);
        $sql.= " LIMIT 1 ";
        
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false; 
    }

} // End of Db_object Class

?>