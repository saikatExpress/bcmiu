$(document).ready(function () {
    $('#toggleSocialLinks').on('click', function () {
        $('#socialLinks').toggle();
    });

    $(document).on('click', '.deletebannerButton', function(){
        var bannerId = $(this).data("id");
        var listItem = $(this).closest(".list-item");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "/banner/delete/" + bannerId,
                    success: function (response) {
                        listItem.remove();

                        Swal.fire("Deleted!", response.message, "success");
                    },
                    error: function (error) {
                        Swal.fire(
                            "Error!",
                            error.responseJSON.message,
                            "error"
                        );
                    },
                });
            }
        });
    });
});
