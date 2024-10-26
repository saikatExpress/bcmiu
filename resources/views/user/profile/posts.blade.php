@foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('assets/img/demo.jpg') }}" class="rounded-circle me-2" alt="User" style="width: 40px; height: 40px;">
                <div>
                    <h6 class="mb-0">{{ getName($post->created_by) }}</h6>
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                </div>
            </div>
            <p>{{ $post->content }}</p>
            @if($post->image)
                <img src="{{ asset('storage/posts/' . $post->image) }}" class="img-fluid" alt="Post Image">
            @endif
            <div class="mt-3 d-flex justify-content-between">
                <span><i class="far fa-thumbs-up"></i> Like</span>
                <span><i class="far fa-comment"></i> Comment</span>
                <span><i class="fas fa-share"></i> Share</span>
            </div>
        </div>
    </div>
@endforeach
