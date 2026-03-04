<!-- Toast Notification Container -->
<div id="toast-container" class="fixed top-4 right-4 z-[9999] space-y-2 pointer-events-none"></div>

<!-- Confirmation Modal -->
<div id="confirm-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[10000] flex items-center justify-center pointer-events-none">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full mx-4 transform transition-all pointer-events-auto">
        <div class="p-6">
            <div class="flex items-center space-x-4 mb-4">
                <div class="flex-shrink-0 w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900" id="confirm-title">Confirm Action</h3>
            </div>
            <p class="text-gray-600 mb-6" id="confirm-message">Are you sure you want to proceed?</p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeConfirmModal()" class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">
                    Cancel
                </button>
                <button id="confirm-ok-btn" onclick="executeConfirmAction()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Toast Notification System
function showToast(message, type = 'success', duration = 3000) {
    const container = document.getElementById('toast-container');
    if (!container) return;
    
    const toast = document.createElement('div');
    const bgColor = type === 'error' ? 'bg-red-600' : type === 'warning' ? 'bg-yellow-500' : 'bg-[#1B5E20]';
    const iconPath = type === 'error' 
        ? 'M6 18L18 6M6 6l12 12' 
        : type === 'warning'
        ? 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
        : 'M5 13l4 4L19 7';
    
    toast.className = `${bgColor} text-white px-4 sm:px-6 py-3 sm:py-4 rounded-lg shadow-lg z-50 flex items-center space-x-3 animate-slide-in pointer-events-auto min-w-[280px] sm:min-w-[320px] max-w-[90vw]`;
    toast.innerHTML = `
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}"></path>
        </svg>
        <span class="flex-1 text-sm sm:text-base">${message}</span>
        <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200 flex-shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    `;
    
    container.appendChild(toast);
    
    // Auto remove after duration
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

// Confirmation Modal System
let confirmCallback = null;

function showConfirmModal(message, callback, title = 'Confirm Action') {
    document.getElementById('confirm-title').textContent = title;
    document.getElementById('confirm-message').textContent = message;
    confirmCallback = callback;
    const modal = document.getElementById('confirm-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        modal.querySelector('.bg-white').style.transform = 'scale(1)';
    }, 10);
}

function closeConfirmModal() {
    const modal = document.getElementById('confirm-modal');
    modal.querySelector('.bg-white').style.transform = 'scale(0.95)';
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        confirmCallback = null;
    }, 200);
}

function executeConfirmAction() {
    if (confirmCallback) {
        confirmCallback();
    }
    closeConfirmModal();
}

// Close modal on backdrop click
document.getElementById('confirm-modal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeConfirmModal();
    }
});

// Add CSS animations
if (!document.getElementById('toast-styles')) {
    const style = document.createElement('style');
    style.id = 'toast-styles';
    style.textContent = `
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
    `;
    document.head.appendChild(style);
}
</script>
