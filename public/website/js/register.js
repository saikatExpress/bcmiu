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

    $('#division').on('change', function(){
        const id = $(this).val();

        if(id){
            $.ajax({
                url: '/get/division/' + id,
                type: 'GET',
                success: function(response){
                    $('#district').empty();
                    $('#district').append('<option value="" selected disabled>Select a District</option>');

                    $.each(response.districts, function(index, district) {
                        $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });

    $('#district').on('change', function(){
        const id = $(this).val();
        if(id){
            $.ajax({
                url: '/get/upazila/' + id,
                type: 'GET',
                success: function(response){
                    $('#upazila').empty();
                    $('#upazila').append('<option value="" selected disabled>Select a Upazila</option>');

                    $.each(response.upazilas, function(index, upazila) {
                        $('#upazila').append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });
});
