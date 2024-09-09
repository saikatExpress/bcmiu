$(document).ready(function(){
    $('#loginForm').on('submit', function(e){
        e.preventDefault();

        $('#emailErr').html('');
        $('#passwordErr').html('');


        const email = $('#email').val().trim();
        const password = $('#password').val().trim();

        if(email === ''){
            $('#emailErr').html('Email is required...');
            return;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#emailErr').text('Invalid email format...');
            return;
        }

        if(password === ''){
            $('#passwordErr').html('Password is required...');
            return;
        }

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            beforeSend: function(){
                $('#loader').show();
            },
            complete: function(){
                $('#loader').hide();
            },
            success: function(response){
                if(response && response.success === true && response.role === 'admin'){
                    $('#registrationSuccessMsg').text(response.message);
                    setTimeout(function() {
                        window.location.href = '/dashboard';
                    }, 2000);
                }
                if(response && response.success === true && response.role === 'user'){
                    $('#registrationSuccessMsg').text(response.message);
                    setTimeout(function() {
                        window.location.href = '/user';
                    }, 2000);
                }
                if(response && response.success === false){
                    $('#errorMessage').text(response.message);
                }
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    });

    $('#email').on('input', function(){
        const value = $(this).val().trim();

        if(value !== ''){
            $('#emailErr').text('');
            return;
        }
    });

    $('#password').on('input', function(){
        const value = $(this).val().trim();

        if(value !== ''){
            $('#passwordErr').text('');
            return;
        }
    });
});
