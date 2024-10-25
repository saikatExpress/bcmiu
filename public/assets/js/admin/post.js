$(document).ready(function () {
    $('.post-input').on('focus', function () {
        $(this).animate({ height: "100px" }, 200);
    }).on('blur', function () {
        if ($(this).val() === "") {
            $(this).animate({ height: "40px" }, 200);
        }
    });

    $('#photo-video-btn').on('click', function () {
        $('#file-input').click();
    });

    $('#check-in-btn').on('click', function () {
        $('#division-select').toggle();
        $('#division-select').focus();
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('#check-in-btn').length && !$(event.target).closest('#division-select').length) {
            $('#division-select').hide();
        }
    });

    $('#post-form').on('submit', function (e) {
        e.preventDefault();
        
        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response && response.success === true){
                    alert("Post submitted successfully!");
                }

                $('#post-form')[0].reset();
                $('#division-select').hide();
                $('.post-input').animate({ height: "40px" }, 200);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.content) {
                        $('.contentErr').text(errors.content[0]);
                    }
                    if (errors.media) {
                        $('.mediaErr').text(errors.media[0]);
                    }
                    if (errors.division_id) {
                        $('.divisionErr').text('Please select your check in');
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

});