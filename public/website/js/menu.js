$(document).ready(function(){
    $('.menuBtn').on('click', function(){
        const url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response){
                $('#root').html(response);
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    });
});
