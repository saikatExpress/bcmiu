    <div class="container-fluid position-relative p-0">
        <x-website-header/>

        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $info['page'] }}</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

            <h2 class="section-title">Offer (অফার)</h2>

            <div class="section-content">
                <div class="offer-description">
                    <h4>আমাদের সেবা সম্পর্কে</h4>
                    <p>
                        এটা একটি সেবামূলক ওয়েবসাইট। আপনি আমাদের সেবাগুলি নিতে চাইলে প্রথমে রেজিস্টার করে লগইন করতে হবে।
                        আমাদের বিভিন্ন রকম প্যাকেজ প্রদান করা হয়। আপনি চাইলে আমাদের ফ্রি প্যাকেজটি বিনামূল্যে ব্যবহার করতে পারেন,
                        যার মেয়াদ ৩ দিন। প্যাকেজ দেখতে <a href="{{ route('buy.package') }}" class="btn btn-sm btn-success rounded-pill py-2 px-4">ক্লিক করুন</a>।
                        প্রতি কর্মদিবসের শুরুতে আমরা আপনাকে বাজারের তথ্য সরবরাহ করব। আপনার প্যাকেজ অনুযায়ী সিগন্যাল পাওয়ার সময় পরিবর্তিত হবে।
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="package-card">
                            <h5>ফ্রি প্যাকেজ</h5>
                            <p>মেয়াদ: ৩ দিন</p>
                            <p>বাজারের মৌলিক তথ্য প্রদান করা হবে।</p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">ফ্রি প্যাকেজ দেখুন</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="package-card">
                            <h5>সিলভার প্যাকেজ</h5>
                            <p>মেয়াদ: ৩০ দিন</p>
                            <p>বাজার বিশ্লেষণ, সিগন্যাল প্রদান এবং সাপ্তাহিক প্রতিবেদন অন্তর্ভুক্ত।</p>
                            <a href="{{ route('package.view', ['slug' => 'silver']) }}" class="btn btn-primary rounded-pill py-2 px-4">
                                সিলভার প্যাকেজ দেখুন
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="package-card">
                            <h5>গোল্ড প্যাকেজ</h5>
                            <p>মেয়াদ: ৩০ দিন</p>
                            <p>বাজার বিশ্লেষণ, সিগন্যাল প্রদান,বিশ্লেষণ রিপোর্ট,কাস্টমার প্রতিনিধির সাথে যোগাযোগ এবং সাপ্তাহিক প্রতিবেদন অন্তর্ভুক্ত।</p>
                            <a href="{{ route('package.view', ['slug' => 'gold']) }}" class="btn btn-primary rounded-pill py-2 px-4">গোল্ড প্যাকেজ দেখুন</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="package-card">
                            <h5>ভিআইপি প্যাকেজ</h5>
                            <p>মেয়াদ: ৩০ দিন</p>
                            <p>বাজারের গভীর বিশ্লেষণ, সার্বক্ষণিক মনিটরিং,কাস্টমাইজড সিগন্যাল এবং দৈনিক আপডেট অন্তর্ভুক্ত।</p>
                            <a href="{{ route('package.view', ['slug' => 'vip']) }}" class="btn btn-primary rounded-pill py-2 px-4">ভিআইপি প্যাকেজ দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="special-offer">
                    <h4>বিশেষ অফার</h4>
                    <p>এখনই রেজিস্টার করুন এবং আমাদের প্রিমিয়াম প্যাকেজটি ৫০% ছাড়ে পান!</p>
                    <a href="#" class="btn btn-primary rounded-pill py-2 px-4">বিশেষ অফার পেতে ক্লিক করুন</a>
                </div>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Hide the success message after 2 seconds
        $(document).ready(function () {
            setTimeout(function () {
                $("#successMessage").fadeOut("slow");
            }, 2000);

            setTimeout(function () {
                $("#errorMessage").fadeOut("slow");
            }, 2000);
        });
    </script>
