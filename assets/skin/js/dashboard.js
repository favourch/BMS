$(function () {

    /* Display message header */
    setTimeout(function () {
        $('#chat-notification').removeClass('hide').addClass('animated bounceIn');
        $('#chat-popup').removeClass('hide').addClass('animated fadeIn');
    }, 5000);

    /* Hide message header */
    setTimeout(function () {
        $('#chat-popup').removeClass('animated fadeIn').addClass('animated fadeOut').delay(800).hide(0);
    }, 8000);



    


    


    //******************** TO DO LIST ********************//
    $("#sortable-todo").sortable();

    $('.my_checkbox_all').on('ifClicked', function (event) {
        if ($(this).is(':checked')) {
            $(this).closest('#task-manager').find('.icheckbox_flat-red').removeClass('checked');
            $(this).closest('#task-manager').find(':checkbox').attr('checked', false);
        } else {
            $(this).closest('#task-manager').find('.icheckbox_flat-red').addClass('checked');
            $(this).closest('#task-manager').find(':checkbox').attr('checked', true);
        }
    });


   
    
  


});