<?php 

require_once("admin/includes/init.php");



if(empty($_GET['id'])) {
    redirect("index.php");
}
$photo = Photo::find_by_id($_GET['id']);


if(isset($_POST['submit'])) {

    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if($new_comment && $new_comment->save()) {
        redirect("photo.php?id={$photo->id}");
    } else {
        $message = "There was some problems saving.";
    }
} else {
    $author = "";
    $body = "";
}





?>


<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title ;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comment -->
               






                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Authors Name</label>
                            <input class="form-control" type="text" name="author"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">Comment</label>
                            <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <hr>

                <!-- Posted Comments -->
                <?php 
                $comments = Comment::find_the_comments($photo->id);
                foreach ($comments as $comment) : ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                            <?php echo $comment->body; ?>

                    </div>
                </div>
                
                <?php endforeach; ?>
                    <hr>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            <?php include("includes/sidebar.php"); ?>
               

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
        <?php include("includes/footer.php"); ?>
