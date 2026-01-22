<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dr Kinjal Beauty')</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('description', 'Clinically effective, result oriented products.')">
    <meta name="keywords" content="@yield('keywords', 'skincare, beauty, natural, organic')">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
   
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/customer/custom.css') }}">
    
    <!-- Page Specific Styles -->
    @stack('styles')
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Mobile dropdown animation */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
        }
        #mobile-menu.active {
            max-height: 450px;
            opacity: 1;
        }

        /* Fix for cart counter positioning */
        #cartCount {
            position: absolute !important;
            top: -8px !important;
            right: -8px !important;
            min-width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            z-index: 10;
            background-color: #0ea5e9 !important;
            color: white !important;
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800 antialiased">
    <!-- Header Partial -->
    @include('customer.partials.header')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer Partial -->
    @include('customer.partials.footer')
    
    <!-- Scripts Partial -->
    @include('customer.partials.scripts')
    
    <!-- Page Specific Scripts -->
    @stack('scripts')

     <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest" defer></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    
</body>
</html>