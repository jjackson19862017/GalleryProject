<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the comment is logged in ?>

<?php 

if(empty($_GET['id'])) {
    redirect("comments.php"); // If the get request is empty send them back to comments
} 

$comment = Comment::find_by_id($_GET['id']);

if($comment) {
    $comment->delete();
    $session->message("The comment by {$comment->author} has been deleted");

    redirect("comments.php");
} else {
    $session->message("The comment by {$comment->author} HAS NOT been deleted");

    redirect("comments.php"); // If the get request is empty send them back to comments
}

?>