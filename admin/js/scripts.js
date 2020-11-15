$(document).ready(function(){

    var user_href;
    var user_href_splitted;
    var user_id;
    
    $(".modal_thumbnails").click(function(){

        $("#set_user_image").prop('disabled', false); // Enables the button on the modal

        // Gets the User Id
        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("="); // Splits the string at the = 
        user_id = user_href_splitted[user_href_splitted.length -1]; // Finds the length of the array
        alert(user_id);




    });















    // EDITOR CKEDITOR
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    // End of EDITOR


    });
