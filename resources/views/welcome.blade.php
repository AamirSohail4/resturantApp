@extends('layouts.app')

@section('content')
<!-- Menu Section with Background Image -->
<section id="menu-section" class="relative py-12 sm:py-16 lg:py-20 overflow-hidden bg-cover bg-center bg-no-repeat scroll-mt-20" style="background-image: url('{{ asset('images/menu/menu_back.png') }}');">
  <!-- Content -->
  <div class="relative z-10 container mx-auto px-3 sm:px-4">
    <div class="text-center mb-8 sm:mb-12">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4">Our Menu</h2>
      <p class="text-base sm:text-lg md:text-xl text-green-100 max-w-2xl mx-auto">
        Discover our authentic Pakistani & Punjabi dishes prepared with traditional recipes
      </p>
    </div>
    
    <div class="flex flex-col lg:flex-row gap-6 lg:gap-8 max-w-7xl mx-auto items-start px-4 sm:px-6">

<!-- Sidebar - Categories -->
<div class="w-full lg:w-64 shrink-0">
  <div class="bg-black/90 backdrop-blur-sm rounded-lg p-4 sm:p-6 lg:sticky lg:top-24">
    <h3 class="text-lg sm:text-xl font-bold mb-4 text-[#D4AF37]">
      Categories
    </h3>

    <ul class="space-y-2 max-h-[320px] overflow-y-auto pr-1">

      <li>
        <a href="{{ url('/') }}" 
           class="block px-4 py-2 text-white hover:bg-[#1B5E20] rounded-lg transition duration-200 font-medium {{ !isset($selectedCategory) || !$selectedCategory ? 'bg-[#1B5E20]' : '' }}">
          All Products
        </a>
      </li>

      @forelse($categories as $category)
      <li>
        <a href="{{ url('/?category=' . $category->id) }}" 
           class="block px-4 py-2 text-white hover:bg-[#1B5E20] rounded-lg transition duration-200 font-medium {{ (isset($selectedCategory) && $selectedCategory == $category->id) ? 'bg-[#1B5E20]' : '' }}">
          {{ $category->name }}
        </a>
      </li>
      @empty
      <li class="text-gray-400 text-sm px-4 py-2">
        No categories available
      </li>
      @endforelse

    </ul>
  </div>
</div>

<!-- Product Grid -->
<div 
  id="products-grid"
  class="flex-1 w-full
         grid
         grid-cols-1
         sm:grid-cols-2
         lg:grid-cols-3
         gap-6
         justify-items-center
         lg:justify-items-start">

  @forelse($products as $product)

  <!-- Product Card -->
  <div 
    class="product-card group relative
           bg-black
           rounded-xl
           overflow-hidden
           shadow-lg
           hover:shadow-2xl
           transition-all duration-300
           transform hover:-translate-y-2
           w-full max-w-sm"
    data-category-id="{{ $product->category_id }}">

    <!-- Image -->
    <div class="relative h-48 bg-gray-900 overflow-hidden">
      <img src="{{ $product->image ? asset($product->image) : asset('images/product/p1.png') }}"
           alt="{{ $product->name }}"
           class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
    </div>

    <!-- Product Info -->
    <div class="bg-gray-900 px-4 py-4 flex items-center justify-between">

      <div class="flex-1">
        <h3 class="text-white font-semibold text-lg">
          {{ $product->name }}
        </h3>

        @if($product->name_ar)
        <p class="text-gray-400 text-sm">
          {{ $product->name_ar }}
        </p>
        @endif
      </div>

      <!-- Price -->
      <div class="bg-[#D4AF37] px-4 py-2 rounded text-center min-w-[70px]">
        <div class="text-white font-bold text-xl">
          {{ number_format($product->price, 0) }}
        </div>
        <div class="text-white text-xs">
          {{ $product->currency ?? 'AED' }}
        </div>
      </div>

    </div>

    <!-- Desktop Hover Add To Cart -->
    <div class="hidden md:flex absolute inset-0 bg-black/85 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-all duration-300 items-center justify-center">
      <button onclick="addToCart({{ $product->id }})"
              class="group/btn bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C]
                     text-white px-7 py-3 rounded-full font-semibold
                     shadow-lg transform hover:scale-105
                     transition-all duration-300 flex items-center gap-2">
        <svg class="w-5 h-5 transform group-hover/btn:-translate-y-0.5 transition-transform duration-300"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <!-- Fancy shopping cart icon -->
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l1 4m0 0h11l2-4H6z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 7l1.2 7h8.6l1.2-7H7z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 18a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm8 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
        </svg>
        <span>Add to Cart</span>
      </button>
    </div>

    <!-- Mobile Add To Cart -->
    <div class="md:hidden bg-gray-900 px-4 py-4 border-t border-gray-800">
      <button onclick="addToCart({{ $product->id }})"
              class="w-full group/btn bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C]
                     text-white py-3 rounded-full font-semibold
                     active:scale-95 transition-all duration-200 flex items-center justify-center gap-2">
        <svg class="w-5 h-5 transform group-hover/btn:-translate-y-0.5 transition-transform duration-300"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <!-- Fancy shopping cart icon -->
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l1 4m0 0h11l2-4H6z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 7l1.2 7h8.6l1.2-7H7z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 18a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm8 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
        </svg>
        <span>Add to Cart</span>
      </button>
    </div>

  </div>

  @empty
  <div class="col-span-full text-center py-12">
    <p class="text-white text-lg">
      No products available at the moment.
    </p>
  </div>
  @endforelse

