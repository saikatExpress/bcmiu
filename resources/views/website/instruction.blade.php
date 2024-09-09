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
            <h2 class="section-title">Instruction (নিয়মাবলী)</h2>

            <div class="section-content">
                <h3>ওয়েবসাইট ব্যবহারের নির্দেশনা</h3>
                <ul class="instruction-list">
                    <li>ওয়েবসাইটের প্রধান পৃষ্ঠায় প্রবেশ করার পর, মেনু বারের মাধ্যমে বিভিন্ন বিভাগে যেতে পারেন।</li>
                    <li>আপনার প্রয়োজনীয় তথ্য খুঁজে পেতে, সার্চ বক্স ব্যবহার করুন।</li>
                </ul>

                <h3>রেজিস্ট্রেশন কিভাবে করবেন</h3>
                <ul class="instruction-list">
                    <li>ওয়েবসাইটের উপরের ডান কোণে "রেজিস্টার" বোতাম ক্লিক করুন।</li>
                    <li>নাম, ইমেইল, পাসওয়ার্ড সহ প্রয়োজনীয় তথ্য পূরণ করুন।</li>
                    <li>আপনার ইমেইলে প্রেরিত নিশ্চিতকরণ লিংক ক্লিক করে রেজিস্ট্রেশন সম্পন্ন করুন।</li>
                </ul>

                <h3>লগইন কিভাবে করবেন</h3>
                <ul class="instruction-list">
                    <li>ওয়েবসাইটের উপরের ডান কোণে "লগইন" বোতাম ক্লিক করুন।</li>
                    <li>আপনার ইমেইল এবং পাসওয়ার্ড প্রবেশ করান।</li>
                    <li>"লগইন" বোতাম ক্লিক করে আপনার অ্যাকাউন্টে প্রবেশ করুন।</li>
                </ul>

                <h3>যদি কোন সমস্যা হয়, যোগাযোগ করুন</h3>
                <div class="contact-info">
                    <p><i class="fas fa-envelope"></i> ইমেইল: {{ $setting->project_email }}</p>
                    <p><i class="fas fa-phone"></i> ফোন: +880 {{ $setting->project_mobile }}</p>
                    <p><i class="fab fa-whatsapp"></i> হোয়াটসঅ্যাপ: +880
                        <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello ONNOTOMO%20" target="_blank">
                            {{ $setting->project_mobile }}
                        </a>
                    </p>
                    <p><i class="fas fa-map-marker-alt"></i> অফিসের ঠিকানা: {{ $setting->project_address }}</p>
                </div>
            </div>

        </div>
    </div>
