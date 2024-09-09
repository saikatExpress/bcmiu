@extends('website.layout.app')
@section('content')

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

    <div class="container mt-5">
        <div class="section">
            <div class="payment_details">
                <h2 class="mb-4">পেমেন্ট</h2>
                <div class="payment-methods">
                    @foreach ($methods as $item)
                        <div class="payment-method">
                            <img src="{{ asset('logos/' . $item->slug . '.png') }}" alt="{{ ucfirst($item->slug) }}">
                            <div class="payment-info">
                                <h4 class="payment-title">{{ ucfirst($item->slug) }}</h4>
                                <p>{{ ucfirst($item->slug) }} No: {{ $item->number }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="package-details">
                <div class="package-details-card">
                    <h2 class="package-title">{{ $package->name }}</h2>
                    <div class="package-info">
                        <p><strong>মেয়াদ:</strong> {{ $package->validity }} দিন</p>
                        <p><strong>বর্ণনা:</strong>
                            @if ($package->slug === 'silver')
                                বাজার বিশ্লেষণ, সিগন্যাল প্রদান এবং বিশ্লেষণ রিপোর্ট অন্তর্ভুক্ত।
                            @elseif ($package->slug === 'gold')
                                বাজার বিশ্লেষণ, সিগন্যাল প্রদান,বিশ্লেষণ রিপোর্ট,কাস্টমার প্রতিনিধির সাথে যোগাযোগ এবং সাপ্তাহিক প্রতিবেদন অন্তর্ভুক্ত।
                            @elseif ($package->slug === 'vip')
                                বাজারের গভীর বিশ্লেষণ, সার্বক্ষণিক মনিটরিং,কাস্টমাইজড সিগন্যাল এবং দৈনিক আপডেট অন্তর্ভুক্ত।
                            @endif
                        </p>
                        <p class="package-price">মূল্য: ৳{{ $package->price }}</p>
                    </div>
                </div>

                <div class="buy-now-section">

                    <div id="congratulations-message" class="congratulations-message">
                        <h4>Congratulations..!</h4>
                        <p id="resMsg"></p>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-success">Login</a>
                        <div class="flowers"></div>
                    </div>

                    <div id="success_form">
                        <h4>প্যাকেজটি কেনার জন্য</h4>
                        <div id="loader" class="custom-loader">
                            <div class="custom-spinner"></div>
                        </div>

                        <form action="{{ route('buy') }}" method="POST" id="packageForm">
                            @csrf
                            <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}">
                            <input type="hidden" name="package_slug" id="package_slug" value="{{ $package->slug }}">

                            <div class="form-group">
                                <label>পেমেন্ট পদ্ধতি:</label>
                                <label for="" id="payment_method"></label>
                                <div class="payment-methods">
                                    @foreach ($methods as $item)
                                        @if ($item->slug === 'bkash')
                                            <div class="payment-method">
                                                <input type="radio" id="payment_bkash" name="payment_method" value="{{ $item->slug }}">
                                                <label for="payment_bkash" style="background-color: darkred;color: #fff;border-radius: 4px;">
                                                    <img src="{{ asset('logos/bkash.png') }}" alt="Bkash">
                                                    <span>{{ $item->name }}</span>
                                                </label>
                                            </div>
                                        @elseif ($item->slug === 'nagad')
                                            <div class="payment-method">
                                                <input type="radio" id="payment_nagad" name="payment_method" value="{{ $item->slug }}">
                                                <label for="payment_nagad" style="background: #fb8f0b;border-radius: 4px;color: #fff;">
                                                    <img src="{{ asset('logos/nagad.png') }}" alt="Nagad">
                                                    <span>{{ $item->name }}</span>
                                                </label>
                                            </div>
                                        @elseif ($item->slug === 'rocket')
                                            <div class="payment-method">
                                                <input type="radio" id="payment_rocket" name="payment_method" value="{{ $item->slug }}">
                                                <label for="payment_rocket" style="background: purple;border-radius: 4px;color: #fff;">
                                                    <img src="{{ asset('logos/rocket.png') }}" alt="Rocket">
                                                    <span>{{ $item->name }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email">ইমেইল: <span class="text-danger">*</span><span class="text-danger" style="font-size: 8px;">(যদি ইতিমধ্যে আপনার একাউন্ট করা থাকে তাহলে সে মেইল টা দিন)</span></label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name">নাম: <span class="text-danger">*</span><span></span></label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">ফোন:
                                    <span class="text-danger">*</span>
                                    <span class="text-success" style="font-size: 8px;">(যে নাম্বার থেকে টাকা পাঠাচ্ছেন সে নাম্বার অথবা আপনার ফোন নাম্বার দিন।)</span>
                                </label>
                                <input type="text" id="phone" name="phone" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">ট্রান্সজেকশন নাম্বার(Transaction Number): <span class="text-danger">*</span></label>
                                <input type="text" id="transaction_number" name="transaction_number" class="form-control">
                            </div>
                            <br>
                            <div class="form-group passwordForm" style="display: none;">
                                <label for="">Password: <span class="text-danger">*</span></label>
                                <p class="text-danger" style="margin-bottom: 0;" id="passwordText"></p>
                                <input type="password" name="password" id="password" class="form-control">
                                <span id="passErr" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 mt-3">এখনই কিনুন</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('website/js/purchase.js') }}"></script>
@endsection
