$(document).ready(function(){
    $('#division').on('change', function(){
        const id = $(this).val();

        if(id){
            $.ajax({
                url: '/get/division/' + id,
                type: 'GET',
                success: function(response){
                    $('#district').empty();
                    $('#district').append('<option value="" selected disabled>Select a District</option>');

                    $.each(response.districts, function(index, district) {
                        $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });

    $('#district').on('change', function(){
        const id = $(this).val();
        if(id){
            $.ajax({
                url: '/get/upazila/' + id,
                type: 'GET',
                success: function(response){
                    $('#upazila').empty();
                    $('#upazila').append('<option value="" selected disabled>Select a Upazila</option>');

                    $.each(response.upazilas, function(index, upazila) {
                        $('#upazila').append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });
});