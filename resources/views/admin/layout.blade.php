<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name', 'Pak Punjab') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logos/pak.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile Menu Toggle -->
    <button id="mobile-menu-toggle" class="lg:hidden fixed top-4 left-4 z-50 bg-[#0D4F1C] text-white p-2 rounded-lg shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-64 bg-[#0D4F1C] text-white flex flex-col shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="p-4 sm:p-6 border-b border-[#1B5E20] flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white rounded-lg flex items-center justify-center p-1.5 shadow-sm">
                        <img src="{{ asset('images/logos/pklogo.png') }}"
                             alt="Pak Punjab Logo"
                             class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-base sm:text-lg font-bold">Admin Panel</h1>
                        <p class="text-xs text-gray-300 hidden sm:block">Pak Punjab</p>
                    </div>
                </div>
                <button id="close-sidebar" class="lg:hidden text-gray-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-3 sm:p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-[#1B5E20] text-white shadow-lg' : 'text-gray-300 hover:bg-[#1B5E20]/50 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Dashboard</span>
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-[#1B5E20] text-white shadow-lg' : 'text-gray-300 hover:bg-[#1B5E20]/50 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Products</span>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-[#1B5E20] text-white shadow-lg' : 'text-gray-300 hover:bg-[#1B5E20]/50 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Categories</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-[#1B5E20] text-white shadow-lg' : 'text-gray-300 hover:bg-[#1B5E20]/50 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Users</span>
                </a>

                <div class="pt-4 border-t border-[#1B5E20]">
                    <a href="{{ url('/') }}"
                       class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg text-gray-300 hover:bg-[#1B5E20]/50 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium text-sm sm:text-base">Back to Site</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Sidebar Overlay (Mobile) -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-3 sm:px-6 py-3 sm:py-4">
                <div class="flex items-center justify-between lg:justify-between flex-wrap gap-3">
                    <!-- Left Spacer (Mobile only - for centering balance) -->
                    <div class="flex-1 lg:hidden"></div>
                    
                    <!-- Heading (Centered on mobile, left-aligned on desktop) -->
                    <h2 class="flex-1 text-center lg:text-left lg:flex-none text-xl sm:text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    
                    <!-- User Info & Logout (Right side) -->
                    <div class="flex items-center space-x-2 sm:space-x-4 flex-shrink-0">
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#1B5E20] rounded-full flex items-center justify-center text-white font-semibold text-sm sm:text-base">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="flex items-center space-x-1 sm:space-x-2 px-2 sm:px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="font-medium text-sm sm:text-base">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-3 sm:p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between">
                        <span>{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @include('partials.toast')

    <!-- Mobile Menu Script -->
    <script>
        // Mobile sidebar toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const closeSidebar = document.getElementById('close-sidebar');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebarMenu() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }

        mobileMenuToggle?.addEventListener('click', openSidebar);
        closeSidebar?.addEventListener('click', closeSidebarMenu);
        sidebarOverlay?.addEventListener('click', closeSidebarMenu);

        // Close sidebar on navigation link click (mobile)
        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    closeSidebarMenu();
                }
            });
        });
    </script>

    <!-- Session Timeout Warning Script -->
    <script>
        let sessionTimeout = {{ config('session.lifetime', 120) * 60 * 1000 }}; // Convert minutes to milliseconds
        let warningTime = sessionTimeout - (5 * 60 * 1000); // Show warning 5 minutes before timeout
        let warningShown = false;

        function checkSessionTimeout() {
            let timeSinceLastActivity = Date.now() - (sessionTimeout);

            if (timeSinceLastActivity > warningTime && !warningShown) {
                warningShown = true;
                showSessionWarning();
            }
        }

        function showSessionWarning() {
            let warning = document.createElement('div');
            warning.className = 'fixed top-4 right-4 bg-yellow-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 flex items-center space-x-4';
            warning.innerHTML = `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <div>
                    <p class="font-semibold">Session Expiring Soon</p>
                    <p class="text-sm">Your session will expire in 5 minutes. Click anywhere to extend.</p>
                </div>
                <button onclick="this.parentElement.remove(); warningShown = false;" class="ml-4 text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            document.body.appendChild(warning);

            // Extend session on any activity
            document.addEventListener('click', extendSession);
            document.addEventListener('keypress', extendSession);

            // Auto remove after 5 minutes
            setTimeout(() => {
                warning.remove();
                window.location.href = '{{ route("admin.login") }}';
            }, 5 * 60 * 1000);
        }

        function extendSession() {
            // Make a request to extend session
            fetch('{{ route("admin.dashboard") }}', { method: 'HEAD', credentials: 'same-origin' })
                .then(() => {
                    warningShown = false;
                    document.querySelector('.fixed.top-4.right-4')?.remove();
                });
        }

        // Check every minute
        setInterval(checkSessionTimeout, 60 * 1000);
    </script>

    </script>
</body>
</html>
