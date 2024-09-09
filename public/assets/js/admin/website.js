$(document).ready(function () {
    $('.nav-link').on('click', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var target = $(this).data('target');

        $.ajax({
            url: url,
            method: 'GET',
            beforeSend: function(){
                $('#loaderGif').show();
            },
            complete: function(){
                $('#loaderGif').hide();
            },
            success: function (data) {
                $(target).html(data);
            },
            error: function (xhr) {
                console.error('Error loading content: ', xhr);
            }
        });
    });

    setTimeout(function () {
        $(".alert-success").fadeOut("slow");
    }, 2000);

    setTimeout(function () {
        $(".alert-danger").fadeOut("slow");
    }, 2000);
});
