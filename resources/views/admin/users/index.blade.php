@extends('admin.layout')

@section('page-title', 'Users')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0">
        <div>
            <h1 class="text-lg sm:text-xl font-semibold text-gray-900">Users</h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage admin users</p>
        </div>
        <a href="{{ route('admin.users.create') }}" 
           class="w-auto bg-[#1B5E20] text-white px-3 py-1.5 sm:px-5 sm:py-2 rounded-lg font-medium text-xs sm:text-sm hover:bg-[#0D4F1C] transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-1.5 sm:space-x-2 active:scale-95">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="hidden sm:inline">Add New User</span>
            <span class="sm:hidden">Add</span>
        </a>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto -mx-3 sm:mx-0">
            <table class="w-full min-w-[640px]">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Created</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#1B5E20] rounded-full flex items-center justify-center text-white font-medium text-xs sm:text-sm mr-2 sm:mr-3 flex-shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="text-xs sm:text-sm font-normal text-gray-900 truncate">{{ $user->name }}</div>
                                    @if($user->id === auth()->id())
                                    <span class="text-xs text-[#1B5E20] font-normal">(You)</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4">
                            <div class="text-xs sm:text-sm text-gray-900 truncate max-w-[200px] sm:max-w-none">{{ $user->email }}</div>
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 hidden sm:table-cell">
                            <div class="text-xs sm:text-sm text-gray-600">{{ $user->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-1 sm:space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="text-[#1B5E20] hover:text-[#0D4F1C] transition-colors p-1">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                @if($user->id !== auth()->id())
                                <div class="relative">
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" id="delete-user-form-{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="showDeleteConfirmation({{ $user->id }}, '{{ addslashes($user->name) }}', this)" class="text-red-600 hover:text-red-800 transition-colors p-1 relative">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Inline Delete Confirmation -->
                                    <div id="delete-confirm-{{ $user->id }}" class="hidden absolute right-0 top-full mt-2 z-50 bg-white rounded-lg shadow-xl border border-gray-200 p-3 min-w-[200px] sm:min-w-[240px] animate-fade-in">
                                        <p class="text-sm text-gray-700 mb-3">Delete "{{ $user->name }}"?</p>
                                        <div class="flex items-center justify-end space-x-2">
                                            <button onclick="closeDeleteConfirmation({{ $user->id }})" class="px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                                Cancel
                                            </button>
                                            <button onclick="confirmDeleteUser({{ $user->id }}, '{{ addslashes($user->name) }}')" class="px-3 py-1.5 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md font-medium transition-colors">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No users</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new user.</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#1B5E20] hover:bg-[#0D4F1C]">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add User
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

<script>
let activeDeleteConfirm = null;

function showDeleteConfirmation(userId, userName, button) {
    // Close any other open confirmations
    if (activeDeleteConfirm && activeDeleteConfirm !== userId) {
        closeDeleteConfirmation(activeDeleteConfirm);
    }
    
    const confirmDiv = document.getElementById('delete-confirm-' + userId);
    if (confirmDiv) {
        confirmDiv.classList.remove('hidden');
        activeDeleteConfirm = userId;
        
        // Close on outside click
        setTimeout(() => {
            document.addEventListener('click', function closeOnOutsideClick(e) {
                if (!confirmDiv.contains(e.target) && e.target !== button) {
                    closeDeleteConfirmation(userId);
                    document.removeEventListener('click', closeOnOutsideClick);
                }
            });
        }, 10);
    }
}

function closeDeleteConfirmation(userId) {
    const confirmDiv = document.getElementById('delete-confirm-' + userId);
    if (confirmDiv) {
        confirmDiv.classList.add('hidden');
        if (activeDeleteConfirm === userId) {
            activeDeleteConfirm = null;
        }
    }
}

function confirmDeleteUser(userId, userName) {
    closeDeleteConfirmation(userId);
    
    const form = document.getElementById('delete-user-form-' + userId);
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
            showToast('User deleted successfully', 'success');
            
            // Animate row removal
            if (row) {
                row.style.transition = 'opacity 0.3s, transform 0.3s';
                row.style.opacity = '0';
                row.style.transform = 'translateX(-20px)';
                setTimeout(() => {
                    row.remove();
                }, 300);
            } else {
                setTimeout(() => location.reload(), 1000);
            }
        } else {
            if (row) {
                row.style.opacity = '1';
                row.style.pointerEvents = 'auto';
            }
            showToast('Failed to delete user', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (row) {
            row.style.opacity = '1';
            row.style.pointerEvents = 'auto';
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
