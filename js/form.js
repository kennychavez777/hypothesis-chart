$(document).ready(function(){
    $( ".main-form" ).submit(function( e ) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('.main-1').hide('slow');
                $('.main-2').hide('slow');
                $('.main-3').show('slow');
            }
        });
    });

    $('.btn-s').click(function(){
        var situation = $(this).attr('value');

        $('.main-1').hide('slow');
        $('.main-2').show('slow');

    });
});