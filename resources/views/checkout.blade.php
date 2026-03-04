@extends('layouts.app')

@section('content')
<div class="container mx-auto px-3 sm:px-4 py-8 md:py-12">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8">Checkout</h1>

        <div class="grid md:grid-cols-3 gap-6 md:gap-8">
            <!-- Order Summary -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 mb-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 pb-3 border-b border-gray-200">Your Order Items</h2>
                    <div class="divide-y divide-gray-200">
                        @foreach($items as $item)
                        <div class="py-4 sm:py-6 flex flex-col sm:flex-row items-start sm:items-center gap-4 hover:bg-gray-50 transition-colors rounded-lg px-2 -mx-2">
                            <!-- Product Image -->
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100 shadow-sm border border-gray-200 mx-auto sm:mx-0">
                                <img src="{{ $item['image'] ? asset($item['image']) : asset('images/product/p1.png') }}" 
                                     alt="{{ $item['name'] }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Product Details -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item['name'] }}</h3>
                                @if($item['name_ar'])
                                <p class="text-sm text-gray-500 mb-2">{{ $item['name_ar'] }}</p>
                                @endif
                                <div class="flex items-center gap-4 flex-wrap">
                                    <p class="text-sm font-medium text-gray-700">
                                        Quantity: <span class="text-[#1B5E20] font-bold">{{ $item['quantity'] }}</span>
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        Unit Price: <span class="font-semibold">{{ number_format($item['price'], 2) }} {{ $item['currency'] }}</span>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Price -->
                            <div class="text-right sm:text-right flex-shrink-0 min-w-[120px] sm:min-w-[140px] w-full sm:w-auto mt-2 sm:mt-0">
                                <p class="text-xs text-gray-500 mb-1">Subtotal</p>
                                <p class="text-xl font-bold text-[#1B5E20]">{{ number_format($item['subtotal'], 2) }} {{ $item['currency'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Customer Information Form -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">Customer Information</h2>
                    <form id="checkout-form" class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    required
                                    pattern="^[0-9]{7,15}$"
                                    inputmode="numeric"
                                    maxlength="15"
                                    placeholder="Only digits, e.g. 3123456789"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none">
                                <p class="mt-1 text-xs text-gray-500">
                                    Enter digits only (no spaces or symbols), 7–15 digits.
                                </p>
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Delivery Address *</label>
                            <textarea id="address" name="address" rows="3" required
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none"></textarea>
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Special Instructions (Optional)</label>
                            <textarea id="notes" name="notes" rows="2"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#1B5E20] focus:border-[#1B5E20] outline-none"></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="md:col-span-1 mt-6 md:mt-0">
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 md:sticky md:top-24">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">Order Summary</h2>
                    
                    <div class="space-y-4 mb-6 max-h-80 sm:max-h-96 overflow-y-auto">
                        @foreach($items as $item)
                        <div class="flex items-center gap-3 pb-3 border-b border-gray-100 last:border-0">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100">
                                <img src="{{ $item['image'] ? asset($item['image']) : asset('images/product/p1.png') }}" 
                                     alt="{{ $item['name'] }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $item['name'] }}</p>
                                <p class="text-xs text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <span class="font-semibold text-gray-900 text-xs sm:text-sm">{{ number_format($item['subtotal'], 2) }} {{ $item['currency'] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold text-gray-900">{{ number_format($subtotal, 2) }} AED</span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Delivery Fee</span>
                            <span class="font-semibold text-gray-900">{{ number_format($deliveryFee, 2) }} AED</span>
                        </div>
                        <div class="border-t border-gray-200 pt-2 mt-2">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-xl font-bold text-[#1B5E20]">{{ number_format($grandTotal, 2) }} AED</span>
                            </div>
                        </div>
                    </div>

                    <!-- Branch selection (hidden radio inputs, selected via modal) -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-800 mb-2">Select Branch *</p>
                        <div id="selected-branch-display" class="text-sm text-gray-600 py-2 px-3 bg-gray-50 rounded-lg border border-gray-200">
                            <span id="branch-display-text" class="text-gray-400">No branch selected</span>
                        </div>
                        @foreach($branches as $branch)
                        <input
                            type="radio"
                            name="branch"
                            value="{{ $branch['key'] }}"
                            id="branch-{{ $branch['key'] }}"
                            class="hidden"
                            onchange="updateBranchDisplay('{{ $branch['label'] }}')"
                        >
                        @endforeach
                        <button
                            type="button"
                            onclick="openBranchModal()"
                            class="mt-2 text-sm text-[#1B5E20] hover:text-[#0D4F1C] font-medium underline"
                        >
                            Choose your nearest branch
                        </button>
                    </div>

                    <!-- Payment method (Cash on Delivery only) -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-800 mb-1">Payment Method</p>
                        <p class="text-sm text-gray-700">
                            Cash on Delivery – pay in cash to the rider when your order is delivered. Your order will be sent to the restaurant via WhatsApp.
                        </p>
                    </div>

                    <button id="submit-order-btn" onclick="submitOrder()" 
                            class="w-full bg-[#1B5E20] hover:bg-[#0D4F1C] text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span id="submit-btn-text">Place Order via WhatsApp</span>
                    </button>
                    <p class="text-xs text-gray-500 text-center mt-2">
                        Your order will be sent to the restaurant via WhatsApp
                    </p>

                    <div class="flex flex-col gap-2 mt-3">
                        <a href="{{ url('/') }}" 
                           class="block w-full text-center py-2 px-4 bg-white border-2 border-[#1B5E20] text-[#1B5E20] hover:bg-[#1B5E20] hover:text-white rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add More Items
                        </a>
                        <a href="{{ route('cart.index') }}" 
                           class="block w-full text-center text-gray-600 hover:text-[#1B5E20] transition-colors">
                            ← Back to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modern Mobile-First Branch Selection Modal -->
<div 
    id="branch-selection-modal" 
    class="fixed inset-0 z-50 hidden"
    onclick="closeBranchModalOnBackdrop(event)"
>
    <!-- Backdrop with blur -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300"></div>
    
    <!-- Mobile: Bottom Sheet | Desktop: Centered Modal -->
    <div 
        class="absolute bottom-0 md:bottom-auto md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 bg-white w-full md:w-auto md:max-w-4xl md:mx-4 rounded-t-3xl md:rounded-2xl shadow-2xl transform transition-all duration-300 translate-y-full md:translate-y-0 md:scale-95 md:opacity-0 max-h-[90vh] md:max-h-[85vh] flex flex-col"
        id="branch-modal-content"
        onclick="event.stopPropagation()"
    >
        <!-- Mobile: Drag Handle -->
        <div class="md:hidden pt-3 pb-2 flex justify-center">
            <div class="w-12 h-1.5 bg-gray-300 rounded-full"></div>
        </div>

        <!-- Close Button - Mobile: Top Right | Desktop: Absolute -->
        <button
            onclick="closeBranchModal()"
            class="absolute top-4 right-4 z-10 w-10 h-10 md:w-10 md:h-10 flex items-center justify-center rounded-full bg-gray-100 active:bg-gray-200 md:hover:bg-gray-200 text-gray-600 active:text-gray-800 md:hover:text-gray-800 transition-all duration-200 active:scale-95 md:hover:scale-110 touch-manipulation"
            aria-label="Close"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Modal Header -->
        <div class="p-6 md:p-8 border-b border-gray-200 bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C] rounded-t-3xl md:rounded-t-2xl">
            <div class="flex items-center gap-3 md:gap-3">
                <div class="w-14 h-14 md:w-12 md:h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-7 h-7 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl md:text-3xl font-bold text-white">Select Your Nearest Branch</h2>
                    <p class="text-white/90 text-sm md:text-sm mt-1">Choose the branch closest to your delivery location</p>
                </div>
            </div>
        </div>

        <!-- Branch Cards Container - Scrollable on Mobile -->
        <div class="overflow-y-auto flex-1 p-4 md:p-6 md:p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 pb-4">
                @foreach($branches as $index => $branch)
                <div
                    class="branch-card-mobile md:branch-card group relative bg-gradient-to-br from-white via-gray-50 to-white rounded-2xl md:rounded-xl p-5 md:p-6 border-2 border-gray-200 cursor-pointer transition-all duration-300 active:scale-[0.98] md:hover:scale-105 active:border-[#1B5E20] md:hover:border-[#1B5E20] active:shadow-xl md:hover:shadow-2xl active:-translate-y-0.5 md:hover:-translate-y-2 touch-manipulation overflow-hidden"
                    onclick="selectBranch('{{ $branch['key'] }}', '{{ $branch['label'] }}')"
                    ontouchstart="this.classList.add('active-touch')"
                    ontouchend="setTimeout(() => this.classList.remove('active-touch'), 150)"
                    data-branch-key="{{ $branch['key'] }}"
                    style="perspective: 1000px; transform-style: preserve-3d;"
                >
                    <!-- 3D Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-300" style="background-image: radial-gradient(circle at 20% 50%, #1B5E20 0%, transparent 50%), radial-gradient(circle at 80% 80%, #0D4F1C 0%, transparent 50%);"></div>
                    
                    <!-- Animated Gradient Overlay - Creme/Gold on hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#D4AF37]/0 via-transparent to-[#B8860B]/0 group-hover:from-[#D4AF37]/5 group-hover:via-[#D4AF37]/10 group-hover:to-[#B8860B]/5 transition-all duration-500 rounded-2xl md:rounded-xl"></div>
                    
                    <!-- Shine Effect on Hover -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-2xl md:rounded-xl" style="background: linear-gradient(135deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%); background-size: 200% 200%; animation: shine 2s infinite;"></div>
                    
                    <!-- Mobile: Full Card Clickable Area -->
                    <div class="relative h-full z-10">
                        <!-- Logo and Branch Header -->
                        <div class="flex items-center justify-between mb-4 md:mb-4">
                            <div class="flex items-center gap-3">
                                <!-- Restaurant Logo -->
                                <div class="w-20 h-20 md:w-16 md:h-16 bg-white rounded-2xl md:rounded-xl flex items-center justify-center shadow-xl border-2 border-gray-100 transform active:scale-95 md:group-hover:scale-110 md:group-hover:rotate-3 transition-all duration-300 relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-br from-[#D4AF37]/10 to-[#B8860B]/10"></div>
                                    <img 
                                        src="{{ asset('images/logos/paklogo.png') }}" 
                                        alt="Pak Punjab Logo" 
                                        class="w-14 h-14 md:w-12 md:h-12 object-contain relative z-10"
                                    >
                                </div>
                                <!-- Branch Icon Badge -->
                                <div class="w-14 h-14 md:w-12 md:h-12 bg-gradient-to-br from-[#1B5E20] to-[#0D4F1C] rounded-xl md:rounded-lg flex items-center justify-center shadow-lg transform active:rotate-3 md:group-hover:rotate-6 transition-transform duration-300 relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-xl md:rounded-lg"></div>
                                    <svg class="w-7 h-7 md:w-6 md:h-6 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <!-- Radio Indicator - Larger on Mobile with 3D effect -->
                            <div class="w-8 h-8 md:w-6 md:h-6 rounded-full border-3 md:border-2 border-gray-300 active:border-[#1B5E20] md:group-hover:border-[#1B5E20] transition-all duration-300 flex items-center justify-center branch-radio-indicator relative shadow-inner" style="background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8), transparent);">
                                <div class="w-4 h-4 md:w-3 md:h-3 rounded-full bg-gradient-to-br from-[#1B5E20] to-[#0D4F1C] scale-0 active:scale-100 md:group-hover:scale-100 transition-transform duration-300 shadow-lg"></div>
                            </div>
                        </div>

                        <!-- Branch Name - Larger on Mobile with 3D text effect -->
                        <div class="mb-3 md:mb-2">
                            <h3 class="text-2xl md:text-xl font-bold text-gray-900 active:text-[#D4AF37] md:group-hover:text-[#D4AF37] transition-colors duration-300 relative inline-block" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                {{ $branch['label'] }}
                            </h3>
                            <!-- Underline accent - Creme/Gold color like menu button -->
                            <div class="h-1 w-0 group-hover:w-full bg-gradient-to-r from-[#D4AF37] to-[#B8860B] rounded-full transition-all duration-300 mt-1"></div>
                        </div>

                        <!-- Branch Description -->
                        <p class="text-gray-600 text-base md:text-sm mb-4">
                            Fast delivery from our {{ str_replace(' Branch', '', $branch['label']) }} location
                        </p>

                        <!-- Features List - Larger Text on Mobile -->
                        <div class="space-y-2.5 md:space-y-2 mb-4 md:mb-0">
                            <div class="flex items-center gap-2.5 md:gap-2 text-base md:text-sm text-gray-700">
                                <svg class="w-5 h-5 md:w-4 md:h-4 text-[#1B5E20] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Quick order processing</span>
                            </div>
                            <div class="flex items-center gap-2.5 md:gap-2 text-base md:text-sm text-gray-700">
                                <svg class="w-5 h-5 md:w-4 md:h-4 text-[#1B5E20] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Fresh ingredients</span>
                            </div>
                            <div class="flex items-center gap-2.5 md:gap-2 text-base md:text-sm text-gray-700">
                                <svg class="w-5 h-5 md:w-4 md:h-4 text-[#1B5E20] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Professional service</span>
                            </div>
                        </div>

                        <!-- Select Button - Always Visible on Mobile with 3D effect -->
                        <div class="mt-6 md:mt-6 pt-4 border-t border-gray-200 relative">
                            <!-- Button Shadow Effect -->
                            <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-b from-[#1B5E20]/20 to-transparent rounded-b-xl md:rounded-b-lg blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <button
                                type="button"
                                class="w-full py-3.5 md:py-2 px-4 bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C] text-white rounded-xl md:rounded-lg font-semibold text-base md:text-sm active:bg-[#0D4F1C] md:opacity-0 md:group-hover:opacity-100 transform active:scale-[0.98] md:translate-y-2 md:group-hover:translate-y-0 transition-all duration-300 touch-manipulation relative overflow-hidden shadow-lg hover:shadow-xl"
                                style="box-shadow: 0 4px 6px -1px rgba(27, 94, 32, 0.3), 0 2px 4px -1px rgba(27, 94, 32, 0.2);"
                            >
                                <!-- Button shine effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Select This Branch
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Mobile touch optimizations */
    .touch-manipulation {
        touch-action: manipulation;
        -webkit-tap-highlight-color: transparent;
    }
    
    /* Active touch state for mobile */
    .branch-card-mobile.active-touch {
        transform: scale(0.98);
        background: linear-gradient(to bottom right, #f0f9f4, #e8f5e9);
    }
    
    /* Smooth scrolling for mobile */
    #branch-modal-content {
        -webkit-overflow-scrolling: touch;
    }
    
    /* Prevent text selection on tap */
    .branch-card-mobile {
        -webkit-user-select: none;
        user-select: none;
    }
    
    /* Better border on mobile */
    @media (max-width: 767px) {
        .branch-radio-indicator {
            border-width: 3px;
        }
    }
    
    /* 3D Shine Animation */
    @keyframes shine {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
    
    /* Enhanced 3D Card Effect */
    .branch-card-mobile,
    .branch-card {
        position: relative;
    }
    
    .branch-card-mobile::before,
    .branch-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: inherit;
        padding: 2px;
        background: linear-gradient(135deg, rgba(27, 94, 32, 0.1), rgba(13, 79, 28, 0.1));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .branch-card-mobile:hover::before,
    .branch-card:hover::before {
        opacity: 1;
    }
    
    /* Depth shadow effect */
    .branch-card-mobile,
    .branch-card {
        box-shadow: 
            0 1px 3px rgba(0, 0, 0, 0.1),
            0 1px 2px rgba(0, 0, 0, 0.06);
    }
    
    .branch-card-mobile:hover,
    .branch-card:hover {
        box-shadow: 
            0 20px 25px -5px rgba(27, 94, 32, 0.2),
            0 10px 10px -5px rgba(27, 94, 32, 0.1),
            0 0 0 1px rgba(27, 94, 32, 0.1);
    }
    
    /* Ensure desktop modal is centered */
    @media (min-width: 768px) {
        #branch-modal-content {
            top: 50% !important;
            left: 50% !important;
            bottom: auto !important;
            transform: translate(-50%, -50%) scale(0.95) !important;
            opacity: 0;
        }
        
        #branch-modal-content.modal-open {
            transform: translate(-50%, -50%) scale(1) !important;
            opacity: 1;
        }
    }
</style>
@endpush

@push('scripts')
<script>
// Branch WhatsApp numbers from backend
const BRANCH_WHATSAPPS = @json(collect($branches)->mapWithKeys(function ($b) {
    return [$b['key'] => $b['whatsapp']];
}));

// Branch selection modal functions
function openBranchModal() {
    const modal = document.getElementById('branch-selection-modal');
    const content = document.getElementById('branch-modal-content');
    
    if (modal && content) {
        modal.classList.remove('hidden');
        
        // Mobile: Slide up from bottom | Desktop: Scale and fade
        const isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            // Mobile: Slide up animation
            setTimeout(() => {
                content.classList.remove('translate-y-full');
                content.classList.add('translate-y-0');
            }, 10);
        } else {
            // Desktop: Scale and fade (keep centered position)
            setTimeout(() => {
                content.classList.add('modal-open');
            }, 10);
        }
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }
}

function closeBranchModal() {
    const modal = document.getElementById('branch-selection-modal');
    const content = document.getElementById('branch-modal-content');
    
    if (modal && content) {
        const isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            // Mobile: Slide down
            content.classList.remove('translate-y-0');
            content.classList.add('translate-y-full');
        } else {
            // Desktop: Scale and fade out (keep centered)
            content.classList.remove('modal-open');
        }
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }
}

function closeBranchModalOnBackdrop(event) {
    if (event.target.id === 'branch-selection-modal') {
        closeBranchModal();
    }
}

function selectBranch(branchKey, branchLabel) {
    // Update radio input
    const radio = document.getElementById(`branch-${branchKey}`);
    if (radio) {
        radio.checked = true;
        updateBranchDisplay(branchLabel);
    }
    
    // Visual feedback on card (works for both mobile and desktop)
    document.querySelectorAll('[data-branch-key]').forEach(card => {
        card.classList.remove('border-[#1B5E20]', 'ring-4', 'ring-[#1B5E20]/20');
        const indicator = card.querySelector('.branch-radio-indicator');
        if (indicator) {
            indicator.querySelector('div').classList.remove('scale-100');
            indicator.classList.remove('border-[#1B5E20]');
        }
    });
    
    const selectedCard = document.querySelector(`[data-branch-key="${branchKey}"]`);
    if (selectedCard) {
        selectedCard.classList.add('border-[#1B5E20]', 'ring-4', 'ring-[#1B5E20]/20');
        const indicator = selectedCard.querySelector('.branch-radio-indicator');
        if (indicator) {
            indicator.classList.add('border-[#1B5E20]');
            indicator.querySelector('div').classList.add('scale-100');
        }
        
        // Haptic-like feedback on mobile (vibration if supported)
        if (navigator.vibrate) {
            navigator.vibrate(50);
        }
    }
    
    // Close modal after short delay for visual feedback
    setTimeout(() => {
        closeBranchModal();
    }, 200);
}

function updateBranchDisplay(branchLabel) {
    const displayText = document.getElementById('branch-display-text');
    const displayContainer = document.getElementById('selected-branch-display');
    
    if (displayText && displayContainer) {
        displayText.textContent = branchLabel;
        displayText.classList.remove('text-gray-400');
        displayText.classList.add('text-[#1B5E20]', 'font-semibold');
        displayContainer.classList.remove('bg-gray-50', 'border-gray-200');
        displayContainer.classList.add('bg-[#1B5E20]/5', 'border-[#1B5E20]/20');
    }
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modal = document.getElementById('branch-selection-modal');
        if (modal && !modal.classList.contains('hidden')) {
            closeBranchModal();
        }
    }
});

function formatOrderMessage(orderData) {
    const items = orderData.items;
    const orderDate = new Date().toLocaleString('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit' 
    });
    
    let message = `🍽️ *NEW ORDER - Pak Punjab Restaurant*\n\n`;
    message += `📅 *Order Date:* ${orderDate}\n\n`;
    
    // Customer Details
    message += `👤 *CUSTOMER DETAILS*\n`;
    message += `━━━━━━━━━━━━━━━━━━━━\n`;
    message += `Name: ${orderData.name}\n`;
    message += `Phone: ${orderData.phone}\n`;
    message += `Email: ${orderData.email}\n`;
    message += `Address: ${orderData.address}\n`;
    if (orderData.notes && orderData.notes.trim()) {
        message += `Special Instructions: ${orderData.notes}\n`;
    }
    message += `\n`;

    // Order Items
    message += `🛒 *ORDER ITEMS*\n`;
    message += `━━━━━━━━━━━━━━━━━━━━\n`;
    items.forEach((item, index) => {
        message += `${index + 1}. ${item.name}\n`;
        if (item.name_ar) {
            message += `   (${item.name_ar})\n`;
        }
        message += `   Quantity: ${item.quantity} x ${parseFloat(item.price).toFixed(2)} ${item.currency}\n`;
        message += `   Subtotal: ${parseFloat(item.subtotal).toFixed(2)} ${item.currency}\n\n`;
    });
    
    // Order Summary
    message += `💰 *ORDER SUMMARY*\n`;
    message += `━━━━━━━━━━━━━━━━━━━━\n`;
    message += `Subtotal: ${parseFloat(orderData.subtotal).toFixed(2)} AED\n`;
    message += `Delivery Fee: ${parseFloat(orderData.deliveryFee).toFixed(2)} AED\n`;
    message += `*TOTAL: ${parseFloat(orderData.grandTotal).toFixed(2)} AED*\n\n`;
    
    message += `━━━━━━━━━━━━━━━━━━━━\n`;
    message += `Thank you for your order! 🙏`;
    
    return message;
}

