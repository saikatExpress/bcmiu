    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .btn-disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h4>Update Project Info</h4>
        </div>
        <div class="card-body">
            <form id="projectForm" action="{{ route('project.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Basic Information -->
                <div class="step active" id="step1">
                    <h4>Basic Information</h4>
                    <div class="form-group">
                        <label for="project_name">Project Name <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $setting->project_name ?? 'ONNTOMO' }}">
                        @error('project_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_email">Project Email <span class="text-danger"> * </span></label>
                        <input type="email" class="form-control" id="project_email" name="project_email" value="{{ $setting->project_email ?? 'uftcl.bd@gmail.com' }}">
                        @error('project_email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_mobile">Project Whatsapp <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" id="project_mobile" name="project_mobile" value="{{ $setting->project_mobile ?? '01671425022' }}">
                        @error('project_mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_mobile1">Contact Number <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" id="project_mobile1" name="project_mobile1" value="{{ $setting->project_mobile1 ?? '01671425022' }}">
                        @error('project_mobile1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_address">Project Address <span class="text-danger"> * </span></label>
                        <textarea class="form-control" id="project_address" name="project_address" rows="4">{{ $setting->project_address ?? 'Mothijheel, Dhaka - 1200' }}</textarea>
                        @error('project_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="project_link">Project Link <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" id="project_link" name="project_link" value="{{ $setting->project_link ?? 'https://onnotomo.org/' }}">
                        @error('project_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Step 2: Images -->
                <div class="step" id="step2">
                    <h4>Images</h4>

                    <div class="form-group">
                        <label for="project_logo">Project Logo <span class="text-danger"> * </span></label>
                        <input type="file" class="form-control" id="project_logo" name="project_logo">
                        @error('project_logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div id="project_logo_preview" class="m-4">
                            @if ($setting->project_logo != NULL)
                                <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('/storage/projectimages/' . $setting->project_logo) }}" alt="Logo">
                            @else
                                <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('logos/logo_onnotomo.jpeg') }}" alt="Logo">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="background_image">Background Image</label>
                        <input type="file" class="form-control" id="background_image" name="background_image">
                        @error('background_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div id="background_image_preview" class="m-4">
                            @if ($setting->background_image != NULL)
                                <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('/storage/projectimages/' . $setting->background_image) }}" alt="Background">
                            @else
                                <img style="width: 80px; height: 80px; border-radius: 4px;" src="{{ asset('logos/logo1removebg.png') }}" alt="Background">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Step 3: Social Links -->
                <div class="step" id="step3">
                    <h4>Social Links</h4>

                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ $setting->facebook_link ?? 'https://facebook.com/' }}">
                        @error('facebook_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{ $setting->twitter_link ?? 'https://twitter.com/' }}">
                        @error('twitter_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="{{ $setting->instagram_link ?? 'https://instagram.com/' }}">
                        @error('instagram_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="linkedin_link">LinkedIn Link</label>
                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $setting->linkedin_link ?? 'https://linkedin.com/' }}">
                        @error('linkedin_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="youtube_link">YouTube Link</label>
                        <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{ $setting->youtube_link ?? 'https://youtube.com/' }}">
                        @error('youtube_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                    <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="{{ asset('assets/js/admin/projects.js') }}"></script>
