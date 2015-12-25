jQuery(document).ready(function($) {
    $('.view-button').click(function(event) {
        $.get($(this).attr('data-url'), function(data) {
            $('#view-modal').find('.name').html(data.name);
            $('#view-modal').find('.modal-body').html(data.description);
        });
    });
});