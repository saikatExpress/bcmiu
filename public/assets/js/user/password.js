$(document).ready(function() {
    $('.eye-icon').on('click', function() {
        let inputId = $(this).find('i').attr('data-toggle');
        let inputField = $('#' + inputId);

        if (inputField.attr('type') === 'password') {
            inputField.attr('type', 'text');
            $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            inputField.attr('type', 'password');
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });
});