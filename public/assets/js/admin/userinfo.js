$(document).ready(function() {
    $(document).on('click','.editBtn', function() {
        var userId = $(this).data('id');
        
        $.ajax({
            url: '/user/' + userId + '/edit',
            type: 'GET',
            success: function(response) {
                if (response.status === 'success') {
                    var user = response.data;
                    var formattedDate = timeFormat(user.created_at);

                    $('.user-name').text(user.name);
                    $('.user-branch').text("Branch:" + " " + user.branch.name);
                    $('.user-email').text("Email:" + " " + user.email);
                    $('.user-mobile').text("Mobile:" + " " + user.mobile);
                    $('.user-whatsapp').text("Whatsapp:" + " " + user.whatsapp);
                    $('.user-joining-date').text("Joined:" + " " + formattedDate);

                    $('#userId').val(user.id);
                    $('#branch').val(user.branch_id);
                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('#mobile').val(user.mobile);
                    $('#whatsapp').val(user.whatsapp);
                    $('#division_id').val(user.division_id);
                    $('#district_id').val(user.district_id);
                    $('#upazila_id').val(user.upazila_id);
                    $('#role').val(user.role);
                    $('#status').val(user.status);
                    loadSelectOptions();
                    
                    $('#sidebar').show();
                }
            },
            error: function(err) {
                console.log("Error fetching group data:", err);
            }
        });
    });

    $('#closeSidebar').on('click', function() {
        $('#sidebar').hide();
    });

    function timeFormat(timestamp) {
        var date = new Date(timestamp);

        var day = ('0' + date.getDate()).slice(-2);
        var month = ('0' + (date.getMonth() + 1)).slice(-2);
        var year = date.getFullYear().toString().slice(-2);

        var hours = date.getHours();
        var minutes = ('0' + date.getMinutes()).slice(-2);

        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;

        var formattedDate = day + '-' + month + '-' + year + ', ' + hours + ':' + minutes + ' ' + ampm;

        return formattedDate;
    }


    function loadSelectOptions() {
        $.ajax({
            url: '/get-divisions',
            type: 'GET',
            success: function(data) {
                var divisionOptions = '<option value="">Select Division</option>';
                $.each(data.divisions, function(key, division) {
                    divisionOptions += '<option value="' + division.id + '">' + division.name + '</option>';
                });
                $('#division_id').html(divisionOptions);
            }
        });

        // Load districts when division is selected
        $('#division_id').change(function() {
            var divisionId = $(this).val();
            $.ajax({
                url: '/get-districts/' + divisionId,
                type: 'GET',
                success: function(data) {
                    var districtOptions = '<option value="">Select District</option>';
                    $.each(data.districts, function(key, district) {
                        districtOptions += '<option value="' + district.id + '">' + district.name + '</option>';
                    });
                    $('#district_id').html(districtOptions);
                }
            });
        });

        // Load upazilas when district is selected
        $('#district_id').change(function() {
            var districtId = $(this).val();
            $.ajax({
                url: '/get-upazilas/' + districtId,
                type: 'GET',
                success: function(data) {
                    var upazilaOptions = '<option value="">Select Upazila</option>';
                    $.each(data.upazilas, function(key, upazila) {
                        upazilaOptions += '<option value="' + upazila.id + '">' + upazila.name + '</option>';
                    });
                    $('#upazila_id').html(upazilaOptions);
                }
            });
        });
    }

    $('#updateUserForm').submit(function(e) {
        e.preventDefault();

        var userId = $('#userId').val();
        var formData = $(this).serialize();

        $.ajax({
            url: '/users/' + userId + '/update',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    alert('User updated successfully!');
                    $('#sidebar').hide();
                } else {
                    alert('Error updating user.');
                }
            },
            error: function() {
                alert('Error occurred while updating user.');
            }
        });
    });


});