<!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <x-website-header/>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">{{ $about->title }}</h1>
                        <p class="mb-4">
                            {{ $about->description }}
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>ব্যাবসায়িক পরামর্শ</h4>
                                        <p>
                                            আপনার আর্থিক সাফল্যের জন্য নিবেদিত একজন অংশীদারের জন্য ONNOTOMO বেছে নিন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>অভিজ্ঞতার বছর</h4>
                                        <p>
                                            পোর্টফোলিও ম্যানেজমেন্ট এবং ব্যবসায়িক পরামর্শে 10 বছরের বেশি দক্ষতার সাথে...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover Now</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>কল করুন</h4>
                                        <p class="mb-0 fs-5" style="letter-spacing: 1px;">+88 {{ $setting->project_mobile1 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        @if ($about->main_image != '')
                            <img src="{{ asset('aboutimages/main/' . $about->main_image) }}" class="img-fluid rounded w-100" alt="">
                        @else
                            <img src="{{ asset('website/img/about-2.png') }}" class="img-fluid rounded w-100" alt="">
                        @endif

                        <div class="" style="position: absolute; top: -15px; right: -15px;">
                            @if ($about->right_image != '')
                                <img src="{{ asset('aboutimages/right/' . $about->right_image) }}" class="img-fluid" style="width: 150px; height: 150px; opacity: 0.7;" alt="">
                            @else
                                <img src="{{ asset('website/img/about-3.png') }}" class="img-fluid" style="width: 150px; height: 150px; opacity: 0.7;" alt="">
                            @endif
                        </div>
                        <div class="" style="position: absolute; top: -20px; left: 10px; transform: rotate(90deg);">
                            @if ($about->left_image != '')
                                <img src="{{ asset('aboutimages/left/' . $about->left_image) }}" class="img-fluid" style="width: 100px; height: 150px; opacity: 0.9;" alt="">
                            @else
                                <img src="{{ asset('website/img/about-4.png') }}" class="img-fluid" style="width: 100px; height: 150px; opacity: 0.9;" alt="">
                            @endif
                        </div>
                        <div class="rounded-bottom">
                            @if ($about->top_image != '')
                                <img src="{{ asset('aboutimages/top/' . $about->top_image) }}" class="img-fluid rounded-bottom w-100" alt="">
                            @else
                                <img src="{{ asset('website/img/about-5.jpg') }}" class="img-fluid rounded-bottom w-100" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
