<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");} // Checks to see if the user is logged in ?>

<?php

    $user = new User();

    if(isset($_POST['create'])) {
        if($user) {
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
            $session->message("{$user->username} has been created");
            $user->save();
            redirect("users.php");
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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                Add user
                                <small class="bg-success"> <?php echo $session->message; ?></small>

                            </h1>
                            <div class="col-md-6 col-md-offset-3"> <!-- Centers the form on the center of the screen -->
                               
                                <div class="form-group">
                                    <label for="user_image">User Image</label>
                                    <input type="file" name="user_image" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="create" class="btn btn-primary pull-right " value="Create">
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