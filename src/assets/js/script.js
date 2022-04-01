jQuery(document).ready(function($) {
    $("#fbfFeedback").on('submit', function(e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: ajax_var.endpoint,
            type: 'post',
            dataType: 'application/json',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data.data.message);
                // Todo: display message on page
            }
        });

    });
});