$(document).ready(function() {
    $('input[name="search"]').on('keyup', function() {
        var search = $(this).val();
        fetchUsers(search);
    });

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search = $('input[name="search"]').val();
        fetchUsers(search, page);
    });

    function fetchUsers(search = '', page = 1) {
        $.ajax({
            url: '/user/list?page=' + page,
            type: 'GET',
            data: {
                search: search
            },
            success: function(response) {
                $('tbody').html($(response).find('tbody').html());
                $('.pagination-wrapper').html($(response).find('.pagination-wrapper').html());
            }
        });
    }
});
