<?php require_once("init.php"); ?>

<?php

// If user is signed in goto Admin Index Page
if($session->is_signed_in()) { redirect("index.php"); }

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Method to check database user
    $user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your Password or Username are incorrect.";
    }

} else {
    // If the Fields are blank, then set the variables to avoid an error.
    $username = "";
    $password = "";
}



?>