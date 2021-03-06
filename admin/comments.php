<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the comment is logged in ?>

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
                            Comments
                            <small class="bg-success"> <?php echo $session->message; ?></small>
                        </h1>
                        <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo ID</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    
                                    $comments = Comment::find_all();
                                    foreach ($comments as $comment) : ?>
                                    <tr>
                                    <td><?php echo $comment->id; ?></td>
                                    <td><?php echo $comment->photo_id; ?></td>

                                    
                                    <td><?php echo $comment->author; ?>

                                    </td>
                                    <td><?php echo $comment->body; ?></td>
                                    <td><a class="btn btn-danger" href="delete_comment.php?id=<?php echo $comment->id;?>"><i class="fa fa-trash-o"></i></a>
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