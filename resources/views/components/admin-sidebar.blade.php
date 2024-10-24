<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>BGIA</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ ucfirst(auth()->user()->role) }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-home me-2"></i>Home
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    @if (auth()->user()->role === 'super-admin')
                        <a href="{{ route('create-admin') }}" class="dropdown-item">
                            <i class="fas fa-user-plus me-2"></i>Create Admin
                        </a>
                        <a href="{{ route('adminlist') }}" class="dropdown-item">
                            <i class="fas fa-users-cog me-2"></i>Admin List
                        </a>
                    @endif
                    <a href="{{ route('createuser') }}" class="dropdown-item">
                        <i class="fas fa-user-plus me-2"></i>Create User
                    </a>
                    <a href="{{ route('userlist') }}" class="dropdown-item">
                        <i class="fas fa-users me-2"></i>User List
                    </a>
                </div>
            </div>

            <a href="{{ route('notice') }}" class="nav-item nav-link">
                <i class="fas fa-bullhorn me-2"></i>Notice
            </a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-building me-2"></i>Branch
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    @if (auth()->user()->role === 'super-admin')
                        <a href="{{ route('create.branch') }}" class="dropdown-item">
                            <i class="fas fa-plus me-2"></i>Create Branch
                        </a>
                        <a href="{{ route('branch-list') }}" class="dropdown-item">
                            <i class="fas fa-list me-2"></i>Branch List
                        </a>
                    @else
                        <a href="" class="dropdown-item">
                            <i class="fas fa-home me-2"></i>Your Branch
                        </a>
                    @endif
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-users me-2"></i>Group
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('create.group') }}" class="dropdown-item">
                        <i class="fas fa-user-friends me-2"></i>Create Group
                    </a>
                    <a href="{{ route('group-list') }}" class="dropdown-item">
                        <i class="fas fa-list-alt me-2"></i>Group List
                    </a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-cogs me-2"></i>Settings
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('website.setting') }}" class="dropdown-item">
                        <i class="fas fa-wrench me-2"></i>Website Setting
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
