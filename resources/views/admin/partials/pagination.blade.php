@if ($paginator->hasPages())
    @php
        $elements = $paginator->getUrlRange(1, $paginator->lastPage());
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        
        // Build pagination elements array similar to Laravel's default
        $window = 2; // Number of pages to show on each side of current page
        $paginationElements = [];
        
        if ($lastPage <= 7) {
            // Show all pages if 7 or fewer
            for ($i = 1; $i <= $lastPage; $i++) {
                $paginationElements[] = ['page' => $i, 'url' => $paginator->url($i)];
            }
        } else {
            // Always show first page
            $paginationElements[] = ['page' => 1, 'url' => $paginator->url(1)];
            
            if ($currentPage > 3) {
                $paginationElements[] = '...';
            }
            
            // Show pages around current page
            $start = max(2, $currentPage - $window);
            $end = min($lastPage - 1, $currentPage + $window);
            
            for ($i = $start; $i <= $end; $i++) {
                $paginationElements[] = ['page' => $i, 'url' => $paginator->url($i)];
            }
            
            if ($currentPage < $lastPage - 2) {
                $paginationElements[] = '...';
            }
            
            // Always show last page
            if ($lastPage > 1) {
                $paginationElements[] = ['page' => $lastPage, 'url' => $paginator->url($lastPage)];
            }
        }
    @endphp
    
    <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-b-lg" aria-label="Pagination">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>
            <div>
                <ul class="flex items-center space-x-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="ml-1 hidden sm:inline">Previous</span>
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-[#1B5E20] border border-[#1B5E20] rounded-lg hover:bg-[#0D4F1C] hover:border-[#0D4F1C] transition-all duration-200 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="ml-1 hidden sm:inline">Previous</span>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($paginationElements as $element)
                        @if (is_string($element))
                            {{-- "Three Dots" Separator --}}
                            <li>
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg">
                                    {{ $element }}
                                </span>
                            </li>
                        @else
                            {{-- Page Number --}}
                            @if ($element['page'] == $currentPage)
                                <li>
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-[#1B5E20] border border-[#1B5E20] rounded-lg shadow-sm">
                                        {{ $element['page'] }}
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $element['url'] }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-[#1B5E20] hover:text-white hover:border-[#1B5E20] transition-all duration-200 transform hover:scale-105">
                                        {{ $element['page'] }}
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-[#1B5E20] border border-[#1B5E20] rounded-lg hover:bg-[#0D4F1C] hover:border-[#0D4F1C] transition-all duration-200 transform hover:scale-105">
                                <span class="mr-1 hidden sm:inline">Next</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                                <span class="mr-1 hidden sm:inline">Next</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        {{-- Mobile Pagination --}}
        <div class="flex items-center justify-between sm:hidden w-full">
            <div class="flex-1 flex justify-between items-center space-x-2">
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-[#1B5E20] border border-[#1B5E20] rounded-lg hover:bg-[#0D4F1C] transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                @endif

                <div class="flex items-center space-x-1">
                    @foreach ($paginationElements as $element)
                        @if (is_string($element))
                            <span class="px-2 py-1 text-xs text-gray-500">...</span>
                        @else
                            @if ($element['page'] == $currentPage)
                                <span class="px-3 py-1 text-sm font-semibold text-white bg-[#1B5E20] rounded-lg">
                                    {{ $element['page'] }}
                                </span>
                            @else
                                <a href="{{ $element['url'] }}" class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-[#1B5E20] hover:text-white transition-all duration-200">
                                    {{ $element['page'] }}
                                </a>
                            @endif
                        @endif
                    @endforeach
                </div>

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-[#1B5E20] border border-[#1B5E20] rounded-lg hover:bg-[#0D4F1C] transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @else
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
