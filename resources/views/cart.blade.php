@extends('layouts.app')

@section('content')
<div class="container mx-auto px-3 sm:px-4 py-8 md:py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8">Shopping Cart</h1>

        @if(count($items) > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Cart Items -->
            <div class="divide-y divide-gray-200">
                @foreach($items as $item)
                <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center gap-4 cart-item" data-product-id="{{ $item['id'] }}">
                    <!-- Product Image -->
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100 shadow-sm mx-auto sm:mx-0">
                        <img src="{{ $item['image'] ? asset($item['image']) : asset('images/product/p1.png') }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Product Details -->
                    <div class="flex-1 min-w-0 w-full">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-1">{{ $item['name'] }}</h3>
                        @if($item['name_ar'])
                        <p class="text-sm text-gray-500 mb-2">{{ $item['name_ar'] }}</p>
                        @endif
                        <p class="text-sm sm:text-base font-bold text-[#1B5E20]">
                            {{ number_format($item['price'], 2) }} {{ $item['currency'] }}
                        </p>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center space-x-3 flex-shrink-0 mt-2 sm:mt-0">
                        <button onclick="updateQuantity({{ $item['id'] }}, -1)" 
                                class="w-10 h-10 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded-full transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <span class="w-10 sm:w-12 text-center font-semibold text-gray-900 quantity-display">{{ $item['quantity'] }}</span>
                        <button onclick="updateQuantity({{ $item['id'] }}, 1)" 
                                class="w-10 h-10 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded-full transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Subtotal -->
                    <div class="text-right flex-shrink-0 min-w-[100px] mt-2 sm:mt-0">
                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Subtotal</p>
                        <p class="text-lg sm:text-xl font-bold text-[#1B5E20] subtotal" data-price="{{ $item['price'] }}">
                            {{ number_format($item['subtotal'], 2) }} {{ $item['currency'] }}
                        </p>
                    </div>

                    <!-- Remove Button -->
                    <div class="relative mt-2 sm:mt-0 flex-shrink-0 self-end sm:self-auto">
                        <button onclick="showRemoveConfirmation({{ $item['id'] }}, '{{ addslashes($item['name']) }}', this)" 
                                class="p-2 text-red-600 hover:bg-red-50 rounded-full transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        <!-- Inline Remove Confirmation -->
                        <div id="remove-confirm-{{ $item['id'] }}" class="hidden absolute right-0 top-full mt-2 z-50 bg-white rounded-lg shadow-xl border border-gray-200 p-3 min-w-[200px] sm:min-w-[240px] animate-fade-in">
                            <p class="text-sm text-gray-700 mb-3">Remove "{{ $item['name'] }}" from cart?</p>
                            <div class="flex items-center justify-end space-x-2">
                                <button onclick="closeRemoveConfirmation({{ $item['id'] }})" class="px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                    Cancel
                                </button>
                                <button onclick="confirmRemoveItem({{ $item['id'] }}, '{{ addslashes($item['name']) }}')" class="px-3 py-1.5 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md font-medium transition-colors">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Cart Summary -->
            <div class="bg-gray-50 px-6 py-6 border-t border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xl font-semibold text-gray-900">Total:</span>
                    <span class="text-2xl font-bold text-[#1B5E20] total-amount">{{ number_format($total, 2) }} AED</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ url('/') }}" 
                       class="flex-1 bg-white hover:bg-gray-100 border-2 border-[#1B5E20] text-[#1B5E20] text-center py-3 px-6 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add More Items
                    </a>
                    <a href="{{ route('cart.checkout') }}" 
                       class="flex-1 bg-[#1B5E20] hover:bg-[#0D4F1C] text-white text-center py-3 px-6 rounded-lg font-semibold transition-colors duration-200">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-600 mb-6">Add some delicious items to your cart!</p>
            <a href="{{ url('/') }}" class="inline-block bg-[#1B5E20] hover:bg-[#0D4F1C] text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                Continue Shopping
            </a>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
