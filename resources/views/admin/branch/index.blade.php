@extends('admin.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Branch List</h2>
                    <a href="{{ route('create.branch') }}" class="btn btn-sm btn-primary">
                        Create Branch
                    </a>
                </div>
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
                <hr>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>WhatsApp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>{{ $branch->email }}</td>
                                    <td>{{ $branch->mobile }}</td>
                                    <td>{{ $branch->address }}</td>
                                    <td>
                                        <a href="https://wa.me/88{{ $branch->whatssapp }}" target="_blank">{{ $branch->whatssapp }}</a>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary editBtn" data-toggle="modal" data-target="#editModal"
                                        data-id="{{ $branch->id }}" data-name="{{ $branch->name }}" data-mobile="{{ $branch->mobile }}" data-whatssapp="{{ $branch->whatssapp }}" data-address="{{ $branch->address }}" data-email="{{ $branch->email }}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="{{ $branch->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="{{ route('edit.branch') }}">
                        @csrf
                        <input type="hidden" class="form-control" id="branch-id" name="branch-id" readonly>
                        <div class="form-group">
                            <label for="branch-name">Branch Name</label>
                            <input type="text" class="form-control" id="branch-name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="branch-name">Branch Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="branch-mobile">Mobile</label>
                            <input type="text" class="form-control" id="branch-mobile" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="branch-whatsapp">WhatsApp</label>
                            <input type="text" class="form-control" id="branch-whatsapp" name="whatsapp">
                        </div>
                        <div class="form-group">
                            <label for="branch-whatsapp">Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary mb-3 mt-2">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/admin/branch.js') }}"></script>
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
