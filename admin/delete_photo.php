<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

<?php 

if(empty($_GET['id'])) {
    redirect("photos.php"); // If the get request is empty send them back to photos
} 

$photo = Photo::find_by_id($_GET['id']);

if($photo) {
    $photo->delete_photo();
    $session->message("The {$photo->filename} has been deleted");
    redirect("photos.php");
} else {
    redirect("photos.php"); // If the get request is empty send them back to photos
}

?>