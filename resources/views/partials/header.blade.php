<header class="bg-white/95 backdrop-blur shadow-md sticky top-0 z-50 border-b border-gray-100">
  <div class="container mx-auto px-4 lg:px-6">
    <div class="flex items-center justify-between h-20">
      <!-- Logo and Brand Name -->
      <a href="{{ url('/') }}" class="flex items-center space-x-4 group">
        <div class="shrink-0">
          <img src="{{ asset('images/logos/paklogo.png') }}" 
               alt="Pak Punjab Logo" 
               class="h-10 w-auto md:h-12 object-contain transition-transform duration-300 group-hover:scale-110">
        </div>
        <div class="flex flex-col leading-tight">
          <span class="text-2xl md:text-3xl font-extrabold text-[#1B5E20] tracking-tight">
            Pak Punjab
          </span>
          <span class="text-xs md:text-sm uppercase tracking-[0.2em] text-gray-500">
            Restaurant
          </span>
        </div>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-3">
        <div class="flex items-center space-x-1 bg-white/80 px-2 py-1 rounded-full shadow-sm border border-gray-100">
          <a href="{{ url('/') }}" 
             class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-full transition-all duration-200 font-medium {{ request()->is('/') ? 'text-[#1B5E20] bg-green-50' : '' }}">
            Home
          </a>
          <a href="{{ url('/about') }}" 
             class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-full transition-all duration-200 font-medium {{ request()->is('about') ? 'text-[#1B5E20] bg-green-50' : '' }}">
            About
          </a>
          <a href="{{ url('/contact') }}" 
             class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-full transition-all duration-200 font-medium {{ request()->is('contact') ? 'text-[#1B5E20] bg-green-50' : '' }}">
            Contact
          </a>
        </div>
        
        <!-- Cart Icon / Shopping Bucket -->
        <a href="{{ route('cart.index') }}" class="relative p-3 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-full transition-all duration-200 border border-gray-200 hover:border-[#1B5E20]">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          <span id="cart-count" class="absolute -top-1 -right-1 bg-[#D4AF37] text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow-lg {{ array_sum(session('cart', [])) > 0 ? '' : 'hidden' }}">
            {{ array_sum(session('cart', [])) }}
          </span>
        </a>
      </nav>

      <!-- Mobile Menu Button and Cart -->
      <div class="md:hidden flex items-center space-x-2">
        <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-700 hover:text-[#1B5E20] focus:outline-none rounded-full border border-gray-200 bg-white/90">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          <span id="cart-count-mobile" class="absolute -top-1 -right-1 bg-[#D4AF37] text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow-lg {{ array_sum(session('cart', [])) > 0 ? '' : 'hidden' }}">
            {{ array_sum(session('cart', [])) }}
          </span>
        </a>
        <button id="mobile-menu-button" class="p-2 text-gray-700 hover:text-[#1B5E20] focus:outline-none rounded-full border border-gray-200 bg-white/90">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden pb-4">
      <nav class="flex flex-col space-y-2">
        <a href="{{ url('/') }}" 
           class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-lg transition-all duration-200 font-medium {{ request()->is('/') ? 'text-[#1B5E20] bg-green-50' : '' }}">
          Home
        </a>
        <a href="{{ url('/about') }}" 
           class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-lg transition-all duration-200 font-medium {{ request()->is('about') ? 'text-[#1B5E20] bg-green-50' : '' }}">
          About
        </a>
        <a href="{{ url('/contact') }}" 
           class="px-4 py-2 text-gray-700 hover:text-[#1B5E20] hover:bg-green-50 rounded-lg transition-all duration-200 font-medium {{ request()->is('contact') ? 'text-[#1B5E20] bg-green-50' : '' }}">
          Contact
        </a>
      </nav>
    </div>
  </div>
</header>

<script>
  document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>
