<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the comment is logged in ?>

<?php 

if(empty($_GET['id'])) {
    redirect("comments.php"); // If the get request is empty send them back to comments
} 

$comment = Comment::find_by_id($_GET['id']);

if($comment) {
    $comment->delete();
    $session->message("The comment with {$comment->id} has been deleted");
    redirect("comment_photo.php?id={$comment->photo_id}");
} else {
    redirect("comment_photo.php?id={$comment->photo_id}");
    // If the get request is empty send them back to comments
}

?>