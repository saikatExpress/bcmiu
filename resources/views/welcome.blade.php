    @php
        use App\Models\Setting;

        $setting = Setting::first();
    @endphp
    @extends('website.layout.app')
    <style>
        .text-container {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    @section('content')

        <div id="root">
            <!-- Navbar & Hero Start -->
            <div class="container-fluid position-relative p-0">
                <x-website-header/>
                <!-- Carousel Start -->
                <div class="header-carousel owl-carousel">
                    @if (count($banners) > 0)
                        @foreach ($banners as $item)
                            <div class="header-carousel-item">
                                <img src="{{ asset('bannerimages/'.$item->banner_image) }}" class="img-fluid w-100" alt="Image">
                                <div class="carousel-caption">
                                    <div class="container">
                                        <div class="row gy-0 gx-5">
                                            <div class="col-lg-0 col-xl-5"></div>
                                            <div class="col-xl-7 animated fadeInLeft">
                                                <div class="text-sm-center text-md-end">
                                                    <h4 class="text-primary text-uppercase fw-bold mb-4">{{ $item->name }}</h4>
                                                    <h3 class="display-4 text-uppercase text-white mb-4">
                                                        {{ $item->title }}
                                                    </h3>
                                                    <p class="mb-5 fs-5">
                                                        {{ $item->description }}
                                                    </p>

                                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="{{ $item->linkedin_link }}">
                                                            <i class="fas fa-play-circle me-2"></i>
                                                            Watch Video
                                                        </a>
                                                        <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">
                                                            Learn More
                                                        </a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                                        <h2 class="text-white me-2">Follow Us:</h2>
                                                        <div class="d-flex justify-content-end ms-2">
                                                            <a class="btn btn-md-square btn-light rounded-circle me-2" href="{{ $item->facebook_link }}">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                            <a class="btn btn-md-square btn-light rounded-circle mx-2" href="{{ $item->twitter_link }}">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                            <a class="btn btn-md-square btn-light rounded-circle mx-2" href="{{ $item->instagram_link }}">
                                                                <i class="fab fa-instagram"></i>
                                                            </a>
                                                            <a class="btn btn-md-square btn-light rounded-circle ms-2" href="{{ $item->linkedin_link }}">
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="header-carousel-item">
                            <img src="{{ asset('website/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row gy-0 gx-5">
                                        <div class="col-lg-0 col-xl-5"></div>
                                        <div class="col-xl-7 animated fadeInLeft">
                                            <div class="text-sm-center text-md-end">
                                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome ONNOTOMO Portfolio Management Service</h4>
                                                <h3 class="display-4 text-uppercase text-white mb-4">
                                                    আপনার অর্থ বিনিয়োগ করুন উচ্চ লাভের জন্য
                                                </h3>
                                                <p class="mb-5 fs-5">
                                                    স্টকারে, আমরা আপনার অর্থকে সর্বোচ্চ সুবিধা নিশ্চিত করতে বিশেষজ্ঞ।
                                                    আমাদের অভিজ্ঞ দল এবং আধুনিক প্রযুক্তি ব্যবহার করে, আমরা নিশ্চিত করি যে আপনার বিনিয়োগ আপনার প্রত্যাশার চেয়ে বেশি লাভ এনে দেয়।
                                                    আপনার আর্থিক ভবিষ্যৎকে নিরাপদ করুন এবং আমাদের সাথে আপনার বিনিয়োগ শুরু করুন।
                                                </p>

                                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                                    <h2 class="text-white me-2">Follow Us:</h2>
                                                    <div class="d-flex justify-content-end ms-2">
                                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-carousel-item">
                            <img src="{{ asset('website/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row g-5">
                                        <div class="col-12 animated fadeInUp">
                                            <div class="text-center">
                                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome ONNOTOMO Portfolio Management Service</h4>
                                                <h3 class="display-4 text-uppercase text-white mb-4">
                                                    আপনার অর্থ বিনিয়োগ করুন উচ্চ লাভের জন্য
                                                </h3>
                                                <p class="mb-5 fs-5">
                                                    আমাদের প্ল্যাটফর্ম আপনাকে আপনার বিনিয়োগকে উন্নত কৌশল এবং গভীর বিশ্লেষণের মাধ্যমে সর্বোচ্চ ফলাফলে পৌঁছাতে সহায়তা করে।
                                                    আমাদের উদ্দেশ্য হলো আপনার অর্থের সর্বোচ্চ পরিমাণ লাভ নিশ্চিত করা এবং আপনার আর্থিক লক্ষ্য পূরণে সাহায্য করা।
                                                </p>

                                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <h2 class="text-white me-2">Follow Us:</h2>
                                                    <div class="d-flex justify-content-end ms-2">
                                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Carousel End -->
            </div>
            <!-- Navbar & Hero End -->

            <!-- About Start -->
            <div class="container-fluid about py-5">
                <div class="container">
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
                                        <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover Now</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex">
                                            <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                            <div>
                                                <h4>কল করুন</h4>
                                                <p class="mb-0 fs-5" style="letter-spacing: 1px;">+88
                                                    <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank">
                                                        {{ $setting->project_mobile1 }}
                                                    </a>
                                                </p>
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
            <!-- About End -->

            <!-- Services Start -->
            <div class="container-fluid service pb-5">
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">আমাদের সেবা</h4>
                        <h1 class="display-5 mb-4">আমরা সেরা অফার প্রদান করি</h1>
                        <p class="mb-0">
                            ONNOTOMO-তে, আমরা আপনাকে প্রদান করি সেরা পরিষেবাগুলি যা আপনার পোর্টফোলিও ব্যবস্থাপনা এবং ব্যবসায়িক পরামর্শের চাহিদা পূরণে সহায়ক।
                            আমাদের অভিজ্ঞ দল আপনার জন্য কাস্টমাইজড সলিউশন প্রদান করে যা আপনার বিনিয়োগের লক্ষ্য অর্জনে সহায়তা করে।
                        </p>
                    </div>
                    <div class="row g-4">
                        @if (count($services) > 0)
                            @foreach ($services as $item)
                                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item">
                                        <div class="service-img">
                                            <img src="{{ asset('serviceimages/'.$item->service_image) }}" class="img-fluid rounded-top w-100" alt="Image">
                                        </div>
                                        <div class="rounded-bottom p-4">
                                            <a href="{{ route('service.show', ['id' => $item->id]) }}" class="h4 d-inline-block mb-4">{{ $item->title }}</a>
                                            <p class="mb-4 text-container">
                                                {{ $item->description }}
                                            </p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('service.show', ['id' => $item->id]) }}">
                                                আরও পড়ুন
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-1.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">কৌশলগত পরামর্শ</a>
                                        <p class="mb-4">
                                            আমাদের কৌশলগত পরামর্শ সেবা আপনাকে আপনার ব্যবসার লক্ষ্য অর্জনে সহায়তা করে।
                                            আমরা আপনাকে প্রয়োজনীয় কৌশল এবং পরিকল্পনা প্রদান করি যা আপনার বাজারে প্রতিযোগিতামূলক সুবিধা নিশ্চিত করে।
                                            অভিজ্ঞ পরামর্শকদল আমাদের সাথে যুক্ত থাকলে আপনার ব্যবসার সফলতা নিশ্চিত হতে পারে।আমাদের সাথে থাকার আহব্বান করছি।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-2.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">আর্থিক পরামর্শ</a>
                                        <p class="mb-4">
                                            আমাদের আর্থিক পরামর্শ সেবা আপনার আর্থিক পরিকল্পনা এবং বিনিয়োগ সিদ্ধান্তে সহায়তা করে।
                                            আমরা আপনার আর্থিক লক্ষ্য অনুযায়ী কাস্টমাইজড পরামর্শ প্রদান করি, যা আপনার সম্পদ বৃদ্ধি এবং ঝুঁকি কমাতে সহায়ক।
                                            অভিজ্ঞ পরামর্শকদল আমাদের সাথে যুক্ত থাকলে আপনার আর্থিক ভবিষ্যৎ আরও নিরাপদ এবং সফল হতে পারে।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">ব্যবস্থাপনা সেবা</a>
                                        <p class="mb-4">
                                            আমাদের ব্যবস্থাপনা সেবা আপনার ব্যবসার কার্যক্রম আরও দক্ষ এবং ফলপ্রসূ করতে সহায়তা করে।
                                            আমরা আপনার প্রতিষ্ঠানের অভ্যন্তরীণ প্রক্রিয়া, সম্পদ ব্যবস্থাপনা, এবং টিম কর্মক্ষমতা উন্নত করার জন্য কৌশলগত দিকনির্দেশনা প্রদান করি।
                                            আমাদের অভিজ্ঞ পরামর্শকদল আপনাকে সেরা ব্যবস্থাপনা সমাধান এবং ফলপ্রসূ পরিকল্পনা প্রণয়ন করতে সহায়তা করবে।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-4.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">সরবরাহ অপ্টিমাইজেশন</a>
                                        <p class="mb-4">
                                            আমাদের সরবরাহ অপ্টিমাইজেশন সেবা আপনার সরবরাহ চেইনকে আরও দক্ষ এবং লাভজনক করতে সহায়তা করে। আমরা আপনার সরবরাহ প্রক্রিয়ার প্রতিটি ধাপ বিশ্লেষণ করে, খরচ কমাতে এবং সাপ্লাই চেইনের কার্যকারিতা বৃদ্ধি করতে কৌশলগত পরামর্শ প্রদান করি। আমাদের বিশেষজ্ঞ দল নিশ্চিত করে যে আপনার সরবরাহ ব্যবস্থাপনা আরও সঠিক এবং সময়োপযোগী।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-5.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">মানবসম্পদ পরামর্শ</a>
                                        <p class="mb-4">
                                            আমাদের এইচআর পরামর্শ সেবা আপনার মানবসম্পদ ব্যবস্থাপনা উন্নত করতে সহায়তা করে।
                                            আমরা আপনার কর্মী নীতি, নিয়োগ প্রক্রিয়া, এবং কর্মচারী উন্নয়ন কৌশল পর্যালোচনা করে, কার্যকর এবং টেকসই সমাধান প্রদান করি।
                                            আমাদের অভিজ্ঞ পরামর্শকদল আপনার প্রতিষ্ঠানের মানবসম্পদ কার্যক্রমকে আরও উন্নত এবং ফলপ্রসূ করার জন্য প্রয়োজনীয় সহায়তা প্রদান করবে।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('website/img/service-6.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                                    </div>
                                    <div class="rounded-bottom p-4">
                                        <a href="#" class="h4 d-inline-block mb-4">মার্কেটিং পরামর্শ</a>
                                        <p class="mb-4">
                                            আমাদের মার্কেটিং পরামর্শ সেবা আপনার ব্র্যান্ডের visibility বৃদ্ধি এবং বাজারে প্রতিযোগিতা শক্তিশালী করতে সহায়ক।
                                            আমরা আপনার মার্কেটিং কৌশল বিশ্লেষণ করে, লক্ষ্য দর্শক এবং বাজার প্রবণতা অনুযায়ী কার্যকর পরিকল্পনা তৈরি করি।
                                            আমাদের অভিজ্ঞ টিম আপনাকে সঠিক মার্কেটিং টুলস এবং কৌশল প্রয়োগ করতে সহায়তা করবে, যা আপনার ব্যবসার উন্নতি ও বৃদ্ধি নিশ্চিত করবে।
                                        </p>
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Services End -->

            <!-- Offer Start -->
            <div class="container-fluid offer-section pb-5">
                <div class="container pb-5">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">আমাদের অফার</h4>
                        <h1 class="display-5 mb-4">আমরা যেসব সুবিধা প্রদান করি</h1>
                        <p class="mb-0">অনটোমো পোর্টফোলিও ম্যানেজমেন্ট সিস্টেমের মাধ্যমে আপনি আপনার নতুন প্রকল্পের জন্য বিনিয়োগের টাকা ধার নিতে পারেন। আমাদের সেবা আপনাকে আরও সহজ, নমনীয় এবং নিরাপদ অভিজ্ঞতা প্রদান করে।</p>
                    </div>
                    <div class="row g-5 align-items-center">
                        <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="nav nav-pills bg-light rounded p-5">
                                <a class="accordion-link p-4 active mb-4" data-bs-toggle="pill" href="#collapseOne">
                                    <h5 class="mb-0">আপনার নতুন প্রকল্পের জন্য বিনিয়োগের টাকা ধার দেওয়া</h5>
                                </a>
                                <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseTwo">
                                    <h5 class="mb-0">আপনার নতুন প্রকল্পের জন্য বিনিয়োগের টাকা ধার দেওয়া</h5>
                                </a>
                                <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseThree">
                                    <h5 class="mb-0">মোবাইল পেমেন্টের মাধ্যমে সকল বিনিয়োগকারীর জন্য সুবিধাজনক এবং সহজ</h5>
                                </a>
                                <a class="accordion-link p-4 mb-0" data-bs-toggle="pill" href="#collapseFour">
                                    <h5 class="mb-0">প্রো ট্রেডারদের জন্য সকল লেনদেন ফ্রি</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                            <div class="tab-content">
                                <div id="collapseOne" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <img src="{{ asset('website/img/offer-1.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-md-5">
                                            <h1 class="display-5 mb-4">স্টক মার্কেট একটি মঞ্চ প্রদান করে...</h1>
                                            <p class="mb-4">স্টক মার্কেটের মাধ্যমে আপনি আপনার অর্থ বিনিয়োগ করতে পারেন এবং আপনার প্রকল্পের জন্য প্রয়োজনীয় তহবিল সংগ্রহ করতে পারেন। এটি একটি নিরাপদ এবং সুবিধাজনক পদ্ধতি যা আপনাকে আপনার আর্থিক লক্ষ্য অর্জনে সহায়তা করবে।</p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <img src="{{ asset('website/img/offer-2.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-md-5">
                                            <h1 class="display-5 mb-4">স্টক মার্কেট একটি মঞ্চ প্রদান করে...</h1>
                                            <p class="mb-4">স্টক মার্কেটের মাধ্যমে আপনি আপনার অর্থ বিনিয়োগ করতে পারেন এবং আপনার প্রকল্পের জন্য প্রয়োজনীয় তহবিল সংগ্রহ করতে পারেন। এটি একটি নিরাপদ এবং সুবিধাজনক পদ্ধতি যা আপনাকে আপনার আর্থিক লক্ষ্য অর্জনে সহায়তা করবে।</p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseThree" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <img src="{{ asset('website/img/offer-3.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-md-5">
                                            <h1 class="display-5 mb-4">স্টক মার্কেট একটি মঞ্চ প্রদান করে...</h1>
                                            <p class="mb-4">স্টক মার্কেটের মাধ্যমে আপনি আপনার অর্থ বিনিয়োগ করতে পারেন এবং আপনার প্রকল্পের জন্য প্রয়োজনীয় তহবিল সংগ্রহ করতে পারেন। এটি একটি নিরাপদ এবং সুবিধাজনক পদ্ধতি যা আপনাকে আপনার আর্থিক লক্ষ্য অর্জনে সহায়তা করবে।</p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseFour" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <img src="{{ asset('website/img/offer-4.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-md-5">
                                            <h1 class="display-5 mb-4">স্টক মার্কেট একটি মঞ্চ প্রদান করে...</h1>
                                            <p class="mb-4">স্টক মার্কেটের মাধ্যমে আপনি আপনার অর্থ বিনিয়োগ করতে পারেন এবং আপনার প্রকল্পের জন্য প্রয়োজনীয় তহবিল সংগ্রহ করতে পারেন। এটি একটি নিরাপদ এবং সুবিধাজনক পদ্ধতি যা আপনাকে আপনার আর্থিক লক্ষ্য অর্জনে সহায়তা করবে।</p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Offer End -->

            <!-- FAQs Start -->
            <div class="container-fluid faq-section pb-5">
                <div class="container pb-5 overflow-hidden">
                    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">প্রশ্নোত্তর</h4>
                        <h1 class="display-5 mb-4">সাধারণভাবে জিজ্ঞাসিত প্রশ্নাবলী</h1>
                        <p class="mb-0">
                            আমাদের FAQ বিভাগে স্বাগতম, যেখানে আমরা আপনার সম্ভাব্য সমস্ত প্রশ্নের উত্তর প্রদান করি। যদি আপনি আমাদের সেবা বা পণ্য সম্পর্কিত কোনও প্রশ্ন থাকে, এখানে তার বিস্তারিত উত্তর পাবেন।
                        </p>
                    </div>
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                                @if (count($faqs) > 0)
                                    @foreach ($faqs as $item)
                                        <div class="accordion-item rounded-top">
                                            <h2 class="accordion-header" id="flush-heading{{ $item->id }}">
                                                <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $item->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $item->id }}">
                                                    {{ $item->title }}
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $item->id }}" data-bs-parent="#accordionFlushSection">
                                                <div class="accordion-body">
                                                    {{ $item->description }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="accordion-item rounded-top">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                এই টুলটি কি করে?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">এই টুলটি আপনার পোর্টফোলিও পরিচালনার জন্য বিভিন্ন কার্যকারিতা প্রদান করে, যেমন বাজার বিশ্লেষণ, বিনিয়োগ ট্র্যাকিং, এবং ঝুঁকি ব্যবস্থাপনা। এটি আপনার বিনিয়োগের কার্যকারিতা উন্নত করতে সহায়ক।</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                অনলাইন ট্রেডিংয়ের অসুবিধাগুলি কি কি?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">অনলাইন ট্রেডিংয়ের কিছু সাধারণ অসুবিধা হলো নিরাপত্তা ঝুঁকি, প্রযুক্তিগত সমস্যাসমূহ, এবং নিয়ন্ত্রক অঙ্গীকারের অভাব। এই ঝুঁকিগুলির বিরুদ্ধে সুরক্ষা নিশ্চিত করা গুরুত্বপূর্ণ।</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                অনলাইন ট্রেডিং কি নিরাপদ?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">অনলাইন ট্রেডিং সাধারণত নিরাপদ, তবে এটি নির্ভর করে আপনি কোন প্ল্যাটফর্ম ব্যবহার করছেন তার নিরাপত্তা প্রোটোকলগুলির উপর। একটি বিশ্বাসযোগ্য ব্রোকার বা প্ল্যাটফর্ম নির্বাচন করা গুরুত্বপূর্ণ।</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                অনলাইন ট্রেডিং কি এবং এটি কিভাবে কাজ করে?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">অনলাইন ট্রেডিং হলো ইন্টারনেটের মাধ্যমে স্টক, বন্ড, বা অন্যান্য আর্থিক যন্ত্র কেনা এবং বিক্রি করা। এটি ব্রোকারেজ প্ল্যাটফর্মের মাধ্যমে পরিচালিত হয় যা ট্রেডিংয়ের জন্য একটি ডিজিটাল প্ল্যাটফর্ম প্রদান করে।</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                                অনলাইন ট্রেডিংয়ের জন্য সেরা অ্যাপ কোনটি?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">অনলাইন ট্রেডিংয়ের জন্য বেশ কয়েকটি জনপ্রিয় অ্যাপ রয়েছে, যেমন Robinhood, E*TRADE, এবং TD Ameritrade। আপনার প্রয়োজন অনুযায়ী বিভিন্ন ফিচার এবং কমিশন কাঠামো বিবেচনা করে একটি অ্যাপ নির্বাচন করা উচিত।</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded-bottom">
                                        <h2 class="accordion-header" id="flush-headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                                একটি ট্রেডিং অ্যাকাউন্ট কিভাবে তৈরি করবেন?
                                            </button>
                                        </h2>
                                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushSection">
                                            <div class="accordion-body">একটি ট্রেডিং অ্যাকাউন্ট তৈরি করতে, প্রথমে একটি নির্ভরযোগ্য ব্রোকারের সাথে রেজিস্টার করতে হবে। পরে, আপনার ব্যক্তিগত তথ্য প্রদান করে, ডকুমেন্ট জমা দিয়ে এবং প্রয়োজনীয় অর্থ জমা করে অ্যাকাউন্ট একটিভ করতে হবে।</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                            <div class="bg-primary rounded">
                                <img src="{{ asset('website/img/about-2.png') }}" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->
        </div>
    @endsection

