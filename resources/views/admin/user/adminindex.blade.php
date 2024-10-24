@extends('admin.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Admin List</h2>
                    <a href="{{ route('create-admin') }}" class="btn btn-sm btn-primary">
                        Create Admin
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
                                <th>Branch</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>WhatsApp</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Upazila</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>
                                        {{ branchName($admin->branch_id) }}
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->mobile }}</td>
                                    <td>
                                        <a href="https://wa.me/88{{ $admin->whatsapp }}" target="_blank">
                                            {{ $admin->whatsapp }}
                                        </a>
                                    </td>
                                    <td>{{ divisionName($admin->division_id) }}</td>
                                    <td>{{ districtName($admin->district_id) }}</td>
                                    <td>{{ upazilaName($admin->upazila_id) }}</td>
                                    <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <label class="btn btn-sm btn-{{ $admin->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($admin->status) }}
                                        </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary editBtn" data-id="{{ $admin->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div id="sidebar" class="user-edit-sidebar" style="display:none;">
        <button id="closeSidebar" class="close-sidebar-btn btn btn-sm btn-danger">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div>
            <h4>Update Info</h4>
            <div class="user-info">
                <div class="profile-header">
                    <h2>Admin Profile</h2>
                </div>
                <div class="profile-body">
                    <div class="profile-image">
                        <img src="{{ asset('assets/img/demo.jpg') }}" alt="User Profile Picture" class="img-fluid">
                    </div>
                    <div class="profile-details">
                        <h3 class="user-name"></h3>
                        <p class="user-branch"></p>
                        <p class="user-email"></p>
                        <p class="user-mobile"></p>
                        <p class="user-whatsapp"></p>
                        <p class="user-role">Role: <span>User</span></p>
                        <p class="user-status">Status: <span class="status-active">Active</span></p>
                        <p class="user-joining-date"></p>
                    </div>
                </div>
            </div>

            <form id="updateUserForm">
                <input type="hidden" id="userId" name="userId">

                <div class="form-group mt-3">
                    <label for="branch">Branch:</label>
                    <select name="branch" id="branch" class="form-control">
                        <option value="" selected disabled>Select Branch</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Name -->
                <div class="form-group mt-3">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>

                <!-- Email -->
                <div class="form-group mt-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" name="email">
                </div>

                <!-- Mobile -->
                <div class="form-group mt-3">
                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" class="form-control" name="mobile">
                </div>

                <!-- WhatsApp -->
                <div class="form-group mt-3">
                    <label for="whatsapp">WhatsApp:</label>
                    <input type="text" id="whatsapp" class="form-control" name="whatsapp">
                </div>

                <!-- Division -->
                <div class="form-group mt-3">
                    <label for="division_id">Division:</label>
                    <select id="division_id" class="form-control" name="division_id">
                        <!-- Options to be populated dynamically -->
                    </select>
                </div>

                <!-- District -->
                <div class="form-group mt-3">
                    <label for="district_id">District:</label>
                    <select id="district_id" class="form-control" name="district_id">
                        <!-- Options to be populated dynamically -->
                    </select>
                </div>

                <!-- Upazila -->
                <div class="form-group mt-3">
                    <label for="upazila_id">Upazila:</label>
                    <select id="upazila_id" class="form-control" name="upazila_id">
                        <!-- Options to be populated dynamically -->
                    </select>
                </div>

                <!-- Role -->
                <div class="form-group mt-3">
                    <label for="role">Role:</label>
                    <input type="text" id="role" class="form-control" name="role" readonly>
                </div>

                <!-- Status -->
                <div class="form-group mt-3">
                    <label for="status">Status:</label>
                    <select id="status" class="form-control" name="status">
                        <option value="" disabled selected>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-success mt-3">Update User</button>
            </form>
        </div>
        <footer>
            <div class="mt-3">
                <p style="color: #000;">
                    <strong class="text-danger">Be Carefull : </strong> When you update an admin,please check information clearly...then you update the information. <br> <i>Thank you.</i>
                </p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/admin/branch.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/admin/userinfo.js') }}"></script>
    <script src="{{ asset('assets/js/admin/usertable.js') }}"></script>
@endsection
