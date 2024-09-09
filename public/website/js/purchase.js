$(document).ready(function(){
    $('#packageForm').on('submit', function(e){
        e.preventDefault();

        var password = $('#password').val().trim();

        if(password === ''){
            $('#passErr').text('Please enter password');
            return;
        }

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#loader').show();
            },
            complete: function(){
                $('#loader').hide();
            },
            success: function(response) {
                $('.alert-success').show();
                $('.alert-danger').hide();
                // $('#packageForm')[0].reset();

                if(response && response.success == true){
                    $('#congratulations-message').show();
                    $('#resMsg').text(response.message);
                    $('#success_form').hide();
                    $('#packageForm')[0].reset();
                }
            },
            error: function(xhr) {
                // Show error message
                $('.alert-danger').show();
                $('.alert-success').hide();

                $('input').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    var input = $('#' + key);
                    input.addClass('is-invalid');
                    input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                });
            }
        });
    });

    $('#email').on('input', function(){
        const email = $(this).val().trim();

        if(email === ''){
            $('.passwordForm').hide();
            $('#passwordText').text();
            return;
        }

        $.ajax({
            url: '/get/user/via/email/' + email,
            method: 'GET',
            success: function(response){
                if(response && response.success == true){
                    $('#name').val(response.user.first_name);
                    $('#phone').val(response.user.mobile);
                    $('.passwordForm').hide();
                    $('#passwordText').text();
                }

                if(response && response.success == false){
                    $('#name').val('');
                    $('#phone').val('');

                    $('.passwordForm').show();
                    $('#passwordText').text('আপনার কোন একাউন্ট খোলা নেই।দয়া করে একটি পাসওয়ার্ড লিখে একাউন্ট ওপেন করুন।');
                }
            },
            error: function(xhr){

            }
        });
    });
});
