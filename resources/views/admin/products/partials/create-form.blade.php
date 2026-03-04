<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
    @csrf

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
            <select name="category_id" id="category_id" required class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name (English) *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
            @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Name Arabic -->
        <div>
            <label for="name_ar" class="block text-sm font-medium text-gray-700 mb-2">Product Name (Arabic)</label>
            <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
            @error('name_ar')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required
                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
            @error('price')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Currency -->
        <div>
            <label for="currency" class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
            <input type="text" name="currency" id="currency" value="{{ old('currency', 'AED') }}"
                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
            @error('currency')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="sm:col-span-2">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
            <div class="mt-1 flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-5">
                <div class="flex-1 w-full">
                    <input type="file" name="image" id="image" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1B5E20] file:text-white hover:file:bg-[#0D4F1C] file:cursor-pointer border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF, WEBP up to 2MB</p>
                </div>
                <div id="image-preview" class="hidden">
                    <img id="preview-img" src="" alt="Preview" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg border border-gray-300">
                </div>
            </div>
            @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sort Order -->
        <div>
            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">
            @error('sort_order')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1B5E20] focus:border-transparent text-sm sm:text-base">{{ old('description') }}</textarea>
        @error('description')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Is Active -->
    <div class="flex items-center">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
               class="w-4 h-4 text-[#1B5E20] border-gray-300 rounded focus:ring-[#1B5E20]">
        <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
    </div>

    <!-- Actions -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end space-y-2 sm:space-y-0 sm:space-x-4 pt-4 border-t border-gray-200">
        <button type="button" onclick="closeModal('new-product-modal')"
                class="w-full sm:w-auto px-4 sm:px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors text-sm sm:text-base">
            Cancel
        </button>
        <button type="submit"
                class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-[#1B5E20] text-white rounded-lg font-semibold hover:bg-[#0D4F1C] transition-all duration-300 transform hover:scale-105 shadow-lg text-sm sm:text-base">
            Create Product
        </button>
    </div>
</form>
