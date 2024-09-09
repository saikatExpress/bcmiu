@extends('admin.layout.app')
<style>
    #loaderGif img{
        width: 80px;
        height: 80px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 10px;
        border-radius: 50%;
    }
    .saturate {filter: saturate(7);}
    .grayscale {filter: grayscale(100%);}
    .contrast {filter: contrast(180%);}
</style>
@section('content')
    <div class="main-container">
        @if (session()->has('message'))
            <div class="alert alert-success" id="successAlert">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger" id="errorAlert">
                {{ session('error') }}
            </div>
        @endif

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div id="loaderGif" style="display: none;">
                    <img src="{{ asset('logos/200w.gif') }}" alt="Loading..." class="saturate">
                </div>
                <header class="">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('create.faq') }}" data-target="#content">
                                        Faq
                                    </a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('faq.list') }}" data-target="#content">
                                        Faq List
                                    </a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('create.about') }}" data-target="#content">
                                        Update About
                                    </a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('create.banner') }}" data-target="#content">
                                        Banner
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('banner.list') }}" data-target="#content">
                                        Banner List
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('create.service') }}" data-target="#content">
                                        Service
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('service.list') }}" data-target="#content">
                                        Service List
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-url="{{ route('project.info') }}" data-target="#content">
                                        Project Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                <div class="mt-3" style="height: 100%;">
                    <div id="content" style="padding: 8px 10px 8px;">

                    </div>
                </div>
            </div>


            <div class="footer-wrap pd-20 mb-20 card-box">
                DREAM WEB - Authentic Admin Template By
                <a href="#" target="_blank">DREAMBUZZ</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/admin/website.js') }}" async></script>

    <script>
        $(document).ready(function () {
            $("#refreshButton").click(function () {
                $("#myForm")[0].reset();
            });
        });
    </script>
@endsection