async function submitOrder() {
    const form = document.getElementById('checkout-form');
    const formData = new FormData(form);
    
    // Validate form fields
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    const button = document.getElementById('submit-order-btn');
    const buttonText = document.getElementById('submit-btn-text');
    
    // Disable button
    button.disabled = true;
    buttonText.textContent = 'Preparing Order...';

    // Branch selection (required) - show modal if not selected
    const branchInput = document.querySelector('input[name="branch"]:checked');
    if (!branchInput) {
        openBranchModal();
        button.disabled = false;
        buttonText.textContent = 'Place Order via WhatsApp';
        return;
    }
    const selectedBranch = branchInput.value;
    const branchWhatsApp = BRANCH_WHATSAPPS[selectedBranch];

    const orderData = {
        name: formData.get('name'),
        phone: formData.get('phone'),
        email: formData.get('email'),
        address: formData.get('address'),
        notes: formData.get('notes'),
        branch: selectedBranch,
        subtotal: {{ $subtotal }},
        deliveryFee: {{ $deliveryFee }},
        grandTotal: {{ $grandTotal }},
        items: @json($items)
    };

    // Always use Cash on Delivery: send order directly to restaurant WhatsApp and clear cart
    const orderMessage = formatOrderMessage(orderData);
    const encodedMessage = encodeURIComponent(orderMessage);
    const whatsappUrl = `https://wa.me/${branchWhatsApp}?text=${encodedMessage}`;

    window.open(whatsappUrl, '_blank');

    setTimeout(() => {
        fetch('/cart/clear', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            window.location.href = '/';
        });
    }, 2000);
}
</script>
@endpush
@endsection
