$(document).ready(function() {
    $('.deleteBtn').on('click', function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/notice/delete/' + id,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'The notice has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the branch.',
                            'error'
                        );
                    }
                });
            }
        });
    });

});
