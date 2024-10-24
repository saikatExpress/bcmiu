$(document).ready(function() {
    $('.editBtn').on('click', function() {
        var groupId = $(this).data('id');
        
        $.ajax({
            url: '/groups/' + groupId + '/edit',
            type: 'GET',
            success: function(data) {
                $('#groupId').val(data.id);
                $('#groupName').val(data.name);
                $('#status').val(data.status);
                $('#sidebar').fadeIn();
            },
            error: function(err) {
                console.log("Error fetching group data:", err);
            }
        });
    });

    $('#closeSidebar').on('click', function() {
        $('#sidebar').fadeOut();
    });

    $('#updateGroupForm').on('submit', function(e) {
        e.preventDefault();
        
        var groupId   = $('#groupId').val();
        var groupName = $('#groupName').val();
        var status    = $('#status').val();

        $.ajax({
            url: '/groups/' + groupId,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: groupName,
                status: status,
            },
            success: function(response) {
                var statusLabel = $('.status-' + response.group.id + ' label');
                if (response.group.status === 'active') {
                    statusLabel.removeClass('btn-danger').addClass('btn-success').text('Active');
                } else {
                    statusLabel.removeClass('btn-success').addClass('btn-danger').text('Inactive');
                }
                $('.name-' + response.group.id).text(response.group.name);
                alert("Group updated successfully!");
                $('#sidebar').fadeOut();
            },
            error: function(err) {
                console.log("Error updating group:", err);
            }
        });
    });
});