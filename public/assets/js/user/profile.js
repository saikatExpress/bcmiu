$(document).ready(function(){
    $('#profileForm').on('submit', function(e){
        e.preventDefault();
        
        const data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response){
                if(response && response.success === true){
                    alert(response.message);
                    window.location.reload();
                }
            },
            error: function(xhr){
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        $('.validationNameErr').text(errors.name[0]);
                    }
                    if (errors.email) {
                        $('.validationEmailErr').text(errors.email[0]);
                    }
                    if (errors.mobile) {
                        $('.validationMobileErr').text(errors.mobile[0]);
                    }
                    if (errors.whatsapp) {
                        $('.validationWhatsappErr').text(errors.whatsapp[0]);
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

    $('#locationForm').on('submit', function(e){
        e.preventDefault();
        
        const data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response){
                if(response && response.success === true){
                    alert(response.message);
                    window.location.reload();
                }
            },
            error: function(xhr){
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.division) {
                        $('.validationDivisionErr').text(errors.division[0]);
                    }
                    if (errors.district) {
                        $('.validationDistrictErr').text(errors.district[0]);
                    }
                    if (errors.upazila) {
                        $('.validationUpazilaErr').text(errors.upazila[0]);
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

    $('#passwordForm').on('submit', function(e){
        e.preventDefault();
        
        const data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response){
                if(response && response.success === true){
                    alert(response.message);
                    window.location.reload();
                }else{
                    alert(response.message);
                }
            },
            error: function(xhr){
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.current_password) {
                        $('.validationOldPasswordErr').text(errors.current_password[0]);
                    }
                    if (errors.password) {
                        $('.validationOldNewPasswordErr').text(errors.password[0]);
                    }
                    if (errors.confirm_password) {
                        $('.validationConfirmPasswordErr').text(errors.confirm_password[0]);
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });
});