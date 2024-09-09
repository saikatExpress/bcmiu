<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('logos/profile.png') }}" type="image/x-icon">
    <title>Register | MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css"/>
    <link rel="stylesheet" href="{{ asset('website/css/register.css') }}">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div id="loader" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50" style="display: none;">
        <div class="loader border-t-transparent border-solid border-4 border-indigo-600 border-t-4 rounded-full w-16 h-16"></div>
    </div>


    <div class="form-container bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <img src="{{ asset('logos/BC.png') }}" alt="Logo" class="w-24 mx-auto mb-4">
            <h1 class="text-2xl font-semibold text-gray-700">Create Your Account</h1>
            <p class="text-gray-500">Please fill in the details below to register.</p>
        </div>
        <p style="color: red;margin-bottom: 10px;font-weight: 600;" id="registrationMsg">

        </p>
        <p style="color: green;margin-bottom: 10px;font-weight: 600;" id="registrationSuccessMsg">

        </p>
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus" value="{{ old('name') }}">
                @error('name')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span id="nameErr" class="text-sm text-danger" style="color: red;"></span>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus" value="{{ old('email') }}">
                @error('email')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span id="emailErr" class="text-sm text-danger" style="color: red;"></span>
            </div>

            <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input id="mobile" name="mobile" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus" value="{{ old('mobile') }}">
                @error('mobile')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span id="mobileErr" class="text-sm text-danger" style="color: red;"></span>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus">
                @error('password')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span id="passwordErr" class="text-sm text-danger" style="color: red;"></span>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm input-focus">
                @error('password_confirmation')
                    <p class="error-message mt-2 text-sm">{{ $message }}</p>
                @enderror
                <span id="conpasswordErr" class="text-sm text-danger" style="color: red;"></span>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>
        </form>

        <div class="text-center">
            <p class="text-gray-500">Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login here</a>.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('website/js/register.js') }}"></script>
</body>
</html>