</div>
</div>
  </div>
</section>

<!-- Features Section -->
<div class="bg-gray-50 py-16">
  <div class="container mx-auto px-4">
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Authentic Recipes</h3>
        <p class="text-gray-600">Traditional recipes passed down through generations</p>
      </div>
      
      <div class="text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Fresh Ingredients</h3>
        <p class="text-gray-600">Only the finest and freshest ingredients in every dish</p>
      </div>
      
      <div class="text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Great Service</h3>
        <p class="text-gray-600">Exceptional hospitality and attentive service</p>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showCartNotification(data.message);
            updateCartCount(data.cart_count);
        } else {
            showCartNotification(data.message || 'Failed to add item to cart', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showCartNotification('Failed to add item to cart', 'error');
    });
}

function showCartNotification(message, type = 'success') {
    // Create notification element
    const bgColor = type === 'error' ? 'bg-red-600' : 'bg-[#1B5E20]';
    const notification = document.createElement('div');
    // Increased extra space from top (top-14)
    notification.className = `fixed top-14 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center space-x-3 animate-slide-in`;
    notification.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'error' ? 'M6 18L18 6M6 6l12 12' : 'M5 13l4 4L19 7'}"></path>
        </svg>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

function updateCartCount(count = null) {
    if (count !== null) {
        // Update with provided count
        const cartCounts = document.querySelectorAll('#cart-count, #cart-count-mobile');
        cartCounts.forEach(badge => {
            if (badge) {
                badge.textContent = count;
                if (count > 0) {
                    badge.classList.remove('hidden');
                    badge.style.display = 'flex';
                } else {
                    badge.classList.add('hidden');
                    badge.style.display = 'none';
                }
            }
        });
    } else {
        // Fetch current count from server
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                const cartCounts = document.querySelectorAll('#cart-count, #cart-count-mobile');
                cartCounts.forEach(badge => {
                    if (badge) {
                        badge.textContent = data.count;
                        if (data.count > 0) {
                            badge.classList.remove('hidden');
                            badge.style.display = 'flex';
                        } else {
                            badge.classList.add('hidden');
                            badge.style.display = 'none';
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching cart count:', error));
    }
}

// Initialize cart count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
    
    // Handle category filtering
    const categoryLinks = document.querySelectorAll('.category-link');
    const productCards = document.querySelectorAll('.product-card');
    
    // Get selected category from URL
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get('category');
    
    // Filter products on page load if category is selected
    if (selectedCategory) {
        filterProductsByCategory(selectedCategory);
    }
    
    // Add click handlers to category links
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.getAttribute('data-category-id');
            
            // Update URL without page reload
            const baseUrl = window.location.origin + window.location.pathname;
            const newUrl = categoryId 
                ? `${baseUrl}?category=${categoryId}`
                : baseUrl;
            window.history.pushState({ category: categoryId }, '', newUrl);
            
            // Filter products
            filterProductsByCategory(categoryId);
            
            // Update active category link
            updateActiveCategory(categoryId);
        });
    });
    
    function filterProductsByCategory(categoryId) {
        productCards.forEach(card => {
            const cardCategoryId = card.getAttribute('data-category-id');
            
            if (!categoryId || cardCategoryId == categoryId) {
                // Show product
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 10);
            } else {
                // Hide product with animation
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
        
        // Show message if no products found
        const visibleProducts = Array.from(productCards).filter(card => 
            card.style.display !== 'none' && (!categoryId || card.getAttribute('data-category-id') == categoryId)
        );
        
        showNoProductsMessage(visibleProducts.length === 0 && categoryId);
    }
    
    function updateActiveCategory(categoryId) {
        // Remove active class from all links
        document.querySelectorAll('.category-link, .all-products-link').forEach(link => {
            link.classList.remove('bg-[#1B5E20]');
        });
        
        // Add active class to selected category or "All Products"
        if (categoryId) {
            const activeLink = document.querySelector(`[data-category-id="${categoryId}"]`);
            if (activeLink) {
                activeLink.classList.add('bg-[#1B5E20]');
            }
        } else {
            const allProductsLink = document.getElementById('all-products-link');
            if (allProductsLink) {
                allProductsLink.classList.add('bg-[#1B5E20]');
            }
        }
    }
    
    // Add click handler to "All Products" link
    const allProductsLink = document.getElementById('all-products-link');
    if (allProductsLink) {
        allProductsLink.addEventListener('click', function(e) {
            e.preventDefault();
            const baseUrl = window.location.origin + window.location.pathname;
            window.history.pushState({ category: null }, '', baseUrl);
            filterProductsByCategory(null);
            updateActiveCategory(null);
        });
    }
    
    function showNoProductsMessage(show) {
        let messageDiv = document.getElementById('no-products-message');
        
        if (show && !messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.id = 'no-products-message';
            messageDiv.className = 'col-span-full text-center py-12';
            messageDiv.innerHTML = '<p class="text-white text-lg">No products found in this category.</p>';
            document.getElementById('products-grid').appendChild(messageDiv);
        } else if (!show && messageDiv) {
            messageDiv.remove();
        }
    }
    
    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(e) {
        const urlParams = new URLSearchParams(window.location.search);
        const categoryId = urlParams.get('category');
        filterProductsByCategory(categoryId);
        updateActiveCategory(categoryId);
    });
});
</script>

