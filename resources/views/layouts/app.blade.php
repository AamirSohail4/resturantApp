<!doctype html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Restaurant') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logos/pak.png') }}">
    <!-- Google Fonts - Raleway -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen flex flex-col bg-[#FAF9F6] text-gray-800 font-sans">
    @include('partials.header')
    
    @if(request()->is('/'))
      @include('partials.banner')
    @endif

    <main class="flex-1">
      @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.toast')
    
    @stack('scripts')
  </body>
</html>
