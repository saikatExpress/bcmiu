@extends('user.layout.app')

@section('content')
<div class="container mt-4">
    <div class="profile-cover position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxwN_4ULR1kGRRehEmcwh7IZrCFr7oeyYodg&s" class="w-100" alt="Cover Photo" style="height: 300px; object-fit: cover;">
        <div class="profile-picture position-absolute" style="bottom: -50px; left: 30px;">
            <img src="{{ asset('assets/img/demo.jpg') }}" class="rounded-circle border border-white" alt="Profile Picture" style="width: 120px; height: 120px; object-fit: cover;">
        </div>
    </div>

    <!-- User Info -->
    <div class="profile-info mt-5">
        <h2 class="fw-bold">{{ auth()->user()->name }}</h2>
        <p class="text-muted">{{ auth()->user()->address ?? 'No bio available' }}</p>
        <div class="d-flex gap-4">
            <span><i class="fas fa-users"></i> 0 Friends</span>
            <span><i class="fas fa-calendar-alt"></i> Joined: {{ auth()->user()->created_at->format('F Y') }}</span>
        </div>
    </div>

    <!-- Profile Navigation -->
    <ul class="nav nav-tabs mt-4">
        <li class="nav-item">
            <a class="nav-link active" href="#" id="postsTab">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="aboutTab">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Friends</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Photos</a>
        </li>
    </ul>

    <!-- Content Section -->
    <div id="profileContent" class="profile-posts mt-4">
        @include('user.profile.posts')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/user/tab.js') }}"></script>
@endsection
