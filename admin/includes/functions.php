<?php 

// Defining Constants for Directory Structures
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'gallery');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

function classAutoLoader($class){

    $class = strtolower($class);
    $the_path = INCLUDES_PATH . "{$class}.php";

        if(is_file($the_path) && !class_exists($class)) {
            include $the_path;
        } else {
        die("This filename {$class}.php was not found");
    }

}

spl_autoload_register('classAutoLoader');

function redirect($location) {
    return header("location:".$location);
}
?>