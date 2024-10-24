@extends('admin.layout.app')

@section('content')
<div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Create Group</h4>
                        <a href="{{ route('group-list') }}" class="btn btn-sm btn-primary">
                            Group List
                        </a>
                    </div>
                    <div class="card-body">

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

                        <form action="{{ route('group-store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Create Group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/admin/geo.js') }}"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#successAlert').fadeOut('slow');
            }, 2000);

            setTimeout(function() {
                $('#errorAlert').fadeOut('slow');
            }, 2000);
        });
    </script>
@endsection
