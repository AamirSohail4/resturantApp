@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Logo Header Section -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#1B5E20]">
        <div class="flex items-center justify-center space-x-4">
            <div class="w-20 h-20 bg-white rounded-lg flex items-center justify-center p-2 shadow-sm border border-gray-200">
                <img src="{{ asset('images/logos/pklogo.png') }}" 
                     alt="Pak Punjab Logo" 
                     class="w-full h-full object-contain">
            </div>
            <div class="text-center">
                <h1 class="text-xl sm:text-2xl font-semibold text-[#1B5E20]">Pak Punjab Restaurant</h1>
                <p class="text-sm text-gray-600 mt-1">Admin Dashboard</p>
            </div>
        </div>
    </div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#1B5E20]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-xs font-normal">Total Products</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{ $stats['total_products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#D4AF37]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-xs font-normal">Active Products</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{ $stats['active_products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-xs font-normal">Total Categories</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{ $stats['total_categories'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-xs font-normal">Active Categories</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{ $stats['active_categories'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-semibold text-gray-900">Recent Products</h3>
            <a href="{{ route('admin.products.index') }}" class="text-[#1B5E20] hover:text-[#0D4F1C] font-normal text-xs">View All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($recent_products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-xs font-normal text-gray-900">{{ $product->name }}</td>
                        <td class="px-4 py-3 text-xs text-gray-600">{{ $product->category->name }}</td>
                        <td class="px-4 py-3 text-xs text-gray-900">{{ $product->price }} {{ $product->currency }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">No products yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Categories -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-semibold text-gray-900">Recent Categories</h3>
            <a href="{{ route('admin.categories.index') }}" class="text-[#1B5E20] hover:text-[#0D4F1C] font-normal text-xs">View All →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($recent_categories as $category)
            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <h4 class="text-sm font-medium text-gray-900">{{ $category->name }}</h4>
                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                @if($category->description)
                <p class="text-xs text-gray-600 mt-2">{{ Str::limit($category->description, 50) }}</p>
                @endif
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-8">No categories yet</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
