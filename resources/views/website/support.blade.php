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
            <h2 class="section-title">Contact Us</h2>
            <div class="section-content">
                <p>If you have any questions or need assistance, please reach out to us through the following channels:</p>
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

        <div class="section">
            <h2 class="section-title">Submit a Request</h2>
            <div class="contact-form">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">FAQs</h2>
            <div class="section-content">
                <div class="mb-3">
                    <h5>Q: How do I reset my password?</h5>
                    <p>A: You can reset your password by clicking on the "Forgot Password" link on the login page and following the instructions sent to your email.</p>
                </div>
                <div class="mb-3">
                    <h5>Q: How do I update my account information?</h5>
                    <p>A: Log in to your account, navigate to the "Account Settings" section, and you will be able to update your personal information there.</p>
                </div>
                <div class="mb-3">
                    <h5>Q: How can I contact customer support?</h5>
                    <p>Email: {{ $setting->project_email }}<br>
                    Whatsapp: +88 <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank"> {{ $setting->project_mobile }}
                        </a><br>
                    Phone: +88 {{ $setting->project_mobile1 }}<br>
                    Address: {{ $setting->project_address }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection


