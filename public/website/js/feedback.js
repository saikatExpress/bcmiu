$(document).ready(function(){
    $('#feedbackForm').on('submit', function(e){
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize();
        var email = $('#email').val().trim();

        // Function to check if the user exists
        function checkUser(email) {
            return $.ajax({
                url: '/retrive/user/' + email,
                method: 'GET'
            });
        }

        // Function to handle form submission
        function submitForm() {
            return $.ajax({
                url: $('#feedbackForm').attr('action'),
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#loader').show(); // Show a loader
                },
                complete: function() {
                    $('#loader').hide(); // Hide the loader
                },
                success: function(response) {
                    $('.alert-success').show();
                    $('.alert-danger').hide();
                    if(response && response.success === true) {
                        $('#congratulations-message').show();
                        $('#resMsg').text(response.message);
                        $('#success_form').hide();
                        $('#feedbackForm')[0].reset();
                    }
                },
                error: function(xhr) {
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
        }

        // Check if the email field is not empty
        if (email != '') {
            checkUser(email).done(function(response) {
                if (response && response.error === true) {
                    $('#confirmUser').show();
                    // Optionally stop the form submission if needed
                    return;
                } else {
                    submitForm(); // Proceed with form submission
                }
            }).fail(function(xhr) {
                // Handle any errors with the checkUser request
                console.error('Error checking user:', xhr);
            });
        } else {
            submitForm(); // Proceed with form submission if email is empty
        }
    });

});
