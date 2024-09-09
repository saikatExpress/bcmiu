    <div id="loader" class="custom-loader">
        <div class="custom-spinner"></div>
    </div>

    <div class="container-fluid position-relative p-0">
        <x-website-header/>

        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $info['page'] }}</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">{{ $info['page'] }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="section">

            @if(session('message'))
                <div id="successMessage" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div id="errorMessage" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="feedback-form mt-4 p-4 bg-light rounded">
                <div id="congratulations-message" class="congratulations-message" style="margin-bottom:20px;">
                    <img style="display: block;margin-left: auto;margin-right: auto;width: 40px;height: 40px;" src="{{ asset('logos/checked.png') }}" alt="">
                    <h4>Congratulations..!</h4>
                    <p id="resMsg"></p>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-success">Back Home</a>
                    <div class="flowers"></div>
                </div>
                <div id="success_form">
                    <h2 class="mb-4">We Value Your Feedback</h2>
                        <form action="{{ route('feedback.store') }}" method="POST" id="feedbackForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email: <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="mobile">Mobile:</label>
                                <input type="text" id="mobile" name="mobile" class="form-control">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="feedback">Feedback: <span class="text-danger">*</span></label>
                                <textarea id="feedback" name="feedback" rows="4" class="form-control"></textarea>
                                @error('feedback')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3 form-check" id="confirmUser" style="display: none;">
                                <input type="checkbox" class="form-check-input" name="confirmUserCheckbox" id="exampleCheck1" value="1">
                                <label class="form-check-label" for="exampleCheck1">Are you want to be an user...?</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Feedback</button>
                        </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('website/js/feedback.js') }}"></script>
