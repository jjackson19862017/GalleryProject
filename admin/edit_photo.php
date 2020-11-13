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
            $_POST['title'];
            $_POST['caption'];
            $_POST['alternative_text'];
            $_POST['description'];

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
                <form action="edit_photo.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="page-header">
                                Edit Photo
                                <small>Subheading</small>
                            </h1>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" name="caption" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="alternate_text">Alternative Text</label>
                                    <input type="text" name="alternate_text" class="form-control" cols="30" rows="10" id="">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10" id=""></textarea>
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
                                        Photo Id: <span class="data photo_id_box">34</span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data">image.jpg</span>
                                    </p>
                                    <p class="text">
                                    File Type: <span class="data">JPG</span>
                                    </p>
                                    <p class="text">
                                    File Size: <span class="data">3245345</span>
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