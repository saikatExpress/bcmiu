@extends('admin.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <h2>User List</h2>
                    @if (session()->has('message'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger" id="errorAlert">
                            {{ session('error') }}
                        </div>
                    @endif
                <!-- Search and Filter Form -->
                <form id="search-form" method="GET" action="{{ route('userlist') }}">
                    <div class="input-group mb-3">
                        <select name="filterBy" class="form-select" aria-label="Filter by">
                            <option value="" selected>Filter By</option>
                            <option value="name">Name</option>
                            <option value="email">Email</option>
                            <option value="mobile">Mobile</option>
                            <option value="whatsapp">WhatsApp</option>
                        </select>
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>

                <hr>

                <div class="table-responsive" id="user-table">
                    @include('admin.user.partials.user_table', ['users' => $users])
                </div>

                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/user/fetch',
                    method: 'GET',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#user-table').html(data);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Automatically hide success message after 2 seconds
            setTimeout(function() {
                $('#successAlert').fadeOut('slow');
            }, 2000);

            // Automatically hide error message after 2 seconds
            setTimeout(function() {
                $('#errorAlert').fadeOut('slow');
            }, 2000);
        });
    </script>
@endsection
