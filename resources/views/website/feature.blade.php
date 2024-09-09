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

    <!-- Features Start -->
    <div class="container-fluid feature py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">আমাদের বৈশিষ্ট্য</h4>
                <h1 class="display-5 mb-4">
                    বৃহত্তর লাভের জন্য ব্যবসা, ধারণা এবং লোকেদের সাথে সংযোগ স্থাপন করা।
                </h1>
                <p class="mb-0">
                        আমাদের উদ্দেশ্য হলো ব্যবসা, নতুন ধারণা এবং প্রতিভাবান লোকেদের মধ্যে শক্তিশালী সংযোগ স্থাপন করা, যা আপনার ব্যবসার বৃদ্ধিতে সহায়ক হবে। আমাদের প্ল্যাটফর্মটি উন্নত প্রযুক্তি এবং দক্ষতার মাধ্যমে আপনাকে এমন সুযোগ প্রদান করে যা আপনার ব্যবসাকে সামনে এগিয়ে নিয়ে যেতে সাহায্য করবে।
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-chart-line fa-4x text-primary"></i>
                        </div>
                        <h4>Portfolio Management</h4>
                        <p class="mb-4">
                            আমরা আপনার পোর্টফোলিও পর্যালোচনা করে আপনার বিনিয়োগের কার্যকারিতা বিশ্লেষণ করি এবং ব্যক্তিগত লক্ষ্য ও ঝুঁকির সহনশীলতার ভিত্তিতে কাস্টমাইজড সুপারিশ প্রদান করি। আমাদের লক্ষ্য হল আপনার সম্পদ সর্বাধিক সুবিধার জন্য যথাযথভাবে পরিচালনা করা এবং আপনার দীর্ঘমেয়াদী আর্থিক লক্ষ্য অর্জনে সহায়তা করা।
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-university fa-4x text-primary"></i>
                        </div>
                        <h4>অনলাইন BO অ্যাকাউন্ট</h4>
                        <p class="mb-4">
                            আমাদের অনলাইন বিএও অ্যাকাউন্ট সেবা আপনাকে সহজেই স্টক মার্কেটে লগ ইন করার সুযোগ দেয়। এটি আপনাকে শেয়ার কেনা, বিক্রি এবং আপনার পোর্টফোলিও পরিচালনা করার সুবিধা প্রদান করে। উন্নত নিরাপত্তা এবং ব্যবহারকারী বান্ধব ইন্টারফেসের মাধ্যমে, আপনার বিনিয়োগের সম্পূর্ণ নিয়ন্ত্রণ আপনার হাতে।
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-chart-line fa-4x text-primary"></i>
                        </div>
                        <h4>বাজার বিশ্লেষণ</h4>
                        <p class="mb-4">
                            আমাদের বাজার বিশ্লেষণ সেবা আপনাকে সঠিক বিনিয়োগ সিদ্ধান্ত নিতে সহায়তা করে। আমরা বাজারের গতিবিধি, অর্থনৈতিক সূচক এবং স্টক ট্রেন্ড বিশ্লেষণ করি যাতে আপনি সময়মতো গুরুত্বপূর্ণ তথ্য পেতে পারেন। আমাদের বিশ্লেষণী প্রতিবেদনগুলি আপনার বিনিয়োগ কৌশল উন্নত করতে এবং বাজারের পরিবর্তনগুলির সাথে সামঞ্জস্য বজায় রাখতে সাহায্য করবে।
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-hand-holding-usd fa-4x text-primary"></i>
                        </div>
                        <h4>কেনা/বেচা সিগন্যাল</h4>
                        <p class="mb-4">
                            আমাদের কেনা/বেচা সিগন্যাল সেবা আপনাকে বাজারে কার্যকর বিনিয়োগের সিদ্ধান্ত নিতে সহায়তা করে। আমাদের বিশেষজ্ঞরা বাজারের বিশ্লেষণ করে সঠিক কেনার এবং বিক্রির সিগন্যাল প্রদান করেন, যা আপনার বিনিয়োগের সাফল্যের সম্ভাবনা বৃদ্ধি করে। এই সেবার মাধ্যমে আপনি লাভজনক সুযোগগুলি চিহ্নিত করতে এবং দ্রুত সিদ্ধান্ত নিতে পারবেন।
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">আরও জানুন</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Features End -->
