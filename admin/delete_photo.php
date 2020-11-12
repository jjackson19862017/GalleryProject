<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

<?php 

if(empty($_GET['photo_id'])) {
    redirect("photos.php"); // If the get request is empty send them back to photos
} 

$photo = Photo::find_by_id($_GET['photo_id']);

if($photo) {
    $photo->delete_photo();
} else {
    redirect("photos.php"); // If the get request is empty send them back to photos
}

?>