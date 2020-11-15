$(document).ready(function(){
    
    $(".modal_thumbnails").click(function(){

        $("#set_user_image").prop('disabled', false); // Enables the button on the modal
        




    });















    // EDITOR CKEDITOR
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    // End of EDITOR


    });
