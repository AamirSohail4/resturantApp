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

                <div class="relative">
                    <input type="password"
                           name="password"
                           id="password"
                           required
                           autocomplete="current-password"
                           placeholder="Enter your password"
                           class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none transition">
                    <button type="button"
                            id="togglePassword"
                            class="absolute right-3 top-0 bottom-0 flex items-center justify-center text-gray-500 hover:text-gray-700 focus:outline-none transition-colors"
                            aria-label="Toggle password visibility">
                        <!-- Eye icon (show password) -->
                        <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <!-- Eye slash icon (hide password) - hidden by default -->
                        <svg id="eyeSlashIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m0 0A9.97 9.97 0 015.12 5.12m3.47 3.47L12 12m-3.41-3.41l3.41 3.41M12 12l3.41 3.41m0 0a9.97 9.97 0 001.99-1.99M15.41 15.41L12 12m3.41 3.41l3.29 3.29M21 21l-3.29-3.29"></path>
                        </svg>
                    </button>
                </div>
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

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        });
    </script>

</body>
</html>