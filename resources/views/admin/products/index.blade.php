@extends('admin.layout')

@section('page-title', 'Products')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0">
        <div>
            <h1 class="text-lg sm:text-xl font-semibold text-gray-900">Products</h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage your restaurant products</p>
        </div>
        <a href="{{ route('admin.products.create') }}" 
           class="w-auto bg-[#1B5E20] text-white px-3 py-1.5 sm:px-5 sm:py-2 rounded-lg font-medium text-xs sm:text-sm hover:bg-[#0D4F1C] transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-1.5 sm:space-x-2 active:scale-95">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="hidden sm:inline">Add New Product</span>
            <span class="sm:hidden">Add</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 sm:px-6 py-2.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-3 sm:px-6 py-2.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-3 sm:px-6 py-2.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-3 sm:px-6 py-2.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-3 sm:px-6 py-2.5 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 sm:px-6 py-2.5 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-9 h-9 rounded-lg object-cover mr-2.5 sm:mr-3 border border-gray-200" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'40\' height=\'40\'%3E%3Crect width=\'40\' height=\'40\' fill=\'%23f3f4f6\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%239ca3af\' font-size=\'12\'%3ENo Image%3C/text%3E%3C/svg%3E'">
                                @else
                                <div class="w-9 h-9 rounded-lg bg-gray-200 flex items-center justify-center mr-2.5 sm:mr-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <div class="text-xs sm:text-sm font-normal text-gray-900">{{ $product->name }}</div>
                                    @if($product->name_ar)
                                    <div class="text-xs text-gray-500">{{ $product->name_ar }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-3 sm:px-6 py-2.5 whitespace-nowrap">
                            <span class="px-2 py-0.5 text-xs font-normal bg-blue-100 text-blue-800 rounded-full">{{ $product->category->name }}</span>
                        </td>
                        <td class="px-3 sm:px-6 py-2.5 whitespace-nowrap text-xs sm:text-sm font-normal text-gray-900">
                            {{ $product->price }} {{ $product->currency }}
                        </td>
                        <td class="px-3 sm:px-6 py-2.5 whitespace-nowrap">
                            <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-3 sm:px-6 py-2.5 whitespace-nowrap text-right text-xs sm:text-sm">
                            <div class="flex items-center justify-end space-x-1.5 sm:space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="text-[#1B5E20] hover:text-[#0D4F1C] transition-colors p-1">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <div class="relative">
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" id="delete-form-{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="showDeleteConfirmation({{ $product->id }}, '{{ addslashes($product->name) }}', this)" class="text-red-600 hover:text-red-800 transition-colors p-1 relative">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Inline Delete Confirmation -->
                                    <div id="delete-confirm-{{ $product->id }}" class="hidden absolute right-0 top-full mt-2 z-50 bg-white rounded-lg shadow-xl border border-gray-200 p-3 min-w-[200px] sm:min-w-[240px] animate-fade-in">
                                        <p class="text-sm text-gray-700 mb-3">Delete "{{ $product->name }}"?</p>
                                        <div class="flex items-center justify-end space-x-2">
                                            <button onclick="closeDeleteConfirmation({{ $product->id }})" class="px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                                Cancel
                                            </button>
                                            <button onclick="confirmDeleteProduct({{ $product->id }}, '{{ addslashes($product->name) }}')" class="px-3 py-1.5 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md font-medium transition-colors">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-3 sm:px-6 py-8 sm:py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No products</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new product.</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#1B5E20] hover:bg-[#0D4F1C]">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
        <div class="mt-0">
            @include('admin.partials.pagination', ['paginator' => $products])
        </div>
        @endif
    </div>
</div>

<script>
let activeDeleteConfirm = null;

function showDeleteConfirmation(productId, productName, button) {
    // Close any other open confirmations
    if (activeDeleteConfirm && activeDeleteConfirm !== productId) {
        closeDeleteConfirmation(activeDeleteConfirm);
    }
    
    const confirmDiv = document.getElementById('delete-confirm-' + productId);
    if (confirmDiv) {
        confirmDiv.classList.remove('hidden');
        activeDeleteConfirm = productId;
        
        // Position the confirmation popup
        const rect = button.getBoundingClientRect();
        const confirmRect = confirmDiv.getBoundingClientRect();
        
        // Adjust if it goes off screen
        if (rect.right + confirmRect.width > window.innerWidth) {
            confirmDiv.style.right = '0';
            confirmDiv.style.left = 'auto';
        }
        
        // Close on outside click
        setTimeout(() => {
            document.addEventListener('click', function closeOnOutsideClick(e) {
                if (!confirmDiv.contains(e.target) && e.target !== button) {
                    closeDeleteConfirmation(productId);
                    document.removeEventListener('click', closeOnOutsideClick);
                }
            });
        }, 10);
    }
}

function closeDeleteConfirmation(productId) {
    const confirmDiv = document.getElementById('delete-confirm-' + productId);
    if (confirmDiv) {
        confirmDiv.classList.add('hidden');
        if (activeDeleteConfirm === productId) {
            activeDeleteConfirm = null;
        }
    }
}

function confirmDeleteProduct(productId, productName) {
    closeDeleteConfirmation(productId);
    
    const form = document.getElementById('delete-form-' + productId);
    const formData = new FormData(form);
    
    // Show loading state
    const row = form.closest('tr');
    if (row) {
        row.style.opacity = '0.5';
        row.style.pointerEvents = 'none';
    }
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data && data.success) {
            // Show toast immediately (same as cart) - green color
            showToast('Product deleted successfully', 'success', 3000);
            
            // Animate row removal
            if (row) {
                row.style.transition = 'opacity 0.3s, transform 0.3s';
                row.style.opacity = '0';
                row.style.transform = 'translateX(-20px)';
                setTimeout(() => {
                    row.remove();
                }, 300);
            }
        } else {
            if (row) {
                row.style.opacity = '1';
                row.style.pointerEvents = 'auto';
            }
            showToast('Failed to delete product', 'error', 3000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (row) {
            row.style.opacity = '1';
            row.style.pointerEvents = 'auto';
        }
        showToast('Failed to delete product', 'error', 3000);
    });
}

// Add fade-in animation
if (!document.getElementById('delete-confirm-styles')) {
    const style = document.createElement('style');
    style.id = 'delete-confirm-styles';
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
</script>
@endsection
