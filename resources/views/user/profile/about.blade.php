<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Update Profile Information</h5>
        <form method="POST" action="{{ route('profile.update') }}" id="profileForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                <span class="validationNameErr text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                <span class="validationEmailErr text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ auth()->user()->mobile }}">
                <span class="validationMobileErr text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ auth()->user()->whatsapp }}">
                <span class="validationWhatsappErr text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" name="bio">{{ auth()->user()->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Update information</button>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h4>Update your Address</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('update.location') }}" method="post" id="locationForm">
            @csrf
            <div class="form-group mb-3">
                <label for="">Division: </label>
                <select name="division" id="division" class="form-control">
                    <option value="" selected disabled>Select</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ auth()->user()->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                    @endforeach
                </select>
                <span class="validationDivisionErr text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label for="">District: </label>
                <select name="district" id="district" class="form-control">
                    <option value="" selected disabled>Select</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ auth()->user()->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                    @endforeach
                </select>
                <span class="validationDistrictErr text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label for="">Upazila: </label>
                <select name="upazila" id="upazila" class="form-control">
                    <option value="" selected disabled>Select</option>
                    @foreach ($upazilas as $upazila)
                        <option value="{{ $upazila->id }}" {{ auth()->user()->upazila_id == $upazila->id ? 'selected' : '' }}>{{ $upazila->name }}</option>
                    @endforeach
                </select>
                <span class="validationUpazilaErr text-danger"></span>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Update Address</button>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h4>Update password</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('update.password') }}" method="post" id="passwordForm">
            @csrf
            <div class="form-group mb-3 position-relative">
                <label for="current_password">Current Password: </label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                <span class="position-absolute eye-icon" style="right: 10px; top: 35px; cursor: pointer;">
                    <i class="fas fa-eye-slash" data-toggle="current_password"></i>
                </span>
                <span class="validationOldPasswordErr text-danger"></span>
            </div>

            <div class="form-group mb-3 position-relative">
                <label for="password">New Password: </label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="position-absolute eye-icon" style="right: 10px; top: 35px; cursor: pointer;">
                    <i class="fas fa-eye-slash" data-toggle="password"></i>
                </span>
                <span class="validationOldNewPasswordErr text-danger"></span>
            </div>

            <div class="form-group mb-3 position-relative">
                <label for="confirm_password">Confirm Password: </label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                <span class="position-absolute eye-icon" style="right: 10px; top: 35px; cursor: pointer;">
                    <i class="fas fa-eye-slash" data-toggle="confirm_password"></i>
                </span>
                <span class="validationConfirmPasswordErr text-danger"></span>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Update Password</button>
        </form>
    </div>
</div>
<script src="{{ asset('assets/js/admin/geo.js') }}"></script>
<script src="{{ asset('assets/js/user/profile.js') }}"></script>
<script src="{{ asset('assets/js/user/password.js') }}"></script>
