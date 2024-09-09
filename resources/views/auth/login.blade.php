<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('logos/profile.png') }}" type="image/x-icon">
    <title>Login | MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div id="loader" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50" style="display: none;">
        <div class="loader border-t-transparent border-solid border-4 border-indigo-600 border-t-4 rounded-full w-16 h-16"></div>
    </div>
    <div class="form-container bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <img src="{{ asset('logos/BC.png') }}" alt="Logo" class="w-24 mx-auto mb-4">
            <h1 class="text-2xl font-semibold text-gray-700">Welcome Back</h1>
            <p class="text-gray-500">Please login to your account.</p>
        </div>

        <p class="error-msg" id="errorMessage">

        </p>
        <p style="color: green;margin-bottom: 10px;font-weight: 600;" id="registrationSuccessMsg">

        </p>

        <form method="POST" action="{{ route('login.store') }}" id="loginForm">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus" value="{{ old('email') }}">
                @error('email')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span class="error-msg" id="emailErr"></span>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus">
                @error('password')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span class="error-msg" id="passwordErr"></span>
            </div>

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot your password?</a>
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Login
                </button>
            </div>
        </form>

        <div class="text-center">
            <p class="text-gray-500">Don't have an account? <a href="{{ route('signup.create') }}" class="text-indigo-600 hover:underline">Register here</a>.</p>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('website/js/login.js') }}"></script>
</body>
</html>