<style>
@keyframes slide-in {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slide-in {
    animation: slide-in 0.3s ease-out;
}

.product-card {
    transition: opacity 0.3s ease, transform 0.3s ease;
    min-width: 0;
    max-width: 100%;
    width: 100%;
    height: fit-content;
}

</style>
@endpush

<!-- Floating WhatsApp Button - Always Visible -->
<div id="whatsapp-float-btn" class="fixed bottom-6 right-6 z-50">
    <div class="relative" id="whatsapp-button-container">
        <!-- Branch Options - Site Color Scheme Buttons (Show on Click/Hover) -->
        <div id="branch-options" class="absolute bottom-20 right-0 flex flex-col gap-3 opacity-0 invisible translate-y-4 transition-all duration-300 pointer-events-none">
            <!-- Barsha Branch Button -->
            <button
                onclick="openWhatsApp('{{ $barshaWhatsApp }}', 'Barsha')"
                class="bg-[#D4AF37] hover:bg-[#B8860B] rounded-xl px-5 py-3 flex items-center gap-3 shadow-lg transform transition-all duration-200 hover:scale-105 active:scale-95 pointer-events-auto min-w-[180px]"
            >
                <svg class="w-6 h-6 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span class="text-white font-semibold text-base">Barsha</span>
            </button>

            <!-- Al Rawada Branch Button -->
            <button
                onclick="openWhatsApp('{{ $alRawadaWhatsApp }}', 'Al Rawada')"
                class="bg-[#D4AF37] hover:bg-[#B8860B] rounded-xl px-5 py-3 flex items-center gap-3 shadow-lg transform transition-all duration-200 hover:scale-105 active:scale-95 pointer-events-auto min-w-[180px]"
            >
                <svg class="w-6 h-6 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span class="text-white font-semibold text-base">Al Rawada</span>
            </button>
        </div>

        <!-- Main WhatsApp Button - Large Green Circle -->
        <button
            onclick="handleWhatsAppClick(event)"
            class="w-20 h-20 bg-[#25D366] hover:bg-[#20BA5A] rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 relative z-10"
            aria-label="WhatsApp"
        >
            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </button>
    </div>
</div>

<!-- Scroll to Top Arrow Button - Appears on Scroll -->
<div id="scroll-to-top-btn" class="fixed bottom-6 left-6 z-50 hidden">
    <button
        onclick="scrollToTop()"
        class="w-14 h-14 bg-[#1B5E20] hover:bg-[#0D4F1C] rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95 group"
        aria-label="Scroll to Top"
    >
        <svg class="w-7 h-7 text-white transform group-hover:-translate-y-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</div>

@push('scripts')
<script>
// Show scroll-to-top button on scroll
let lastScrollTop = 0;
const scrollToTopBtn = document.getElementById('scroll-to-top-btn');

window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    // Show scroll-to-top button after scrolling down 300px
    if (scrollTop > 300) {
        scrollToTopBtn.classList.remove('hidden');
        scrollToTopBtn.classList.add('animate-fade-in-up');
    } else {
        scrollToTopBtn.classList.add('hidden');
    }
    
    lastScrollTop = scrollTop;
});

