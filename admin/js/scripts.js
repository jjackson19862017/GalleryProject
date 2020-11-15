$(document).ready(function(){

    var user_href;
    var user_href_splitted;
    var user_id;

    var image_source;
    var image_href_splitted;
    var image_id;
    
    $(".modal_thumbnails").click(function(){

        $("#set_user_image").prop('disabled', false); // Enables the button on the modal

        // Gets the User Id
        user_source = $("#user-id").prop('href');
        user_href_splitted = user_source.split("="); // Splits the string at the = 
        user_id = user_href_splitted[user_href_splitted.length -1]; // Finds the length of the array
        // Test alert(user_id);

        // Gets the Image Id
        image_href = $(this).prop('src');
        image_href_splitted = image_href.split("/"); // Splits the string at the /
        image_id = image_href_splitted[image_href_splitted.length -1]; // Finds the length of the array
        // Test alert(image_id);


    });















    // EDITOR CKEDITOR
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    // End of EDITOR


    });
