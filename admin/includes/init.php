<?php

// Defining Constants for Directory Structures
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'gallery');

defined('ADMIN_PATH') ? null : define('ADMIN_PATH', SITE_ROOT.DS.'admin');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'images');



// Require once is more secure than includes
require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once __DIR__ . DS . 'photo.php'; // It could find the page, im guessing becoz the filenames were the same
require_once("comment.php");
require_once("session.php");
require_once("paginate.php");
//echo "Init Loaded";
?>