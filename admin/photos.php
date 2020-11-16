<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                            <small class="bg-success"> <?php echo $session->message; ?></small>
                        </h1>
                        <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>Filename</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    
                                    $photos = Photo::find_all();
                                    foreach ($photos as $photo) : ?>
                                    <tr>
                                    <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">
                                    </td>
                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td><?php 
                                    
                                        $comments = Comment::find_the_comments($photo->id);
                                        count($comments); 
                                        ?>
                                        <a class="btn btn-info" href="comment_photo.php?id=<?php echo $photo->id;?>">
                                        <?php if(count($comments) == 0) {
                                            echo "No Comments";
                                            } elseif(count($comments) == 1) {
                                                echo "View 1 Comment";
                                                } else {
                                                    echo "View " . count($comments) .  " Comments";
                                                    }?> </a>
                                                    <hr>
                                    <div class="action_links">
                                    <a class="btn btn-danger delete_link" href="delete_photo.php?id=<?php echo $photo->id;?>"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-primary" href="edit_photo.php?id=<?php echo $photo->id;?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-success" href="../photo.php?id=<?php echo $photo->id;?>"><i class="fa fa-eye"></i></a>
                                    </div>
                                    </td>

                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table> <!-- End of Table -->                        
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>