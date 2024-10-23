@extends('website.layout.app')

@section('content')

    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>ONNTOMO</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link active">About</a>
                    <a href="https://wa.me/8801671425022?text=Hello%20" class="nav-item nav-link" target="_blank">Contact Us</a>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Get Started</a>
            </div>
        </nav>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Show Service</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Service</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->
    </div>

    <div class="container-fluid about py-5">
        <div class="container py-5">
            <!-- Service Content Start -->
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('serviceimages/' . $service->service_image) }}" class="img-fluid rounded" alt="{{ $service->title }}">
                </div>
                <div class="col-md-8">
                    <h2 class="mt-2">{{ $service->title }}</h2>
                    <p class="text-muted">Published on {{ $service->created_at->format('d M Y') }}</p>
                    <p style="line-height: 2rem; font-size: 1rem; color: #000; text-align: justify;">{{ $service->description }}</p>
                </div>
            </div>
            <!-- Service Content End -->

            <!-- Related Services Start -->
            <div class="related-services py-5">
                <h3>Related Services</h3>
                <div class="row">
                    @foreach($otherservices as $otherService)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('serviceimages/' . $otherService->service_image) }}" class="card-img-top" alt="{{ $otherService->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $otherService->title }}</h5>
                                    <p class="card-text">{{ Str::limit($otherService->description, 100, '...') }}</p>
                                    <a href="{{ route('service.show', $otherService->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Related Services End -->
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .bg-breadcrumb {
            background-color: #f8f9fa;
        }

        .about {
            background-color: #ffffff;
        }

        .img-fluid {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-muted {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .related-services {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #333;
        }
    </style>
@endpush
