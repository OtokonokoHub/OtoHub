function reflush(){
    $.get(url.permission_index, function(data){
        $('#permission-list').html(data);
        $('#permission-list .pagination a').click(permissionChangePage);
    });
}
permissionChangePage = function(event) {
            var url = $(this).attr('href');
            $.get(url, function(data) {
                $('#permission-list').html(data);
                $('#permission-list .pagination a').click(permissionChangePage);
            });
            event.preventDefault();
        };
jQuery(document).ready(function($) {
    
    $('#create-permission').click(function(event) {
        var form = $(this).parent().parent();
        $.post(url.permission_create, {
            '_csrf': form.find('[name=_csrf]').val(),
            'AdminItem[name]': form.find('#permission-name').val(),
            'AdminItem[description]': form.find('#permission-description').val(),
        }, function(data, textStatus, xhr) {
            if (data.hasOwnProperty('errorInfo')) {
                alert(data.errorInfo);
            }
            else{
                reflush();
            }
        });
    });
    $('.view-button').click(function(event) {
        $.get($(this).attr('data-url'), function(data) {
            $('#view-modal').find('.name').html(data.name);
            $('#view-modal').find('.modal-body').html(data.description);
        });
    });
    reflush();
});