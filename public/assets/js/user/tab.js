$(document).ready(function() {
    $('#aboutTab').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/profile/about',
            type: 'GET',
            success: function(data) {
                $('#profileContent').html(data);
                $('.nav-link').removeClass('active');
                $('#aboutTab').addClass('active');
            },
            error: function() {
                alert('Could not load the About section');
            }
        });
    });

    $('#postsTab').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/profile/posts',
            type: 'GET',
            success: function(data) {
                $('#profileContent').html(data);
                $('.nav-link').removeClass('active');
                $('#postsTab').addClass('active');
            },
            error: function() {
                alert('Could not load the Posts section');
            }
        });
    });
});
