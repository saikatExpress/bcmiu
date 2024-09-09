<div class="card">
    <div class="card-header">
        <h4>Update About Information</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('abouts.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="main_image">Main Image <span class="text-danger"> * </span></label>
                <input type="file" class="form-control" id="main_image" name="main_image">
                @error('main_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div>
                    <img style="width: 80px; height:80px;" src="{{ asset('storage/aboutimages/main/' . $about->main_image) }}" alt="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="right_image">Right Image <span class="text-danger"> * </span></label>
                <input type="file" class="form-control" id="right_image" name="right_image">
                @error('right_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div>
                    <img style="width: 80px; height:80px;" src="{{ asset('storage/aboutimages/right/' . $about->right_image) }}" alt="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="left_image">Left Image <span class="text-danger"> * </span></label>
                <input type="file" class="form-control" id="left_image" name="left_image">
                @error('left_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div>
                    <img style="width: 80px; height:80px;" src="{{ asset('storage/aboutimages/left/' . $about->left_image) }}" alt="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="top_image">Top Image <span class="text-danger"> * </span></label>
                <input type="file" class="form-control" id="top_image" name="top_image">
                @error('top_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div>
                    <img style="width: 80px; height:80px;" src="{{ asset('storage/aboutimages/top/' . $about->top_image) }}" alt="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="title">Title <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description <span class="text-danger"> * </span></label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $about->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save About Information</button>
        </form>
    </div>
</div>
