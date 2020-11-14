<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

<?php 

if(empty($_GET['id'])) {
    redirect("users.php"); // If the get request is empty send them back to users
} 

$user = user::find_by_id($_GET['id']);

if($user) {
    $user->delete_user();
    redirect("users.php");
} else {
    redirect("users.php"); // If the get request is empty send them back to users
}

?>