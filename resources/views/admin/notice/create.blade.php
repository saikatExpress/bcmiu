@extends('admin.layout.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
         <div class="row">
            <div class="col-12">
                <div class="bg-light p-4 rounded">
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <h3 class="mb-4">Create Notice</h3>
                        <a href="{{ route('notices.index') }}" class="btn btn-sm btn-primary">Notice List</a>
                    </div>
                    <!-- Notice Form -->
                    <form method="POST" action="{{ route('notices.store') }}" id="noticeForm">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea id="content" name="content" rows="4" class="form-control">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select id="type" name="type" class="form-select">
                                <option value="" disabled selected>Select Type</option>
                                <option value="public" {{ old('type') == 'public' ? 'selected' : '' }}>Public</option>
                                <option value="internal" {{ old('type') == 'internal' ? 'selected' : '' }}>Internal</option>
                                <option value="legal" {{ old('type') == 'legal' ? 'selected' : '' }}>Legal</option>
                                <option value="regulatory" {{ old('type') == 'regulatory' ? 'selected' : '' }}>Regulatory</option>
                                <option value="academic" {{ old('type') == 'academic' ? 'selected' : '' }}>Academic</option>
                            </select>
                            @error('type')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="publish_date" class="form-label">Publish Date</label>
                            <input id="publish_date" name="publish_date" type="date" class="form-control" value="{{ old('publish_date') }}">
                            @error('publish_date')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="effective_date" class="form-label">Effective Date (Optional)</label>
                            <input id="effective_date" name="effective_date" type="date" class="form-control" value="{{ old('effective_date') }}">
                            @error('effective_date')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_email" class="form-label">Contact Email (Optional)</label>
                            <input id="contact_email" name="contact_email" type="email" class="form-control" value="{{ old('contact_email') }}">
                            @error('contact_email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone" class="form-label">Contact Phone (Optional)</label>
                            <input id="contact_phone" name="contact_phone" type="text" class="form-control" value="{{ old('contact_phone') }}">
                            @error('contact_phone')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit Notice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
