<form action="{{ route('faq.store') }}" method="post" id="myForm">
        @csrf

        <div class="pd-20 card-box mb-30">
            <label for="title" class="text-blue">Title <span class="text-danger"> *</span></label>
            <input type="text" id="title" name="title" class="form-control">
            <span id="titleError" class="text-danger"></span>
        </div>

        <div class="pd-20 card-box mb-30">
            <label class="text-blue">Write Description <span class="text-danger"> *</span></label>
            <textarea id="description" class="form-control" name="description" placeholder="Enter text ..."></textarea>
            <span id="descriptionError" class="text-danger"></span>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary" value="Add Faq">
            <button type="button" id="refreshButton" class="btn btn-sm btn-danger">Refresh</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                $('#titleError').text('');
                $('#descriptionError').text('');

                var formData = new FormData(this);

                let isValid = true;
                if ($('#title').val().trim() === '') {
                    $('#titleError').text('Title is required.');
                    isValid = false;
                }
                if ($('#description').val().trim() === '') {
                    $('#descriptionError').text('Description is required.');
                    isValid = false;
                }

                if (!isValid) return;

                axios.post('{{ route('faq.store') }}', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    $('#myForm')[0].reset();
                    alert('FAQ has been added successfully!', 'Success');
                })
                .catch(error => {
                    console.error('Error submitting form:', error.response.data);
                    if (error.response.status === 422) {
                        let errors = error.response.data.errors;
                        if (errors.title) $('#titleError').text(errors.title[0]);
                        if (errors.description) $('#descriptionError').text(errors.description[0]);
                    }
                });
            });

            // Refresh button action
            $('#refreshButton').on('click', function() {
                $('#myForm')[0].reset();
            });
        });
    </script>
