<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name', 'Pak Punjab') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logos/pak.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 p-4">

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <!-- Logo -->
        <div class="flex items-center space-x-2 mb-6">
            <img src="{{ asset('images/logos/pklogo.png') }}" 
                 alt="Pak Punjab Logo" 
                 class="h-10 w-auto object-contain">
            <span class="text-[#1B5E20] font-bold text-lg">Pak Punjab Restaurant</span>
        </div>

        <!-- Heading -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Admin Login</h2>
            <p class="text-sm text-gray-600 mt-1">Sign in to access the admin panel</p>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
        <div class="mb-4 bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="flex-1">
                    <p class="text-sm font-medium text-red-800">Login failed</p>
                    <p class="text-sm text-red-700 mt-1">{{ $errors->first() }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       autocomplete="email"
                       placeholder="admin@pakpunjab.com"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none transition">
            </div>

            <!-- Password -->
            <div>
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="text-sm font-medium text-gray-700">
                        Password
                    </label>
                </div>

                <input type="password"
                       name="password"
                       id="password"
                       required
                       autocomplete="current-password"
                       placeholder="Enter your password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none transition">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="remember" 
                           id="remember"
                           class="h-4 w-4 text-[#1B5E20] rounded border-gray-300 focus:ring-[#1B5E20]">
                    <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                    class="w-full bg-[#1B5E20] hover:bg-[#0D4F1C] text-white py-2.5 rounded-lg font-medium transition duration-200 shadow-md hover:shadow-lg">
                Sign In
            </button>

        </form>

        <!-- Footer -->
        <div class="mt-6 pt-6 border-t border-gray-100">
            <p class="text-xs text-gray-500 text-center">
                Secure session • Expires after 2 hours of inactivity
            </p>
        </div>

    </div>

</body>
</html>