@extends('user.layout.app')

@section('content')
<div class="container mt-4">
    <h5 class="mb-4">Settings</h5>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" data-target="profile">Profile</a>
                <a href="#" class="list-group-item list-group-item-action" data-target="account">Account</a>
                <a href="#" class="list-group-item list-group-item-action" data-target="privacy">Privacy</a>
                <a href="#" class="list-group-item list-group-item-action" data-target="security">Security</a>
                <a href="#" class="list-group-item list-group-item-action" data-target="notifications">Notifications</a>
                <a href="#" class="list-group-item list-group-item-action" data-target="language">Language</a>
            </div>
        </div>

        <div class="col-md-9">
            <div id="settings-content">
                <!-- Profile Settings -->
                <div class="card mb-3" id="profile" style="display: block;">
                    <div class="card-header">
                        <h6>Profile Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" name="bio">{{ auth()->user()->bio }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="card mb-3" id="account" style="display: none;">
                    <div class="card-header">
                        <h6>Change Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-sm btn-danger">Change Password</button>
                        </form>
                    </div>
                </div>

                <!-- Privacy Settings -->
                <div class="card mb-3" id="privacy" style="display: none;">
                    <div class="card-header">
                        <h6>Privacy Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('privacy.settings.update') }}" method="POST">
                            @csrf
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="profile_visibility" name="profile_visibility" {{ auth()->user()->profile_visibility ? 'checked' : '' }}>
                                <label class="form-check-label" for="profile_visibility">Make Profile Public</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="search_engine" name="search_engine" {{ auth()->user()->search_engine ? 'checked' : '' }}>
                                <label class="form-check-label" for="search_engine">Allow Search Engines to Index My Profile</label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">Save Privacy Settings</button>
                        </form>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="card mb-3" id="security" style="display: none;">
                    <div class="card-header">
                        <h6>Security Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('security.settings.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="two_factor" class="form-label">Two-Factor Authentication</label>
                                <input class="form-check-input" type="checkbox" id="two_factor" name="two_factor" {{ auth()->user()->two_factor ? 'checked' : '' }}>
                                <label class="form-check-label" for="two_factor">Enable Two-Factor Authentication</label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-warning">Update Security Settings</button>
                        </form>
                    </div>
                </div>

                <!-- Notifications Settings -->
                <div class="card mb-3" id="notifications" style="display: none;">
                    <div class="card-header">
                        <h6>Notification Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('notifications.settings.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email_notifications" class="form-label">Email Notifications</label>
                                <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" {{ auth()->user()->email_notifications ? 'checked' : '' }}>
                                <label class="form-check-label" for="email_notifications">Enable Email Notifications</label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">Save Notification Settings</button>
                        </form>
                    </div>
                </div>

                <!-- Language Settings -->
                <div class="card mb-3" id="language" style="display: none;">
                    <div class="card-header">
                        <h6>Language Settings</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('language.settings.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="language" class="form-label">Select Language</label>
                                <select class="form-select" id="language" name="language">
                                    <option value="en" {{ auth()->user()->language == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="fr" {{ auth()->user()->language == 'fr' ? 'selected' : '' }}>French</option>
                                    <option value="es" {{ auth()->user()->language == 'es' ? 'selected' : '' }}>Spanish</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-info">Save Language Settings</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#settings-content > div').not('#profile').hide();

        $('.list-group-item').on('click', function(e) {
            e.preventDefault();

            $('.list-group-item').removeClass('active');

            $('#settings-content > div').hide();

            var target = $(this).data('target');

            $('#' + target).show();

            $(this).addClass('active');
        });
    });
</script>

@endsection
