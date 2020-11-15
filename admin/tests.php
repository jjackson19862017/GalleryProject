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
                        $user = User::find_by_id(4);
                        $user->username     = "Loser";
                        $user->password     = "dad";                        
                        $user->first_name   = "Barry";                        
                        $user->last_name    = "Jackson";                        
                        $user->update(); */

                        //Delete User
                        /*
                        $user = User::find_by_id(6);
                        $user->delete(); */

                        // Smart Update function
                        /*
                        $user = User::find_by_id(3);
                        $user->username = "dad";
                        $user->save(); */
                        
                        // Smart Create function
                        /*
                        $user = new User();
                        $user->username = "Bob";
                        $user->save(); */

                        // Find All Users
                        /*
                        $users = User::find_all();
                        foreach ($users as $user) {
                            echo $user->id . " -> " . $user->username . "<br>";
                        } */

                        // Find User by Id
                        /*
                        $user = User::find_by_id(11);
                        echo $user->id . " -> " . $user->username . "<br>";
                        */

                        // Create a New Photo
                        /*
                        $photo = new Photo();
                        $photo->title = "Bazza";
                        $photo->description = "dad";                        
                        $photo->filename = "Barry";                        
                        $photo->type = "jpg";
                        $photo->size = 100;                        
                        $photo->create();*/

                        // Find All Photos
                        /*
                        $photos = Photo::find_all();
                        foreach ($photos as $photo) {
                            echo $photo->id . " -> " . $photo->title . "<br>";
                        } 
                        */

                        // Find Photo by Id
                        /*
                        $photo = Photo::find_by_id(4);
                        echo $photo->id . " -> " . $photo->title . "<br>";
                        /*
                        
                        // Show Path Directory
                        // echo INCLUDES_PATH;
                        // echo SITE_ROOT;
                        */?>