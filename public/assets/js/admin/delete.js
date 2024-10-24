$(document).ready(function(){
    $('.deleteBtn').on('click', function() {
        const id = $(this).data('id');
        const route = "/group/delete/";
        const message = "The group has been deleted";
        destroy(id,route,message);
    });

    function destroy(id,route,message){
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
                    url: route + id,
                    type: 'GET',
                    success: function(response) {
                        if(response && response.status === false){
                            Swal.fire(
                                'Failed',
                                response.message,
                                'error'
                            );
                        }else{
                            Swal.fire(
                                'Deleted!',
                                message,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
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
    }
});