// Ensure toast functions are available
if (typeof showToast === 'undefined') {
    function showToast(message, type = 'success') {
        console.warn('Toast system not loaded');
    }
}
if (typeof showConfirmModal === 'undefined') {
    function showConfirmModal(message, callback, title) {
        if (confirm(message)) {
            callback();
        }
    }
}

function updateQuantity(productId, change) {
    const item = document.querySelector(`.cart-item[data-product-id="${productId}"]`);
    const quantityDisplay = item.querySelector('.quantity-display');
    const currentQuantity = parseInt(quantityDisplay.textContent);
    const newQuantity = Math.max(1, currentQuantity + change);

    fetch(`/cart/update/${productId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: newQuantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            quantityDisplay.textContent = newQuantity;
            const price = parseFloat(item.querySelector('.subtotal').getAttribute('data-price'));
            item.querySelector('.subtotal').textContent = (price * newQuantity).toFixed(2) + ' AED';
            document.querySelector('.total-amount').textContent = data.total.toFixed(2) + ' AED';
            updateCartCount(data.cart_count);
            showToast('Quantity updated', 'success', 2000);
        } else {
            showToast('Failed to update quantity', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Failed to update quantity', 'error');
    });
}

let activeRemoveConfirm = null;

function showRemoveConfirmation(productId, itemName, button) {
    // Close any other open confirmations
    if (activeRemoveConfirm && activeRemoveConfirm !== productId) {
        closeRemoveConfirmation(activeRemoveConfirm);
    }
    
    const confirmDiv = document.getElementById('remove-confirm-' + productId);
    if (confirmDiv) {
        confirmDiv.classList.remove('hidden');
        activeRemoveConfirm = productId;
        
        // Close on outside click
        setTimeout(() => {
            document.addEventListener('click', function closeOnOutsideClick(e) {
                if (!confirmDiv.contains(e.target) && e.target !== button) {
                    closeRemoveConfirmation(productId);
                    document.removeEventListener('click', closeOnOutsideClick);
                }
            });
        }, 10);
    }
}

function closeRemoveConfirmation(productId) {
    const confirmDiv = document.getElementById('remove-confirm-' + productId);
    if (confirmDiv) {
        confirmDiv.classList.add('hidden');
        if (activeRemoveConfirm === productId) {
            activeRemoveConfirm = null;
        }
    }
}

function confirmRemoveItem(productId, itemName) {
    closeRemoveConfirmation(productId);
    
    const item = document.querySelector(`.cart-item[data-product-id="${productId}"]`);
    if (!item) return;
    
    // Show loading state
    item.style.opacity = '0.5';
    item.style.pointerEvents = 'none';
    
    // Delete from server
    fetch(`/cart/remove/${productId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Animate item removal
            item.style.transition = 'opacity 0.3s, transform 0.3s';
            item.style.opacity = '0';
            item.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                item.remove();
                
                // Show toast notification (same style as "item added to cart")
                showToast('Item removed from cart', 'success');
                
                if (data.cart_count === 0) {
                    setTimeout(() => location.reload(), 1000);
                } else {
                    document.querySelector('.total-amount').textContent = data.total.toFixed(2) + ' AED';
                    updateCartCount(data.cart_count);
                }
            }, 300);
        } else {
            // Restore item if deletion failed
            item.style.opacity = '1';
            item.style.pointerEvents = 'auto';
            showToast('Failed to remove item', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        item.style.opacity = '1';
        item.style.pointerEvents = 'auto';
        showToast('Failed to remove item', 'error');
    });
}

// Add fade-in animation for confirmation popup
if (!document.getElementById('remove-confirm-styles')) {
    const style = document.createElement('style');
    style.id = 'remove-confirm-styles';
    style.textContent = `
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.2s ease-out;
        }
    `;
    document.head.appendChild(style);
}

function updateCartCount(count) {
    const cartCounts = document.querySelectorAll('#cart-count, #cart-count-mobile');
    cartCounts.forEach(el => {
        if (count > 0) {
            el.textContent = count;
            el.classList.remove('hidden');
        } else {
            el.classList.add('hidden');
        }
    });
}
</script>
@endpush
@endsection
