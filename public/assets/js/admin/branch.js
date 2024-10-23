$(document).ready(function() {
    $('.editBtn').on('click', function() {
        const id       = $(this).data('id');
        const name     = $(this).data('name');
        const email   = $(this).data('email');
        const mobile   = $(this).data('mobile');
        const whatsapp = $(this).data('whatssapp');
        const address  = $(this).data('address');

        $('#branch-id').val(id);
        $('#branch-name').val(name);
        $('#email').val(email);
        $('#branch-mobile').val(mobile);
        $('#branch-whatsapp').val(whatsapp);
        $('#address').val(address);

        $('#editModal').modal('show');
    });

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
                    url: '/branch/delete/' + id,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'The branch has been deleted.',
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
