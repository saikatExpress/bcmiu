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

    <div class="container mt-3">
        <div class="section">
            <h2 class="section-title">1. Introduction</h2>
            <div class="section-content">
                <p>Welcome to ONNOTOMO Portfolio Management System. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our services.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">2. Information We Collect</h2>
            <div class="section-content">
                <p>We may collect personal information such as your name, email address, and financial data when you use our services. This information is necessary to provide and improve our services.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">3. How We Use Your Information</h2>
            <div class="section-content">
                <p>Your information helps us to provide a better experience by personalizing our services and communicating with you. We may also use it for marketing purposes, but only with your consent.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">4. Data Security</h2>
            <div class="section-content">
                <p>We implement robust security measures to protect your data from unauthorized access, alteration, or disclosure. However, no method of transmission over the Internet or electronic storage is 100% secure.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">5. Third-Party Services</h2>
            <div class="section-content">
                <p>Our services may contain links to third-party websites or services. We are not responsible for their privacy practices or content. We recommend reviewing their privacy policies before providing any personal information.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">6. Your Rights</h2>
            <div class="section-content">
                <p>You have the right to access, correct, or delete your personal information. You can also withdraw consent for processing your data at any time by contacting us.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">7. Changes to This Policy</h2>
            <div class="section-content">
                <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and we will notify you of significant updates through our services.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">8. Contact Us</h2>
            <div class="section-content">
                <p>If you have any questions or concerns about our Privacy Policy, please contact us at:</p>
                <p>Email: {{ $setting->project_email }}<br>
                    Whatsapp: +88 <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank"> {{ $setting->project_mobile }}
                        </a><br>
                    Phone: +88 {{ $setting->project_mobile1 }}<br>
                    Address: {{ $setting->project_address }}</p>
            </div>
        </div>
    </div>
@endsection
