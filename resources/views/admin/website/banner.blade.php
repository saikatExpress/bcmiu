<div class="card">
        <div class="card-header">
            <h4>Add Banner</h4>
        </div>
        <div class="card-body">
            <form id="bannerForm" action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="banner_image">Banner Image <span class="text-danger"> * </span></label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                    @error('banner_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name <span class="text-danger"> * </span></label>
                    <input type="text" class="form-control" id="name" name="name" value="Welcome Bangladesh Capital Market Investor Union">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title <span class="text-danger"> * </span></label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger"> * </span></label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Social Links -->
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-info mt-3 mb-2" id="toggleSocialLinks">Add Social Links</button>
                </div>

                <div id="socialLinks" style="display: none;">
                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link">
                        @error('facebook_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter_link" name="twitter_link">
                        @error('twitter_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" class="form-control" id="instagram_link" name="instagram_link">
                        @error('instagram_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="linkedin_link">Youtube Link</label>
                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link">
                        @error('linkedin_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mt-3">Save Banner</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/admin/banner.js') }}" async></script>
