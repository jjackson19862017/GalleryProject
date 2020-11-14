<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

<?php

    if(empty($_GET['id'])) {
        redirect("photos.php"); // If the get request is empty send them back to photos
    } else {
    $photo = Photo::find_by_id($_GET['id']);
    }


    if(isset($_POST['update'])) {
        if($photo) {
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alt_text = $_POST['alt_text'];
            $photo->description = $_POST['description'];
            $photo->save();
        }

    }
    ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <?php include("includes/top_nav.php")?>
            
            

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php")?>            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="page-header">
                                Edit Photo
                                <small>Subheading</small>
                            </h1>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="" value="<?php echo $photo->title ; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" name="caption" class="form-control" id="" value="<?php echo $photo->caption ; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alt_text">Alternative Text</label>
                                    <input type="text" name="alt_text" class="form-control" id="" value="<?php echo $photo->alt_text ; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10" id="" ><?php echo $photo->description; ?></textarea>
                                </div>   
                            </div>
                        </div> <!-- End of Col -->
                        <div class="col-md-4">
                        <div class="photo-info-box">
                                    <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                    </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                        </p>
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"><?php echo $photo->id ; ?></span>
                                        </p>
                                        <p class="text">
                                            Filename: <span class="data"><?php echo $photo->filename ; ?></span>
                                        </p>
                                        <p class="text">
                                        File Type: <span class="data"><?php echo $photo->type ; ?></span>
                                        </p>
                                        <p class="text">
                                        File Size: <span class="data"><?php echo $photo->size ; ?></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                        </div>   
                                    </div>
                                    <hr>
                                    <div class="img-thumbnail img-fluid">
                                    <a href=""><img class="" src="<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->alt_text ; ?>"></a>
                                    </div>
                                </div>          
                            </div>

                        </div> <!-- End of Col -->
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>