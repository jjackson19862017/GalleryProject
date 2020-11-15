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
                            Users
                            <small class="bg-success"> <?php echo $session->message; ?></small>
                            <a class="btn btn-success" href="add_user.php">Add User</a>
                        </h1>
                        <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                    
                                    $users = user::find_all();
                                    foreach ($users as $user) : ?>
                                    <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                                    
                                    <td><?php echo $user->username; ?>
                                    <div class="actions_links">
                                    <a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id;?>"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-primary" href="edit_user.php?id=<?php echo $user->id;?>"><i class="fa fa-pencil"></i></a>
                                    </div></td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
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