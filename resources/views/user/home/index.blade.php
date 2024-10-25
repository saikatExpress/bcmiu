@extends('user.layout.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        @php
            $divisions = divisions();
        @endphp
        <div class="row" style="position: relative;">
            <header class="user-header">
                <ul class="division-list">
                    @foreach ($divisions as $division)
                        <li class="division_link" data-id="{{ $division->id }}">{{ $division->name }}</li>
                    @endforeach
                </ul>
            </header>
        </div>

        {{-- User Post --}}
        <form id="post-form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">
                <div class="facebook-post-form">
                    <div class="post-header">
                        <img src="{{ asset('assets/img/demo.jpg') }}" alt="Profile Picture" class="profile-pic">
                        <textarea class="form-control post-input" name="content" placeholder="What's on your mind, Saiful?" rows="1"></textarea> 
                    </div>
                    <span class="text-danger contentErr" style="font-size: 12px;"></span>
                    <div class="post-options">
                        <button type="button" class="post-option" id="photo-video-btn">
                            <i class="fas fa-image"></i> Photo/Video
                        </button>
                        <span class="text-danger mediaErr" style="font-size: 12px;"></span>
                        <button type="button" class="post-option" id="check-in-btn">
                            <i class="fas fa-map-marker-alt"></i> Check In
                        </button>
                    </div>
                    <span class="text-danger divisionErr" style="font-size: 12px;"></span>

                    <div class="mt-2 mb-2">
                        <div class="form-group">
                            <select id="division-select" name="division_id" class="form-control" style="display: none;">
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="post-footer">
                        <button class="privacy-btn">
                            <i class="fas fa-lock"></i> Public
                        </button>
                        <button type="submit" class="post-btn">Post</button>
                    </div>
                    <input type="file" id="file-input" name="media" style="display: none;" accept="image/*,video/*">
                </div>

            </div>
        </form>
        {{-- User Post --}}

        <div class="row" id="feed" style="margin-top: 20px;">
            <div class="post">
                <div class="user-post-header">
                    <img src="{{ asset('assets/img/demo.jpg') }}" alt="Profile Picture" class="profile-pic">
                    <div class="user-infos">
                        <h4 class="username">John Doe</h4>
                        <span class="timestamp">5 minutes ago</span>
                    </div>
                </div>
                <div class="post-content">
                    <p>Check out my latest adventure! 🌄</p>
                    <img src="{{ asset('assets/img/istockphoto-904172104-612x612.jpg') }}" alt="Adventure Photo" class="post-image">
                </div>
                <div class="post-interactions">
                    <button class="like-button">👍 Like</button>
                    <button class="comment-button">💬 Comment</button>
                    <button class="share-button">🔗 Share</button>
                </div>
                <div class="comments-section">
                    <div class="comment">
                        <div class="user-post-header">
                            <img src="{{ asset('assets/img/demo.jpg') }}" alt="Profile Picture" class="profile-pic">
                            <div class="user-infos">
                                <h4 class="username">Alice</h4>
                                <span class="timestamp">5 minutes ago</span>
                            </div>
                        </div>
                        <div class="comment-text">
                            Great photo! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem ab placeat et molestiae dolor error aliquam adipisci ipsum. Aspernatur, incidunt.
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" class="user-comment-input" placeholder="Write a comment...">
                        <button class="submit-icon" style="display: none;">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/admin/post.js') }}"></script>

@endsection
