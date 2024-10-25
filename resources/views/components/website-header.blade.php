<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0 d-none d-lg-block">
        <h1 class="text-primary">
            <i class="fas fa-solid fa-money-bill"></i>
            {{ $setting->project_name }}
        </h1>
        {{-- <img src="{{ asset('logos/onnotomo_logo.jpeg') }}" alt="Logo"> --}}
    </a>

    <div class="navbar-brand p-0 d-lg-none">
        <div style="display: flex; justify-content:space-between; align-items:center;">
            <a href="{{ route('home') }}">
                <h1 class="text-primary" style="font-size: 20px; margin-bottom:0%; margin-right:1rem;">
                    <i class="fas fa-solid fa-money-bill"></i>
                    <img src="{{ asset('logos/bgia.png') }}" alt="">
                    {{ $setting->project_name }}
                </h1>
            </a>

            {{-- <img src="{{ asset('logos/onnotomo_logo.jpeg') }}" alt="Logo" style="margin-right:1rem;border-radius:50%;"> --}}
            <h1 class="text-primary" style="font-size: 20px; margin-bottom:0%; margin-right:1rem;">
                <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" target="_blank" class="btn btn-sm btn-primary">
                    <i style="font-size: 20px;" class="fa-brands fa-whatsapp"></i>
                </a>
            </h1>
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                Login
            </a>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="javascript:void();" data-url="{{ route('about') }}" class="nav-item nav-link menuBtn">About</a>
            <a href="https://wa.me/88{{ $setting->project_mobile }}?text=Hello%20" class="nav-item nav-link" target="_blank">Contact</a>
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0 d-none d-lg-inline">
            Login/Signup
        </a>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('website/js/menu.js') }}"></script>

