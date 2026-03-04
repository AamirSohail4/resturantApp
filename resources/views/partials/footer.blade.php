<footer class="relative text-white overflow-hidden">
  <!-- Video Background -->
  <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover z-0">
    <source src="{{ asset('images/banners/footer-video2.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  
  <!-- Transparent Overlay -->
  <div class="absolute inset-0 bg-[#0D4F1C]/80 z-10"></div>
  
  <!-- Footer Content -->
  <div class="relative z-20 container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Column 1: About Us -->
      <div>
        <h3 class="text-xl font-bold mb-4 text-[#D4AF37]">About Pak Punjab</h3>
        <p class="text-gray-300 text-sm leading-relaxed">
          Experience authentic Pakistani and Punjabi cuisine in a warm and inviting atmosphere. 
          We bring you traditional flavors prepared with the freshest ingredients.
        </p>
      </div>

      <!-- Column 2: Quick Links -->
      <div>
        <h3 class="text-xl font-bold mb-4 text-[#D4AF37]">Quick Links</h3>
        <ul class="space-y-2">
          <li>
            <a href="{{ url('/') }}" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 text-sm">
              Home
            </a>
          </li>
          <li>
            <a href="{{ url('/about') }}" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 text-sm">
              About Us
            </a>
          </li>
          <li>
            <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 text-sm">
              Contact
            </a>
          </li>
          @auth
          @if(auth()->user()->is_admin)
          <li>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200 text-sm">
              Admin
            </a>
          </li>
          @endif
          @endauth
        </ul>
      </div>

      <!-- Column 3: Contact Information -->
      <div>
        <h3 class="text-xl font-bold mb-4 text-[#D4AF37]">Contact Us</h3>
        <ul class="space-y-3 text-sm">
          <li class="flex items-start space-x-3">
            <svg class="w-5 h-5 text-[#D4AF37] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="text-gray-300">Al Barsha 1, Barkat Building<br>Shop No. 1<br>Dubai, UAE</span>
          </li>
          <li class="flex items-center space-x-3">
            <svg class="w-5 h-5 text-[#D4AF37] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <a href="tel:+971543075932" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">+971 54 307 5932</a>
          </li>
          <li class="flex items-center space-x-3">
            <svg class="w-5 h-5 text-[#D4AF37] shrink-0" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
            <a href="https://wa.me/971547864838" target="_blank" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">+971 54 786 4838</a>
          </li>
          <li class="flex items-center space-x-3">
            <svg class="w-5 h-5 text-[#D4AF37] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <a href="mailto:pakpunjab.pk@gmail.com" class="text-gray-300 hover:text-[#D4AF37] transition-colors duration-200">pakpunjab.pk@gmail.com</a>
          </li>
        </ul>
      </div>

      <!-- Column 4: Opening Hours & Social Media -->
      <div>
        <h3 class="text-xl font-bold mb-4 text-[#D4AF37]">Opening Hours</h3>
        <ul class="space-y-2 text-sm text-gray-300 mb-6">
          <li class="flex justify-between">
            <span>Monday - Thursday</span>
            <span class="text-[#D4AF37]">11:00 AM - 10:00 PM</span>
          </li>
          <li class="flex justify-between">
            <span>Friday - Saturday</span>
            <span class="text-[#D4AF37]">11:00 AM - 11:00 PM</span>
          </li>
          <li class="flex justify-between">
            <span>Sunday</span>
            <span class="text-[#D4AF37]">12:00 PM - 9:00 PM</span>
          </li>
        </ul>
        
        <div>
          <h4 class="text-lg font-semibold mb-3 text-[#D4AF37]">Follow Us</h4>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 bg-[#1B5E20] rounded-full flex items-center justify-center hover:bg-[#D4AF37] transition-colors duration-200" aria-label="Facebook">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-[#1B5E20] rounded-full flex items-center justify-center hover:bg-[#D4AF37] transition-colors duration-200" aria-label="Instagram">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-[#1B5E20] rounded-full flex items-center justify-center hover:bg-[#D4AF37] transition-colors duration-200" aria-label="Twitter">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Images Section -->
    <div class="border-t border-[#1B5E20] mt-8 pt-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-items-center">
        <!-- Free Delivery Image -->
        <div class="flex justify-center">
          <img src="{{ asset('images/footer/homedelivery.png') }}" 
               alt="Free Delivery" 
               class="h-auto max-w-full object-contain"
               style="max-height: 120px;">
        </div>
        
        <!-- Payment Card Image -->
        <div class="flex justify-center">
          <img src="{{ asset('images/footer/payment card.png') }}" 
               alt="Card Payment Available" 
               class="h-auto max-w-full object-contain"
               style="max-height: 120px;">
        </div>
        
        <!-- QR Code Scan Image - Clickable -->
        <div class="flex justify-center">
          <img src="{{ asset('images/footer/scan.png') }}" 
               alt="Scan QR Code" 
               class="h-auto max-w-full object-contain cursor-pointer hover:scale-105 transition-transform duration-300"
               style="max-height: 120px;"
               onclick="openScanImageModal()">
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-[#1B5E20] mt-8 pt-6 text-center">
      <p class="text-gray-400 text-sm">
        &copy; {{ date('Y') }} Pak Punjab Restaurant. All rights reserved.
      </p>
    </div>
  </div>
</footer>

<!-- Scan Image Modal Popup -->
<div 
    id="scan-image-modal" 
    class="fixed inset-0 z-50 flex items-center justify-center hidden"
    onclick="closeScanImageModal(event)"
>
    <!-- Backdrop with blur -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity duration-300"></div>
    
    <!-- Modal Content -->
    <div 
        class="relative bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 transform transition-all duration-300 scale-95 opacity-0"
        id="scan-modal-content"
        onclick="event.stopPropagation()"
    >
        <!-- Close Button -->
        <button
            onclick="closeScanImageModal()"
            class="absolute top-4 right-4 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 transition-all duration-200 hover:scale-110"
            aria-label="Close"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Modal Header -->
        <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C] rounded-t-2xl">
            <h2 class="text-2xl font-bold text-white text-center">Scan QR Code</h2>
            <p class="text-white/90 text-sm text-center mt-1">Scan this code for quick access</p>
        </div>

        <!-- Image Container -->
        <div class="p-8 flex justify-center items-center bg-gray-50">
            <div class="relative">
                <!-- Glow effect around image -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#D4AF37]/20 to-[#B8860B]/20 rounded-xl blur-xl"></div>
                <img 
                    src="{{ asset('images/footer/scan.png') }}" 
                    alt="Scan QR Code" 
                    class="relative z-10 max-w-full h-auto object-contain rounded-xl shadow-2xl"
                    style="max-height: 500px;"
                >
            </div>
        </div>

        <!-- Footer Note -->
        <div class="p-4 bg-gray-50 rounded-b-2xl text-center">
            <p class="text-sm text-gray-600">
                Use your phone camera to scan this QR code
            </p>
        </div>
    </div>
</div>

<script>
  // Ensure video keeps playing
  document.addEventListener('DOMContentLoaded', function() {
    const footerVideo = document.querySelector('footer video');
    if (footerVideo) {
      footerVideo.muted = true;
      footerVideo.play().catch(function(error) {
        console.log('Video autoplay prevented:', error);
      });
      
      // Restart video if it pauses
      footerVideo.addEventListener('pause', function() {
        footerVideo.play();
      });
      
      // Ensure video loops continuously
      footerVideo.addEventListener('ended', function() {
        footerVideo.currentTime = 0;
        footerVideo.play();
      });
    }
  });

  // Scan Image Modal Functions
  function openScanImageModal() {
    const modal = document.getElementById('scan-image-modal');
    const content = document.getElementById('scan-modal-content');
    
    if (modal && content) {
      modal.classList.remove('hidden');
      // Trigger animation
      setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
      
      // Prevent body scroll
      document.body.style.overflow = 'hidden';
    }
  }

  function closeScanImageModal(event) {
    const modal = document.getElementById('scan-image-modal');
    const content = document.getElementById('scan-modal-content');
    
    // If clicking backdrop, close modal
    if (event && event.target && event.target.id === 'scan-image-modal') {
      if (modal && content) {
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
          modal.classList.add('hidden');
          document.body.style.overflow = '';
        }, 300);
      }
    } else if (modal && content) {
      // Close button clicked or called directly
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
      }, 300);
    }
  }

  // Close modal on Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      const modal = document.getElementById('scan-image-modal');
      if (modal && !modal.classList.contains('hidden')) {
        closeScanImageModal();
      }
    }
  });
</script>
