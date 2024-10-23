@extends('admin.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;justify-content: space-between;">
                            <h4>Notices</h4>
                            <a href="{{ route('notice') }}" class="btn btn-sm btn-primary">Create Notice</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Notices Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Type</th>
                                        <th>Publish Date</th>
                                        <th>Effective Date</th>
                                        <th>Status</th>
                                        <th>Contact Email</th>
                                        <th>Contact Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($notices as $notice)
                                        <tr>
                                            <td>{{ $notice->id }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td>{{ $notice->content }}</td>
                                            <td>{{ $notice->type }}</td>
                                            <td>{{ $notice->publish_date }}</td>
                                            <td>{{ $notice->effective_date }}</td>
                                            <td>{{ $notice->status }}</td>
                                            <td>{{ $notice->contact_email }}</td>
                                            <td>{{ $notice->contact_phone }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger deleteBtn" data-id="{{ $notice->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No notices found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/admin/notice.js') }}"></script>

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
