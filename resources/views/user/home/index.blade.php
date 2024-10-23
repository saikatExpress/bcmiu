@extends('user.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <!-- Loop through notices and display each one in a card -->
            @forelse ($notices as $notice)
                <div class="col-md-12 col-lg-12 mb-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $notice->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $notice->content }}</p>
                            <p class="card-text"><strong>Type:</strong> {{ $notice->type }}</p>
                            <p class="card-text"><strong>Publish Date:</strong> {{ $notice->publish_date }}</p>
                            <p class="card-text"><strong>Effective Date:</strong> {{ $notice->effective_date ? $notice->effective_date : 'N/A' }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $notice->status }}</p>
                            <p class="card-text"><strong>Contact Email:</strong> {{ $notice->contact_email }}</p>
                            <p class="card-text"><strong>Contact Phone:</strong> {{ $notice->contact_phone ? $notice->contact_phone : 'N/A' }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Created on: {{ $notice->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        No notices available.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
