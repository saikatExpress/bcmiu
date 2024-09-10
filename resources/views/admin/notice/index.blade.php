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
@endsection