// Scroll to top function
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Handle WhatsApp button click (toggle branch options)
function handleWhatsAppClick(event) {
    event.stopPropagation();
    const branchOptions = document.getElementById('branch-options');
    const isVisible = branchOptions.classList.contains('opacity-100');
    
    if (isVisible) {
        // Hide options
        branchOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
        branchOptions.classList.add('opacity-0', 'invisible', 'translate-y-4');
        branchOptions.style.pointerEvents = 'none';
    } else {
        // Show options
        branchOptions.classList.remove('opacity-0', 'invisible', 'translate-y-4');
        branchOptions.classList.add('opacity-100', 'visible', 'translate-y-0');
        branchOptions.style.pointerEvents = 'auto';
    }
}

// Show options on hover (desktop only) - Initialize after DOM loads
document.addEventListener('DOMContentLoaded', function() {
    const whatsappContainer = document.getElementById('whatsapp-button-container');
    if (whatsappContainer) {
        whatsappContainer.addEventListener('mouseenter', function() {
            if (window.innerWidth >= 768) {
                const branchOptions = document.getElementById('branch-options');
                if (branchOptions) {
                    branchOptions.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                    branchOptions.classList.add('opacity-100', 'visible', 'translate-y-0');
                    branchOptions.style.pointerEvents = 'auto';
                }
            }
        });
        
        whatsappContainer.addEventListener('mouseleave', function() {
            if (window.innerWidth >= 768) {
                const branchOptions = document.getElementById('branch-options');
                if (branchOptions) {
                    branchOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    branchOptions.classList.add('opacity-0', 'invisible', 'translate-y-4');
                    branchOptions.style.pointerEvents = 'none';
                }
            }
        });
    }
});

// Open WhatsApp function
function openWhatsApp(phoneNumber, branchName = '') {
    const message = branchName 
        ? `Hello! I'm interested in ordering from ${branchName} branch.`
        : 'Hello! I\'m interested in placing an order.';
    
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
    
    // Close branch options if open (mobile)
    const branchOptions = document.getElementById('branch-options');
    branchOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
    branchOptions.classList.add('opacity-0', 'invisible', 'translate-y-2');
}

// Close branch options when clicking outside
document.addEventListener('click', function(event) {
    const container = document.getElementById('whatsapp-button-container');
    const branchOptions = document.getElementById('branch-options');
    
    if (container && branchOptions && !container.contains(event.target)) {
        branchOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
        branchOptions.classList.add('opacity-0', 'invisible', 'translate-y-4');
        branchOptions.style.pointerEvents = 'none';
    }
});

// Add fade-in-up animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.3s ease-out;
    }
`;
document.head.appendChild(style);
</script>
@endpush
@endsection
