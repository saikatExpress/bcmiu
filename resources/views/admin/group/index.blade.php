@extends('admin.layout.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Group List</h2>
                    <a href="{{ route('create.group') }}" class="btn btn-sm btn-primary">
                        Create Group
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
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($groups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td class="name-{{ $group->id }}">{{ $group->name }}</td>
                                    <td>{{ getName($group->created_by) }}</td>
                                    <td class="status-{{ $group->id }}">
                                        <label for="" class="btn btn-sm btn-{{ $group->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($group->status) }}
                                        </label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary editBtn" 
                                        data-id="{{ $group->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="{{ $group->id }}">
                                            <i class="fa-solid fa-trash"></i>
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

    <!-- Sidebar Structure -->
    <div id="sidebar" class="edit-sidebar" style="display:none;">
        <button id="closeSidebar" class="close-sidebar-btn btn btn-sm btn-danger">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div>
            <h4>Update Group</h4>
            <form id="updateGroupForm">
                <input type="hidden" id="groupId" name="groupId">
                <div class="form-group mt-3">
                    <label for="groupName">Group Name:</label>
                    <input type="text" id="groupName" class="form-control" name="groupName">
                </div>
                <div class="form-group mt-3">
                    <label for="groupName">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="" selected disabled>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success mt-3">Update Group</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/admin/delete.js') }}"></script>
@endsection
