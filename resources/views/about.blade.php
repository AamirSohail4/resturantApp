@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-[#1B5E20] to-[#0D4F1C] text-white py-16">
  <div class="container mx-auto px-4 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">About Pak Punjab</h1>
    <p class="text-xl text-green-100 max-w-2xl mx-auto">
      Authentic Pakistani & Punjabi Cuisine Since Day One
    </p>
  </div>
</div>

<!-- About Content -->
<div class="bg-white py-16">
  <div class="container mx-auto px-4">
    <!-- Main About Section -->
    <div class="max-w-4xl mx-auto mb-16">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
        <div class="w-24 h-1 bg-[#D4AF37] mx-auto mb-6"></div>
      </div>
      
      <div class="prose prose-lg max-w-none text-gray-700">
        <p class="text-lg leading-relaxed mb-6">
          Welcome to <strong class="text-[#1B5E20]">Pak Punjab Restaurant</strong>, where authentic Pakistani and Punjabi flavors come alive. 
          We are passionate about bringing you the most authentic and delicious dishes from the heart of Pakistan and Punjab.
        </p>
        <p class="text-lg leading-relaxed mb-6">
          Our journey began with a simple mission: to serve traditional recipes passed down through generations, 
          prepared with the freshest ingredients and served with genuine hospitality. Every dish tells a story, 
          and every meal is crafted with love and dedication.
        </p>
        <p class="text-lg leading-relaxed">
          We take pride in our commitment to quality, authenticity, and customer satisfaction. 
          Whether you're craving spicy curries, aromatic biryanis, or freshly baked naan, 
          we bring the true taste of Pakistan and Punjab to your table.
        </p>
      </div>
    </div>

    <!-- Our Branches Section -->
    <div class="max-w-6xl mx-auto mb-16">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Branches</h2>
        <div class="w-24 h-1 bg-[#D4AF37] mx-auto mb-6"></div>
        <p class="text-gray-600 text-lg">Visit us at any of our convenient locations</p>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <!-- Branch 1 -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
          <div class="flex items-start space-x-4 mb-4">
            <div class="flex-shrink-0 w-14 h-14 bg-[#1B5E20] rounded-lg flex items-center justify-center">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-2xl font-bold text-gray-900 mb-2">Branch No. 1</h3>
              <div class="space-y-2">
                <p class="text-gray-700 font-medium">Al Barsha 1, Dubai</p>
                <p class="text-gray-600 text-sm">Barkat Building, Shop No. 1</p>
                <p class="text-gray-600 text-sm">Dubai, UAE</p>
              </div>
            </div>
          </div>
          <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-4 text-sm">
              <a href="tel:+971543075932" class="flex items-center space-x-2 text-[#1B5E20] hover:text-[#0D4F1C] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>+971 54 307 5932</span>
              </a>
              <a href="https://wa.me/971547864838" target="_blank" class="flex items-center space-x-2 text-[#1B5E20] hover:text-[#0D4F1C] transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>WhatsApp</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Branch 2 -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
          <div class="flex items-start space-x-4 mb-4">
            <div class="flex-shrink-0 w-14 h-14 bg-[#D4AF37] rounded-lg flex items-center justify-center">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-2xl font-bold text-gray-900 mb-2">Branch No. 2</h3>
              <div class="space-y-2">
                <p class="text-gray-700 font-medium">Al Rawada 3, Ajman</p>
                <p class="text-gray-600 text-sm">Ajman, UAE</p>
              </div>
            </div>
          </div>
          <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-4 text-sm">
              <a href="tel:+971543075932" class="flex items-center space-x-2 text-[#1B5E20] hover:text-[#0D4F1C] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>+971 54 307 5932</span>
              </a>
              <a href="https://wa.me/971547864838" target="_blank" class="flex items-center space-x-2 text-[#1B5E20] hover:text-[#0D4F1C] transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>WhatsApp</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
        <div class="w-24 h-1 bg-[#D4AF37] mx-auto mb-6"></div>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Authentic Recipes</h3>
          <p class="text-gray-600">Traditional recipes passed down through generations, prepared with authentic spices and techniques.</p>
        </div>

        <!-- Feature 2 -->
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Fresh Ingredients</h3>
          <p class="text-gray-600">Only the finest and freshest ingredients sourced daily to ensure the best quality in every dish.</p>
        </div>

        <!-- Feature 3 -->
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-[#1B5E20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Great Service</h3>
          <p class="text-gray-600">Exceptional hospitality and attentive service to make your dining experience memorable.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Opening Hours Section -->
<div class="bg-gray-50 py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-xl shadow-lg p-8">
        <div class="text-center mb-8">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Opening Hours</h2>
          <div class="w-24 h-1 bg-[#D4AF37] mx-auto"></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
          <div class="text-center p-4 bg-gray-50 rounded-lg">
            <p class="font-semibold text-gray-900 mb-2">Monday - Thursday</p>
            <p class="text-[#1B5E20] font-bold">11:00 AM - 10:00 PM</p>
          </div>
          <div class="text-center p-4 bg-gray-50 rounded-lg">
            <p class="font-semibold text-gray-900 mb-2">Friday - Saturday</p>
            <p class="text-[#1B5E20] font-bold">11:00 AM - 11:00 PM</p>
          </div>
          <div class="text-center p-4 bg-gray-50 rounded-lg">
            <p class="font-semibold text-gray-900 mb-2">Sunday</p>
            <p class="text-[#1B5E20] font-bold">12:00 PM - 9:00 PM</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
