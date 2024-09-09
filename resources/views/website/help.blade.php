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


<div class="container mt-4">
    <div class="section">
        <h2 class="section-title">Frequently Asked Questions (FAQs)</h2>
        <div class="section-content">
            <div class="faq-item">
                <div class="faq-question">1. How do I create an account?</div>
                <div class="faq-answer">To create an account, click on the "Sign Up" button on the top right corner of the homepage. Fill out the required fields and submit the form. You will receive a confirmation email to activate your account.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">2. How can I reset my password?</div>
                <div class="faq-answer">If you’ve forgotten your password, click on the "Forgot Password" link on the login page. Enter your email address and follow the instructions sent to your email to reset your password.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">3. How do I contact customer support?</div>
                <div class="faq-answer">You can reach our customer support team by visiting the "Contact Us" page on our website. Fill out the contact form with your details and query, and we will get back to you as soon as possible.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">4. What should I do if I encounter technical issues?</div>
                <div class="faq-answer">If you experience technical problems, try refreshing the page or clearing your browser's cache. If the issue persists, please contact our support team with details about the problem you are facing.</div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Support Contact</h2>
        <div class="section-content">
            <p>If you need further assistance, feel free to contact us directly:</p>
            <ul>
                <li><strong>Email:</strong> {{ $setting->project_email }}</li>
                <li><strong>Whatsapp:</strong>
                    <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank">
                        +88 {{ $setting->project_mobile }}
                    </a>
                </li>
                <li><strong>Phone:</strong> +88 {{ $setting->project_mobile1 }}</li>
                <li><strong>Address:</strong> {{ $setting->project_address }}</li>
            </ul>
        </div>
    </div>
</div>

@endsection
