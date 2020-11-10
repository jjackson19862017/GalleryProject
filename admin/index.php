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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        
                        <?php 
                        // Create a New User
                        /*
                        $user = new User();
                        $user->username     = "Bazza";
                        $user->password     = "dad";                        
                        $user->first_name   = "Barry";                        
                        $user->last_name    = "Jackson";                        
                        $user->create();*/

                        // Update User
                        /*
                        $user = User::find_user_by_id(4);
                        $user->username     = "Loser";
                        $user->password     = "dad";                        
                        $user->first_name   = "Barry";                        
                        $user->last_name    = "Jackson";                        
                        $user->update(); */

                        $user = User::find_user_by_id(6);
                        $user->delete();
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>