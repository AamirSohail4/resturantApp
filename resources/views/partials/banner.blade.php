<!-- Hero Banner Section -->
<section class="relative w-full h-[500px] md:h-[600px] lg:h-[700px] overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0">
    <img src="{{ asset('images/banners/carts-t5dZ4HaD.jpg') }}" 
         alt="Banner" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/70"></div>
  </div>
  
  <!-- Content -->
  <div class="relative z-10 h-full flex items-center justify-center px-4">
    <div class="text-center text-white max-w-4xl mx-auto">
      <!-- Logo -->
      <div class="mb-6 animate-fade-in">
        <img src="{{ asset('images/logos/logo-uZU3KaFE.png') }}" 
             alt="Pak Punjab Logo" 
             class="h-24 md:h-32 lg:h-40 mx-auto object-contain drop-shadow-2xl">
      </div>
      
      <!-- Restaurant Name -->
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-4 animate-slide-up">
        Pak Punjab
      </h1>
      
      <!-- Tagline -->
      <p class="text-xl md:text-2xl lg:text-3xl mb-8 text-gray-200 font-light animate-slide-up-delay">
        Authentic Pakistani & Punjabi Cuisine
      </p>
      
      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-delay">
        <a href="#menu-section" 
           class="px-8 py-3 bg-[#D4AF37] text-white rounded-lg font-semibold hover:bg-[#B8860B] transition-all duration-300 transform hover:scale-105 shadow-lg scroll-smooth">
          View Menu
        </a>
        <a href="{{ url('/contact') }}" 
           class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-[#1B5E20] hover:border-[#1B5E20] transition-all duration-300">
          Contact Us
        </a>
      </div>
    </div>
  </div>
  
  <!-- Scroll Indicator -->
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
    </svg>
  </div>
</section>

<style>
  @keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  @keyframes slide-up {
    from { 
      opacity: 0;
      transform: translateY(30px);
    }
    to { 
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .animate-fade-in {
    animation: fade-in 1s ease-out;
  }
  
  .animate-slide-up {
    animation: slide-up 1s ease-out;
  }
  
  .animate-slide-up-delay {
    animation: slide-up 1s ease-out 0.3s both;
  }
  
  .animate-fade-in-delay {
    animation: fade-in 1s ease-out 0.6s both;
  }
</style>
