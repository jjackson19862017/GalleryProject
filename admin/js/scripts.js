$(document).ready(function(){

    var user_href;
    var user_href_splitted;
    var user_id;

    var image_source;
    var image_href_splitted;
    var image_name;
    var photo_id;
    
    /**************** Photo Gallery Selector ***************/

    $(".modal_thumbnails").click(function(){

        $("#set_user_image").prop('disabled', false); // Enables the button on the modal

        // Gets the User Id
        $(this).addClass('selected');
        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("="); // Splits the string at the = 
        user_id = user_href_splitted[user_href_splitted.length -1]; // Finds the length of the array
        // Test alert(user_id);

        // Gets the Image Id
        image_source = $(this).prop('src');
        image_href_splitted = image_source.split("/"); // Splits the string at the /
        image_name = image_href_splitted[image_href_splitted.length -1]; // Finds the length of the array
        photo_id = $(this).attr("data");
        // Test alert(image_name);

        photo_id = $(this).attr("data"); // Grabs the input from the data quotes in the photo_library_modal

        $.ajax({

            url: "includes/ajax_code.php",
            data:{photo_id:photo_id}, // Setting Objects
            type:"POST", // Catching the post super global
            success:function(data){
                if(!data.error) {
                    $("#modal_sidebar").html(data); // This replaces the reload option from before
                }


            }
        });

    });

    $("#set_user_image").click(function(){ 

        $.ajax({

            url: "includes/ajax_code.php",
            data:{image_name: image_name, user_id:user_id}, // Setting Objects
            type:"POST", // Catching the post super global
            success:function(data){
                if(!data.error) {
                    $(".user_image_box a img").prop('src', data); // This replaces the reload option from before
                }


            }

        });







    });


    /**************** Edit Photo Sidebar ***************/


    $(".info-box-header").click(function() {
        $(".inside").slideToggle("fast");
        $("#toggle").toggleClass("glyphicon-menu-down glyhicon, glyphicon-menu-up glyhicon");
    });

    /******************* DELETE CONFIRM ***************/
    $(".delete_link").click(function() {

        return confirm("Are you sure you want to Delete?");



    });

    







    // EDITOR CKEDITOR
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    // End of EDITOR


    });
