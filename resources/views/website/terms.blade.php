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
        <div class="card">
            <div class="card-header">
                1. Introduction
            </div>
            <div class="card-body">
                <p>Welcome to ONNOTOMO Portfolio Management System. These Terms and Conditions govern your use of our website and services. By accessing or using our services, you agree to comply with and be bound by these terms.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                2. Services
            </div>
            <div class="card-body">
                <p>ONNOTOMO provides a portfolio management system designed to assist you with managing your investments. We offer various features and services to help you track and optimize your investment portfolio.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                3. User Responsibilities
            </div>
            <div class="card-body">
                <p>You agree to use our services only for lawful purposes and in accordance with these Terms. You must ensure that any information you provide is accurate, complete, and up-to-date.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                4. Account Security
            </div>
            <div class="card-body">
                <p>You are responsible for maintaining the confidentiality of your account information, including your username and password. You agree to notify us immediately of any unauthorized use of your account.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                5. Intellectual Property
            </div>
            <div class="card-body">
                <p>All content, trademarks, and other intellectual property on our website are owned by or licensed to ONNOTOMO. You may not use or reproduce any of our intellectual property without our prior written consent.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                6. Limitation of Liability
            </div>
            <div class="card-body">
                <p>ONNOTOMO will not be liable for any direct, indirect, incidental, or consequential damages arising from your use of our services. Our liability is limited to the maximum extent permitted by law.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                7. Changes to Terms
            </div>
            <div class="card-body">
                <p>We may update these Terms from time to time. Any changes will be posted on this page, and it is your responsibility to review these Terms periodically. Your continued use of our services constitutes your acceptance of any changes.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                8. Governing Law
            </div>
            <div class="card-body">
                <p>These Terms are governed by and construed in accordance with the laws of Bangladesh. Any disputes arising under or in connection with these Terms will be subject to the exclusive jurisdiction of the courts of [Your Country].</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                9. Contact Us
            </div>
            <div class="card-body">
                <p>If you have any questions or concerns about these Terms, please contact us at:</p>
                <p>Email: {{ $setting->project_email }}<br>
                    Whatsapp: +88 <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank"> {{ $setting->project_mobile }}
                        </a><br>
                    Phone: +88 {{ $setting->project_mobile1 }}<br>
                    Address: {{ $setting->project_address }}</p>
            </div>
        </div>
    </div>
@endsection

