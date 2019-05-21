var table_info = {
    "0.005": [
        7.879,10.597,12.838,14.860,16.750,18.548,20.278,21.955,23.859,25.188,26.757,28.300,29.819,32.801,34.267,35.718,37.156,38.582,39.997,41.401,42.796,44.181,45.558,46.928,48.290,49.645,50.994,52.335,53.672,66.766,79.490,91.952,
    ],
    "0.001": [
        10.827,13.815
    ],
};

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

        console.log('DATA: ',table_info);
        $('.main-1').hide('slow');
        $('.main-2').show('slow');

    });
});