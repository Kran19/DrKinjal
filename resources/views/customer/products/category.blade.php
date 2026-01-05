<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop by Category | Dr. Kinjal Skincare</title>
    <meta name="description" content="Browse our skincare products by category - Serums, Face Wash, Moisturizers, Shampoos, Sunscreen and more.">
    
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
        
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .product-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .category-tab.active {
            background-color: rgb(204 251 241) !important;
            color: rgb(19 78 74) !important;
            border-color: rgb(153 246 228) !important;
        }
        
        /* Animation for product filtering */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 antialiased">
    <!-- Simple Static Header -->
    <header class="sticky top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-lg border-b border-sky-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">
                <span class="text-xl font-bold text-sky-600">Dr. Kinjal Beauty</span>
            </a>
            
            <!-- Navigation -->
            <div class="flex items-center gap-4">
                <a href="/" class="text-stone-700 hover:text-sky-500 transition-colors">Home</a>
                <a href="/login" class="text-stone-700 hover:text-sky-500 transition-colors">Login</a>
                <a href="/register" class="text-stone-700 hover:text-sky-500 transition-colors">Register</a>
            </div>
        </div>
    </header>

    <section class="border-b border-gray-100 bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Shop by Category</h1>
                <p class="mt-4 text-lg text-gray-500">Explore our derm-backed skincare essentials.</p>
            </div>

            <!-- Category Navigation Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-16" id="category-tabs">
                <button data-category="all" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:shadow-lg transition-all border flex items-center active">
                    <i data-lucide="layers" class="w-4 h-4 mr-2"></i> All Products
                </button>
                
                <button data-category="serum" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="flask-conical" class="w-4 h-4 mr-2"></i> Serum
                </button>
                
                <button data-category="facewash" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-rose-50 hover:text-rose-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="sparkles" class="w-4 h-4 mr-2"></i> Face Wash
                </button>
                
                <button data-category="moisturizer" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-sky-50 hover:text-sky-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="droplets" class="w-4 h-4 mr-2"></i> Moisturizer
                </button>
                
                <button data-category="sunscreen" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-blue-50 hover:text-blue-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="sun" class="w-4 h-4 mr-2"></i> Sunscreen
                </button>
                
                <button data-category="shampoo" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-emerald-50 hover:text-emerald-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="wind" class="w-4 h-4 mr-2"></i> Shampoo
                </button>
                
                <button data-category="conditioner" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-amber-50 hover:text-amber-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="heart" class="w-4 h-4 mr-2"></i> Conditioner
                </button>
                
                <button data-category="bodywash" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-teal-50 hover:text-teal-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="shower-head" class="w-4 h-4 mr-2"></i> Body Wash
                </button>
                
                <button data-category="soaps" 
                       class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-yellow-50 hover:text-yellow-700 hover:shadow-lg transition-all border flex items-center">
                    <i data-lucide="soap" class="w-4 h-4 mr-2"></i> Soap
                </button>
            </div>
        </div>
    </section>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 pb-10 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-semibold tracking-tight text-gray-900" id="category-title">All Products</h2>
            <p class="text-gray-500" id="category-description">Showing all products</p>
        </div>

        <!-- Products Grid with Category Filtering - 10 STATIC PRODUCTS -->
        <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4" id="products-container">

            <!-- Product 1: Face Wash -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="facewash">
                <div onclick="viewProduct('facewash-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-orange-50 transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                            Best Seller
                        </span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-orange-100 to-amber-50 flex items-center justify-center p-8">
                            <i data-lucide="droplets" class="w-16 h-16 text-amber-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Brightening Face Wash</h3>
                            <span class="font-semibold text-gray-900">₹399</span>
                        </div>
                        <p class="text-xs text-gray-500">Brightening & Anti-Pigmentation</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-orange-400"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2: Moisturizer -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="moisturizer">
                <div onclick="viewProduct('moisturizer-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-rose-50 transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-rose-100 to-pink-50 flex items-center justify-center p-8">
                            <i data-lucide="wind" class="w-16 h-16 text-rose-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Oil-Free Moisturizer</h3>
                            <span class="font-semibold text-gray-900">₹399</span>
                        </div>
                        <p class="text-xs text-gray-500">Hydrating & Non-Greasy</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-red-300"></div>
                            <div class="w-3 h-3 rounded-full bg-pink-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3: Shampoo -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="shampoo">
                <div onclick="viewProduct('shampoo-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-blue-100 to-cyan-50 flex items-center justify-center p-8">
                            <i data-lucide="wind" class="w-16 h-16 text-blue-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">3 in 1 Shampoo</h3>
                            <span class="font-semibold text-gray-900">₹799</span>
                        </div>
                        <p class="text-xs text-gray-500">Cleanse, Condition & Repair</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4: Serum -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="serum">
                <div onclick="viewProduct('serum-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-orange-50 transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                            Best Seller
                        </span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-amber-100 to-yellow-50 flex items-center justify-center p-8">
                            <i data-lucide="flask-conical" class="w-16 h-16 text-amber-600"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Brightening Serum</h3>
                            <span class="font-semibold text-gray-900">₹480</span>
                        </div>
                        <p class="text-xs text-gray-500">Vitamin C & Hyaluronic Acid</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-orange-400"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 5: Body Wash -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="bodywash">
                <div onclick="viewProduct('bodywash-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-rose-50 transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-pink-100 to-rose-50 flex items-center justify-center p-8">
                            <i data-lucide="shower-head" class="w-16 h-16 text-rose-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Hydrating Body Wash</h3>
                            <span class="font-semibold text-gray-900">₹420</span>
                        </div>
                        <p class="text-xs text-gray-500">With Natural Oils & Shea Butter</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-red-300"></div>
                            <div class="w-3 h-3 rounded-full bg-pink-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 6: Conditioner -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="conditioner">
                <div onclick="viewProduct('conditioner-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-sky-100 to-blue-50 flex items-center justify-center p-8">
                            <i data-lucide="heart" class="w-16 h-16 text-blue-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Repair Conditioner</h3>
                            <span class="font-semibold text-gray-900">₹330</span>
                        </div>
                        <p class="text-xs text-gray-500">For Damaged & Dry Hair</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 7: Face Wash -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="facewash">
                <div onclick="viewProduct('facewash-2')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-cyan-100 to-blue-50 flex items-center justify-center p-8">
                            <i data-lucide="droplets" class="w-16 h-16 text-cyan-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Gentle Face Wash</h3>
                            <span class="font-semibold text-gray-900">₹299</span>
                        </div>
                        <p class="text-xs text-gray-500">For Sensitive Skin</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 8: Soap -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="soaps">
                <div onclick="viewProduct('soap-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-green-50 transition-all duration-300 hover:shadow-2xl hover:shadow-green-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">Trending</span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-emerald-100 to-green-50 flex items-center justify-center p-8">
                            <i data-lucide="soap" class="w-16 h-16 text-emerald-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Cleansing Soap</h3>
                            <span class="font-semibold text-gray-900">₹135</span>
                        </div>
                        <p class="text-xs text-gray-500">Natural & Moisturizing</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-green-300"></div>
                            <div class="w-3 h-3 rounded-full bg-teal-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 9: Soap -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="soaps">
                <div onclick="viewProduct('soap-2')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-purple-50 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-100">
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-violet-100 to-purple-50 flex items-center justify-center p-8">
                            <i data-lucide="soap" class="w-16 h-16 text-purple-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Brightening Soap</h3>
                            <span class="font-semibold text-gray-900">₹135</span>
                        </div>
                        <p class="text-xs text-gray-500">With Vitamin C & Turmeric</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-orange-300"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 10: SUNSCREEN -->
            <div class="product-item group cursor-pointer animate-fade-in-up" data-category="sunscreen">
                <div onclick="viewProduct('sunscreen-1')" class="cursor-pointer">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                            SPF 50++
                        </span>
                        <div class="absolute inset-0 z-10 h-full w-full bg-gradient-to-br from-sky-100 to-blue-50 flex items-center justify-center p-8">
                            <i data-lucide="sun" class="w-16 h-16 text-blue-500"></i>
                        </div>
                        <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Sunscreen SPF 50++</h3>
                            <span class="font-semibold text-gray-900">₹398</span>
                        </div>
                        <p class="text-xs text-gray-500">Broad Spectrum Protection</p>
                        <div class="flex gap-1 pt-1">
                            <div class="w-3 h-3 rounded-full bg-blue-400"></div>
                            <div class="w-3 h-3 rounded-full bg-sky-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <button onclick="loadMoreProducts()" class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-8 py-4 font-semibold text-white shadow-lg shadow-rose-200 hover:bg-rose-600 hover:scale-105 transition-all">
                View All Products
                <i data-lucide="arrow-right" class="h-4 w-4"></i>
            </button>
        </div>
    </main>

    <!-- Simple Static Footer -->
    <footer class="bg-stone-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <p class="text-stone-400 text-sm mb-6">clinically effective, result oriented products.</p>
                <p class="text-xs text-stone-500">&copy; 2024 Dr Kinjal Beauty. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            
            // Get category from URL if present
            const urlParams = new URLSearchParams(window.location.search);
            const categoryFromUrl = urlParams.get('category');
            let currentCategory = 'all';
            
            if (categoryFromUrl) {
                currentCategory = categoryFromUrl;
                // Update URL without reload
                updateUrl(currentCategory);
            }
            
            // Set active tab based on current category
            setActiveTab(currentCategory);
            
            // Filter products based on selected category
            filterProducts(currentCategory);
            
            // Add click handlers to category tabs
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    const category = this.dataset.category;
                    setActiveTab(category);
                    filterProducts(category);
                    updateUrl(category);
                });
            });
            
            // Add click handlers to product items
            document.querySelectorAll('.product-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    // Don't trigger if clicking the plus button
                    if (!e.target.closest('button')) {
                        const productId = this.querySelector('[onclick]').getAttribute('onclick').match(/'([^']+)'/)[1];
                        viewProduct(productId);
                    }
                });
            });
        });
        
        function setActiveTab(category) {
            // Update active state
            document.querySelectorAll('.category-tab').forEach(tab => {
                // Remove all active classes
                tab.classList.remove('active', 'bg-teal-100', 'text-teal-900', 'border-teal-200');
                tab.classList.remove('bg-purple-100', 'text-purple-900', 'border-purple-200');
                tab.classList.remove('bg-rose-100', 'text-rose-900', 'border-rose-200');
                tab.classList.remove('bg-sky-100', 'text-sky-900', 'border-sky-200');
                tab.classList.remove('bg-blue-100', 'text-blue-900', 'border-blue-200');
                tab.classList.remove('bg-emerald-100', 'text-emerald-900', 'border-emerald-200');
                tab.classList.remove('bg-amber-100', 'text-amber-900', 'border-amber-200');
                tab.classList.remove('bg-yellow-100', 'text-yellow-900', 'border-yellow-200');
                tab.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
                
                if (tab.dataset.category === category) {
                    if (category === 'all') {
                        tab.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                    } else if (category === 'serum') {
                        tab.classList.add('bg-purple-100', 'text-purple-900', 'border-purple-200', 'active');
                    } else if (category === 'facewash') {
                        tab.classList.add('bg-rose-100', 'text-rose-900', 'border-rose-200', 'active');
                    } else if (category === 'moisturizer') {
                        tab.classList.add('bg-sky-100', 'text-sky-900', 'border-sky-200', 'active');
                    } else if (category === 'sunscreen') {
                        tab.classList.add('bg-blue-100', 'text-blue-900', 'border-blue-200', 'active');
                    } else if (category === 'shampoo') {
                        tab.classList.add('bg-emerald-100', 'text-emerald-900', 'border-emerald-200', 'active');
                    } else if (category === 'conditioner') {
                        tab.classList.add('bg-amber-100', 'text-amber-900', 'border-amber-200', 'active');
                    } else if (category === 'bodywash') {
                        tab.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                    } else if (category === 'soaps') {
                        tab.classList.add('bg-yellow-100', 'text-yellow-900', 'border-yellow-200', 'active');
                    }
                }
            });
            
            // Update title and description
            const titleElement = document.getElementById('category-title');
            const descElement = document.getElementById('category-description');
            
            const categoryNames = {
                'all': 'All Products',
                'serum': 'Serums',
                'facewash': 'Face Wash',
                'moisturizer': 'Moisturizers',
                'sunscreen': 'Sunscreen',
                'shampoo': 'Shampoos',
                'conditioner': 'Conditioners',
                'bodywash': 'Body Wash',
                'soaps': 'Soaps'
            };
            
            const categoryDescriptions = {
                'all': 'Showing all skincare products',
                'serum': 'Targeted treatments for specific skin concerns',
                'facewash': 'Gentle cleansers for daily skincare routine',
                'moisturizer': 'Hydration and nourishment for your skin',
                'sunscreen': 'Protection against harmful UV rays',
                'shampoo': 'Hair care for healthy, shiny hair',
                'conditioner': 'Deep conditioning for smooth, manageable hair',
                'bodywash': 'Refreshing body care products',
                'soaps': 'Natural cleansing bars for skin'
            };
            
            titleElement.textContent = categoryNames[category] || 'Products';
            descElement.textContent = categoryDescriptions[category] || `Showing ${category} products`;
        }
        
        function filterProducts(category) {
            const productItems = document.querySelectorAll('.product-item');
            const container = document.getElementById('products-container');
            
            // Remove animation class from all items
            productItems.forEach(item => {
                item.classList.remove('animate-fade-in-up');
            });
            
            // Filter products with animation
            let visibleCount = 0;
            productItems.forEach(item => {
                const itemCategory = item.dataset.category;
                
                if (category === 'all' || itemCategory === category) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                        // Add animation with delay for each item
                        setTimeout(() => {
                            item.classList.add('animate-fade-in-up');
                        }, visibleCount * 50);
                        visibleCount++;
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        }
        
        function updateUrl(category) {
            // Update URL without page reload
            const url = new URL(window.location);
            if (category === 'all') {
                url.searchParams.delete('category');
            } else {
                url.searchParams.set('category', category);
            }
            window.history.pushState({}, '', url);
        }
        
        function viewProduct(productId) {
            alert(`Viewing product: ${productId}\n\nThis would show product details in a real application.`);
            // In a real app, this would redirect to product detail page:
            // window.location.href = `/product/${productId}`;
        }
        
        function loadMoreProducts() {
            alert('This would load more products in a real application.');
            // In a real app, this would load additional products via AJAX
        }
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('category') || 'all';
            setActiveTab(category);
            filterProducts(category);
        });
    </script>
</body>
</html>