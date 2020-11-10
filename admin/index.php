<?php include("includes/header.php"); ?>

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
                            // Runs a query to return a result
                            // $result_set = User::find_all_users();
                            // while($row = mysqli_fetch_array($result_set)) {
                            //     echo $row['username'] . "<br>";
                            //     }


                            $users = User::find_all_users();
                            foreach($users as $user) {
                                echo $user->id . " " . $user->username . "<br>";
                            }
	                        // Challenge to Find User By Id
                            /*    $found_user = User::find_user_by_id(1);
                                $user = User::instantation($found_user);
                                echo $user->username;*/
                                $found_user = User::find_user_by_id(1);
                                echo $found_user->username;
	                        
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