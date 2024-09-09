$(document).ready(function() {
    $('#project_logo').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#project_logo_preview').html(`
                    <img style="width: 80px; height: 80px; border-radius: 4px;" src="${e.target.result}" alt="Logo">
                    <button type="button" class="btn btn-danger btn-sm mt-2" id="remove_project_logo">Remove</button>
                `);
            };
            reader.readAsDataURL(file);
        }
    });

    $('#background_image').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#background_image_preview').html(`
                    <img style="width: 80px; height: 80px; border-radius: 4px;" src="${e.target.result}" alt="Background">
                    <button type="button" class="btn btn-danger btn-sm mt-2" id="remove_background_image">Remove</button>
                `);
            };
            reader.readAsDataURL(file);
        }
    });

    $('#project_logo_preview').on('click', '#remove_project_logo', function() {
        $('#project_logo').val('');
        $('#project_logo_preview').html(`
            <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('logos/logo_onnotomo.jpeg') }}" alt="Logo">
        `);
    });

    $('#background_image_preview').on('click', '#remove_background_image', function() {
        $('#background_image').val('');
        $('#background_image_preview').html(`
            <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('logos/logo1removebg.png') }}" alt="Logo">
        `);
    });

    $('#projectForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('Form submitted successfully!');
                } else {
                    alert('Error submitting form.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error submitting form.');
            }
        });
    });

    var currentStep = 1;
    var totalSteps = $('.step').length;

    function showStep(step) {
        $('.step').removeClass('active');
        $('#step' + step).addClass('active');

        $('#prevBtn').toggle(step > 1);
        $('#nextBtn').toggle(step < totalSteps);
        $('#submitBtn').toggle(step === totalSteps);
    }

    function handleImagePreview(inputId, previewId) {
        $(inputId).on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).html(`
                        <img style="width: 80px; height: 80px; border-radius: 4px;" src="${e.target.result}" alt="Preview">
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-image">Remove</button>
                    `);
                };
                reader.readAsDataURL(file);
            }
        });

        $(document).on('click', '.remove-image', function() {
            $(inputId).val('');
            $(previewId).html(`
                <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('logos/logo_onnotomo.jpeg') }}" alt="Logo">
            `);
        });
    }

    handleImagePreview('#project_logo', '#project_logo_preview');
    handleImagePreview('#background_image', '#background_image_preview');

    $('#nextBtn').click(function() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    });

    $('#prevBtn').click(function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    showStep(currentStep);

    $('#projectForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('Form submitted successfully!');
                } else {
                    alert('Error submitting form.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error submitting form.');
            }
        });
    });
});
