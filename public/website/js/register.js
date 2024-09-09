$(document).ready(function(){
    $('#registerForm').on('submit', function(e){
        e.preventDefault();

        // Clear previous error messages
        $('#nameErr').html('');
        $('#emailErr').html('');
        $('#mobileErr').html('');
        $('#passwordErr').html('');
        $('#conpasswordErr').html('');

        // Get form values
        const name        = $('#name').val().trim();
        const email       = $('#email').val().trim();
        const mobile      = $('#mobile').val().trim();
        const password    = $('#password').val().trim();
        const conpassword = $('#password_confirmation').val().trim();

        // Validation
        if(name === ''){
            $('#nameErr').html('Name is required...');
            return;
        }

        if(email === ''){
            $('#emailErr').html('Email is required...');
            return;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#emailErr').text('Invalid email format...');
            return;
        }

        if(mobile === ''){
            $('#mobileErr').html('Mobile is required...');
            return;
        }

        if(password === ''){
            $('#passwordErr').html('Password is required...');
            return;
        }

        if(conpassword === ''){
            $('#conpasswordErr').html('Confirm Password is required...');
            return;
        }

        if (password !== conpassword) {
            $('#conpasswordErr').text('Passwords do not match...');
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
                if(response && response.success === true){
                    $('#registrationSuccessMsg').text(response.message + ' Please wait 2-3 seconds...');
                    setTimeout(function() {
                        window.location.href = '/login';
                    }, 2000);
                }
                if(response && response.success === false){
                    $('#registrationMsg').text(response.message);
                }
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    });
});
