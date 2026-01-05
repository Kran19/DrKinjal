<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Dr Kinjal Beauty</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Browse our complete collection of clinically effective skincare products.">
    <meta name="keywords" content="shop, skincare, beauty, serum, moisturizer, facewash">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        'brand': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Card tilt effect */
        .card-tilt {
            transition: transform 0.3s ease;
        }

        .card-tilt:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(5deg);
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
    <!-- Static Header -->
    <nav class="sticky top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-lg border-b border-sky-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-20 flex items-center justify-between gap-4">
            <!-- Hamburger button -->
            <button id="menu-btn" type="button" class="lg:hidden p-2 text-stone-700 hover:text-sky-500 transition">
                <i id="menu-icon" data-lucide="menu" class="w-7 h-7"></i>
            </button>

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 mx-auto lg:mx-0">
                <img src="/assets/logo.png" class="w-40 md:w-40 h-auto" alt="Dr Kinjal Beauty Logo">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-8 text-base font-semibold text-stone-700 ml-10">
                <a href="/" class="hover:text-sky-500">Home</a>
                <a href="/products" class="text-sky-500 underline underline-offset-4">Shop All</a>
                <a href="/page/about" class="hover:text-sky-500">Our Story</a>
                <a href="/login" class="hover:text-sky-500">Log-in</a>
            </div>

            <!-- Icons -->
            <div class="flex items-center gap-4">
                <!-- Account button -->
                <a href="/login" class="p-2 hover:bg-sky-50 rounded-full transition">
                    <i data-lucide="user" class="w-5 h-5 text-stone-700"></i>
                </a>

                <!-- Cart with item count -->
                <a href="/cart" class="relative">
                    <button class="p-2 hover:bg-sky-50 rounded-full transition relative">
                        <i data-lucide="shopping-bag" class="w-5 h-5 text-stone-700"></i>
                        <span id="cartCount" class="absolute -top-2 -right-2 bg-sky-500 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center border-2 border-white font-bold shadow-sm hidden">
                            0
                        </span>
                    </button>
                </a>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="lg:hidden bg-white border-t border-sky-100 px-5 py-4 flex flex-col text-stone-700 text-lg font-medium">
            <a href="/" class="py-2">Home</a>
            <a href="/products" class="py-2 text-sky-500 font-semibold">Shop All</a>
            <a href="/page/about" class="py-2">Our Story</a>
            <a href="/login" class="py-2">Log-in</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Category Navigation Section -->
        <section class="py-12 bg-white border-b border-stone-100">
            <div class="max-w-7xl mx-auto px-6 relative">
                <h2 class="text-2xl font-bold text-stone-900 mb-8 tracking-tight">Need Help Choosing? Start Here!</h2>

                <!-- Navigation buttons -->
                <button class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-20 w-10 h-10 rounded-full bg-white shadow-lg border border-stone-200 items-center justify-center hover:bg-stone-50 transition-colors duration-200"
                        onclick="scrollCategories(-1)">
                    <i data-lucide="chevron-left" class="w-5 h-5 text-stone-700"></i>
                </button>
                
                <button class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-20 w-10 h-10 rounded-full bg-white shadow-lg border border-stone-200 items-center justify-center hover:bg-stone-50 transition-colors duration-200"
                        onclick="scrollCategories(1)">
                    <i data-lucide="chevron-right" class="w-5 h-5 text-stone-700"></i>
                </button>

                <div class="relative">
                    <div id="categories-container" class="flex gap-4 overflow-x-auto pb-8 no-scrollbar snap-x -mx-6 px-6 md:mx-0 md:px-0">

                        <!-- Soaps -->
                        <a href="/category/soap"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-rose-50 to-rose-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Soaps</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/62.png"
                                class="absolute bottom-0 right-0 w-24 h-32 object-contain rotate-[-10deg] group-hover:rotate-0 transition-transform duration-500"
                                alt="Soaps">
                        </a>

                        <!-- Serum -->
                        <a href="/category/serum"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-purple-50 to-purple-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Serum</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/40.png"
                                class="absolute bottom-0 right-0 w-20 h-24 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                                alt="Serum">
                        </a>

                        <!-- Moisturizer -->
                        <a href="/category/moisturizer"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-orange-50 to-orange-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Moisturizer</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/23.png"
                                class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] translate-x-2 group-hover:scale-105 transition-transform duration-500"
                                alt="Moisturizer">
                        </a>

                        <!-- Shampoo -->
                        <a href="/category/shampoo"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-sky-50 to-sky-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Shampoo</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/30.png"
                                class="absolute bottom-0 right-0 w-20 h-30 object-contain rotate-[-10deg] group-hover:scale-105 transition-transform duration-500"
                                alt="Shampoo">
                        </a>

                        <!-- Conditioner -->
                        <a href="/category/conditioner"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-teal-50 to-teal-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Conditioner</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/50.png"
                                class="absolute bottom-0 right-0 w-22 h-24 object-contain rotate-[-10deg] group-hover:scale-105 transition-transform duration-500"
                                alt="Conditioner">
                        </a>

                        <!-- Face Wash -->
                        <a href="/category/facewash"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-lime-50 to-lime-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Face Wash</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/6.png"
                                class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] translate-x-2 group-hover:scale-105 transition-transform duration-500"
                                alt="Face Wash">
                        </a>

                        <!-- Sunscreen -->
                        <a href="/category/sunscreen"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-amber-50 to-amber-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Sunscreen</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/72.png"
                                class="absolute bottom-0 right-0 w-25 h-24 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                                alt="Sunscreen">
                        </a>

                        <!-- Bodywash -->
                        <a href="/category/bodywash"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-yellow-50 to-yellow-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Bodywash</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            <img src="/assets/images/46.png"
                                class="absolute bottom-0 right-0 w-25 h-24 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                                alt="Bodywash">
                        </a>

                    </div>
                </div>
            </div>
        </section>

        <!-- Product Grid Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4 md:px-6">
                <h2 class="text-2xl font-bold text-stone-900 mb-8 tracking-tight">All Products</h2>

                <!-- Product Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6" id="product-grid">

                    <!-- Product 1 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-teal-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-teal-100">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                Best Seller
                            </span>
                            <img src="/assets/images/16.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Skin Brightening Face Wash" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(1)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Skin Brightening Face Wash
                                </h3>
                                <span class="font-semibold text-stone-900">₹399</span>
                            </div>
                            <p class="text-xs text-stone-500">Brightening & Anti-Pigmentation</p>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="product-card group cursor-pointer" data-category="moisturizers">
                        <div class="relative bg-cyan-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-100">
                            <span class="absolute top-4 left-4 bg-sky-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                New
                            </span>
                            <img src="/assets/images/23.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Moisturizer" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(2)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Moisturizer
                                </h3>
                                <span class="font-semibold text-stone-900">₹399</span>
                            </div>
                            <p class="text-xs text-stone-500">Oil-Free Matte Moisturizer</p>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-sky-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-sky-100">
                            <img src="/assets/images/31.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="3 in 1 Shampoo" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(3)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    3 in 1 Shampoo
                                </h3>
                                <span class="font-semibold text-stone-900">₹799</span>
                            </div>
                            <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-teal-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-teal-100">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                Best Seller
                            </span>
                            <img src="/assets/images/36.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Face Serum" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(4)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Face Serum
                                </h3>
                                <span class="font-semibold text-stone-900">₹480</span>
                            </div>
                            <p class="text-xs text-stone-500">Brightening & Anti-Pigmentation</p>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-card group cursor-pointer" data-category="moisturizers">
                        <div class="relative bg-cyan-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-100">
                            <span class="absolute top-4 left-4 bg-sky-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                New
                            </span>
                            <img src="/assets/images/70.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Bodywash" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(5)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Bodywash
                                </h3>
                                <span class="font-semibold text-stone-900">₹420</span>
                            </div>
                            <p class="text-xs text-stone-500">Oil-Free Matte Moisturizer</p>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-sky-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-sky-100">
                            <img src="/assets/images/49.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Conditioner" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(6)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Conditioner
                                </h3>
                                <span class="font-semibold text-stone-900">₹330</span>
                            </div>
                            <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-sky-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-sky-100">
                            <img src="/assets/images/54.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Facewash" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(7)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Facewash
                                </h3>
                                <span class="font-semibold text-stone-900">₹299</span>
                            </div>
                            <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="product-card group cursor-pointer" data-category="moisturizers">
                        <div class="relative bg-teal-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-teal-100">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                Trending
                            </span>
                            <img src="/assets/images/69.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Cleansing & Moisturizing Soap" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(8)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Cleansing & Moisturizing Soap
                                </h3>
                                <span class="font-semibold text-stone-900">₹135</span>
                            </div>
                            <p class="text-xs text-stone-500">Soothing Repair Sleep Mask</p>
                        </div>
                    </div>

                    <!-- Product 9 -->
                    <div class="product-card group cursor-pointer" data-category="serums">
                        <div class="relative bg-sky-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-sky-100">
                            <img src="/assets/images/68.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Skin Brightening Soap" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(9)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Skin Brightening Soap
                                </h3>
                                <span class="font-semibold text-stone-900">₹135</span>
                            </div>
                            <p class="text-xs text-stone-500">Antioxidant Brightening</p>
                        </div>
                    </div>

                    <!-- Product 10 -->
                    <div class="product-card group cursor-pointer" data-category="sunscreens">
                        <div class="relative bg-amber-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-amber-100">
                            <img src="/assets/images/73.png"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Sunscreen SPF 50++" loading="lazy">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(10)">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-sky-600 transition-colors">
                                    Sunscreen SPF 50++
                                </h3>
                                <span class="font-semibold text-stone-900">₹398</span>
                            </div>
                            <p class="text-xs text-stone-500">SPF 50++ Broad Spectrum</p>
                        </div>
                    </div>

                </div>

                <div class="text-center mt-12">
                    <a href="/products" class="inline-flex items-center gap-2 px-6 py-3 md:px-8 md:py-4
                              bg-sky-500 text-white font-semibold rounded-full
                              hover:bg-sky-600 hover:scale-105
                              transition-all duration-300 shadow-lg shadow-sky-200">
                        View All Products
                        <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Static Footer -->
    <footer class="bg-stone-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <a href="/" class="flex items-center gap-2 mb-6">
                        <span class="text-xl font-bold">Dr.Kinjal</span>
                    </a>
                    <p class="text-stone-400 text-sm mb-6">clinically effective, result oriented products.</p>
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/dr.kinjal__?igsh=MW9pZTE4dnFoeXRk&utm_source=qr"
                            class="w-10 h-10 bg-stone-800 rounded-full flex items-center justify-center hover:bg-sky-500 transition-colors">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </a>
                        <a href="https://www.facebook.com/share/1GSBtSVcNb/"
                            class="w-10 h-10 bg-stone-800 rounded-full flex items-center justify-center hover:bg-sky-500 transition-colors">
                            <i data-lucide="facebook" class="w-5 h-5"></i>
                        </a>
                        <!-- Email -->
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=DrKinjal.official@gmail.com" target="_blank"
                            class="w-10 h-10 bg-[#EA4335] rounded-full flex items-center justify-center hover:bg-[#d7372c] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="white">
                                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Shop -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Shop</h3>
                    <ul class="space-y-3">
                        <li><a href="/category/serum" class="text-stone-400 hover:text-white transition-colors">Serum</a></li>
                        <li><a href="/category/moisturizer" class="text-stone-400 hover:text-white transition-colors">Moisturizer</a></li>
                        <li><a href="/category/facewash" class="text-stone-400 hover:text-white transition-colors">Facewash</a></li>
                        <li><a href="/category/sunscreen" class="text-stone-400 hover:text-white transition-colors">Sunscreen</a></li>
                        <li><a href="/category/combos" class="text-stone-400 hover:text-white transition-colors">Combos</a></li>
                    </ul>
                </div>

                <!-- Help -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Help</h3>
                    <ul class="space-y-3">
                        <li><a href="/page/contact" class="text-stone-400 hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="/page/faq" class="text-stone-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="/account/orders" class="text-stone-400 hover:text-white transition-colors">Track Order</a></li>
                        <li><a href="/page/shipping-policy" class="text-stone-400 hover:text-white transition-colors">Shipping Policy</a></li>
                        <li><a href="/page/privacy" class="text-stone-400 hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Stay Updated</h3>
                    <div class="space-y-2">
                        <input type="email" placeholder="Your email" required
                            class="w-full px-4 py-3 bg-stone-800 border border-stone-700 rounded-full text-white placeholder-stone-500 focus:outline-none focus:border-sky-500">
                        <button type="submit"
                            class="w-full px-6 py-3 bg-sky-500 text-white font-semibold rounded-full hover:bg-sky-600 transition-colors">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="pt-8 border-t border-stone-800 text-center text-stone-400 text-sm">
                <p>&copy; 2024 Dr Kinjal Beauty. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            lucide.createIcons();
            
            // Mobile menu toggle
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
                if (mobileMenu.classList.contains('active')) {
                    menuIcon.setAttribute('data-lucide', 'x');
                } else {
                    menuIcon.setAttribute('data-lucide', 'menu');
                }
                lucide.createIcons();
            });
        });

        // Scroll functionality for category cards
        function scrollCategories(direction) {
            const container = document.getElementById('categories-container');
            const scrollAmount = 200; // Adjust scroll amount as needed
            container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        }

        // Simple add to cart function (for demonstration)
        function addToCart(productId) {
            alert('Product ' + productId + ' added to cart!');
            // Show cart count
            const cartCount = document.getElementById('cartCount');
            let currentCount = parseInt(cartCount.textContent) || 0;
            cartCount.textContent = currentCount + 1;
            cartCount.classList.remove('hidden');
        }
    </script>
</body>
</html>