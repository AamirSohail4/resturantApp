@extends('admin.layout')

@section('page-title', 'Categories')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0">
        <div>
            <h1 class="text-lg sm:text-xl font-semibold text-gray-900">Categories</h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage product categories</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" 
           class="w-auto bg-[#1B5E20] text-white px-3 py-1.5 sm:px-5 sm:py-2 rounded-lg font-medium text-xs sm:text-sm hover:bg-[#0D4F1C] transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-1.5 sm:space-x-2 active:scale-95">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="hidden sm:inline">Add New Category</span>
            <span class="sm:hidden">Add</span>
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @forelse($categories as $category)
        <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 border-l-4 border-[#1B5E20] hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-3 sm:mb-4">
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm sm:text-base font-medium text-gray-900 truncate">{{ $category->name }}</h3>
                    @if($category->name_ar)
                    <p class="text-xs text-gray-600 mt-1 truncate">{{ $category->name_ar }}</p>
                    @endif
                </div>
                <span class="px-2 py-1 text-xs font-medium rounded-full flex-shrink-0 ml-2 {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            
            @if($category->description)
            <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 line-clamp-2">{{ Str::limit($category->description, 100) }}</p>
            @endif
            
            <div class="flex items-center justify-between pt-3 sm:pt-4 border-t border-gray-200">
                <span class="text-xs sm:text-sm text-gray-500">{{ $category->products_count }} products</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" 
                       class="text-[#1B5E20] hover:text-[#0D4F1C] transition-colors p-1">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    <div class="relative">
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" id="delete-category-form-{{ $category->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="showDeleteConfirmation({{ $category->id }}, '{{ addslashes($category->name) }}', this)" class="text-red-600 hover:text-red-800 transition-colors p-1 relative">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                        <!-- Inline Delete Confirmation -->
                        <div id="delete-confirm-{{ $category->id }}" class="hidden absolute right-0 top-full mt-2 z-50 bg-white rounded-lg shadow-xl border border-gray-200 p-3 min-w-[200px] sm:min-w-[240px] animate-fade-in">
                            <p class="text-sm text-gray-700 mb-3">Delete "{{ $category->name }}"?</p>
                            <div class="flex items-center justify-end space-x-2">
                                <button onclick="closeDeleteConfirmation({{ $category->id }})" class="px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                    Cancel
                                </button>
                                <button onclick="confirmDeleteCategory({{ $category->id }}, '{{ addslashes($category->name) }}')" class="px-3 py-1.5 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md font-medium transition-colors">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No categories</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new category.</p>
            <div class="mt-6">
                <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#1B5E20] hover:bg-[#0D4F1C]">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Category
                </a>
            </div>
        </div>
        @endforelse
    </div>
    
    @if($categories->hasPages())
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @include('admin.partials.pagination', ['paginator' => $categories])
    </div>
    @endif
</div>

<script>
let activeDeleteConfirm = null;

function showDeleteConfirmation(categoryId, categoryName, button) {
    // Close any other open confirmations
    if (activeDeleteConfirm && activeDeleteConfirm !== categoryId) {
        closeDeleteConfirmation(activeDeleteConfirm);
    }
    
    const confirmDiv = document.getElementById('delete-confirm-' + categoryId);
    if (confirmDiv) {
        confirmDiv.classList.remove('hidden');
        activeDeleteConfirm = categoryId;
        
        // Close on outside click
        setTimeout(() => {
            document.addEventListener('click', function closeOnOutsideClick(e) {
                if (!confirmDiv.contains(e.target) && e.target !== button) {
                    closeDeleteConfirmation(categoryId);
                    document.removeEventListener('click', closeOnOutsideClick);
                }
            });
        }, 10);
    }
}

function closeDeleteConfirmation(categoryId) {
    const confirmDiv = document.getElementById('delete-confirm-' + categoryId);
    if (confirmDiv) {
        confirmDiv.classList.add('hidden');
        if (activeDeleteConfirm === categoryId) {
            activeDeleteConfirm = null;
        }
    }
}

function confirmDeleteCategory(categoryId, categoryName) {
    closeDeleteConfirmation(categoryId);
    
    const form = document.getElementById('delete-category-form-' + categoryId);
    const formData = new FormData(form);
    
    // Show loading state
    const card = form.closest('.bg-white');
    if (card) {
        card.style.opacity = '0.5';
        card.style.pointerEvents = 'none';
    }
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (response.redirected) {
            window.location.href = response.url;
        } else {
            return response.json();
        }
    })
    .then(data => {
        if (data && data.success) {
            // Show toast immediately (same as cart)
            showToast('Category deleted successfully', 'success');
            
            // Animate card removal
            if (card) {
                card.style.transition = 'opacity 0.3s, transform 0.3s';
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.remove();
                }, 300);
            } else {
                setTimeout(() => location.reload(), 1000);
            }
        } else {
            if (card) {
                card.style.opacity = '1';
                card.style.pointerEvents = 'auto';
            }
            showToast('Failed to delete category', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (card) {
            card.style.opacity = '1';
            card.style.pointerEvents = 'auto';
        }
        form.submit();
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
