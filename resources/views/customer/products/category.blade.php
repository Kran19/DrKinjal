@extends('customer.layouts.master')

@section('title', 'Shop by Category | Dr. Kinjal Skincare')
@section('description', 'Browse our skincare products by category - Serums, Face Wash, Moisturizers, Shampoos, Sunscreen and more.')

@push('styles')
<style>
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
</style>
@endpush

@section('content')
<section class="border-b border-gray-100 bg-white py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Shop by Category</h1>
            <p class="mt-4 text-lg text-gray-500">Explore our derm-backed skincare essentials.</p>
        </div>

        <!-- Category Navigation Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <a href="{{ route('customer.products.list') }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="layers" class="w-4 h-4 mr-2"></i> All Products
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'serum']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="flask-conical" class="w-4 h-4 mr-2"></i> Serum
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'facewash']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-rose-50 hover:text-rose-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="sparkles" class="w-4 h-4 mr-2"></i> Face Wash
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'moisturizer']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-sky-50 hover:text-sky-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="droplets" class="w-4 h-4 mr-2"></i> Moisturizer
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'sunscreen']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-blue-50 hover:text-blue-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="sun" class="w-4 h-4 mr-2"></i> Sunscreen
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'shampoo']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-emerald-50 hover:text-emerald-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="wind" class="w-4 h-4 mr-2"></i> Shampoo
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'conditioner']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-amber-50 hover:text-amber-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="heart" class="w-4 h-4 mr-2"></i> Conditioner
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'bodywash']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-teal-50 hover:text-teal-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="shower-head" class="w-4 h-4 mr-2"></i> Body Wash
            </a>
            
            <a href="{{ route('customer.category.products', ['slug' => 'soaps']) }}" 
               class="category-tab px-5 py-2.5 bg-white text-slate-700 border-slate-200 font-medium rounded-full hover:bg-yellow-50 hover:text-yellow-700 hover:shadow-lg transition-all border flex items-center">
                <i data-lucide="soap" class="w-4 h-4 mr-2"></i> Soap
            </a>
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
        <div class="product-item group cursor-pointer" data-category="facewash">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-orange-50 transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                        Best Seller
                    </span>
                    <img src="{{ asset('storage/assets/images/16.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Brightening Face Wash">
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
            </a>
        </div>

        <!-- Product 2: Moisturizer -->
        <div class="product-item group cursor-pointer" data-category="moisturizer">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-rose-50 transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                    <img src="{{ asset('storage/assets/images/23.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Moisturizer">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Moisturizer</h3>
                        <span class="font-semibold text-gray-900">₹399</span>
                    </div>
                    <p class="text-xs text-gray-500">Oil-Free Matte Moisturizer</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-red-300"></div>
                        <div class="w-3 h-3 rounded-full bg-pink-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 3: Shampoo -->
        <div class="product-item group cursor-pointer" data-category="shampoo">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                    <img src="{{ asset('storage/assets/images/31.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="3 in 1 Shampoo">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">3 in 1 Shampoo</h3>
                        <span class="font-semibold text-gray-900">₹799</span>
                    </div>
                    <p class="text-xs text-gray-500">Deep Hydration Serum</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 4: Serum -->
        <div class="product-item group cursor-pointer" data-category="serum">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-orange-50 transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                        Best Seller
                    </span>
                    <img src="{{ asset('storage/assets/images/36.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Face Serum">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Face Serum</h3>
                        <span class="font-semibold text-gray-900">₹480</span>
                    </div>
                    <p class="text-xs text-gray-500">Brightening & Anti-Pigmentation</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-orange-400"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 5: Body Wash -->
        <div class="product-item group cursor-pointer" data-category="bodywash">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-rose-50 transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                    <img src="{{ asset('storage/assets/images/70.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Bodywash">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Bodywash</h3>
                        <span class="font-semibold text-gray-900">₹420</span>
                    </div>
                    <p class="text-xs text-gray-500">Oil-Free Matte Moisturizer</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-red-300"></div>
                        <div class="w-3 h-3 rounded-full bg-pink-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 6: Conditioner -->
        <div class="product-item group cursor-pointer" data-category="conditioner">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                    <img src="{{ asset('storage/assets/images/49.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Conditioner">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Conditioner</h3>
                        <span class="font-semibold text-gray-900">₹330</span>
                    </div>
                    <p class="text-xs text-gray-500">Deep Hydration Serum</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 7: Face Wash -->
        <div class="product-item group cursor-pointer" data-category="facewash">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                    <img src="{{ asset('storage/assets/images/54.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Facewash">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Facewash</h3>
                        <span class="font-semibold text-gray-900">₹299</span>
                    </div>
                    <p class="text-xs text-gray-500">Deep Hydration Serum</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-blue-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 8: Soap -->
        <div class="product-item group cursor-pointer" data-category="soaps">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-green-50 transition-all duration-300 hover:shadow-2xl hover:shadow-green-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">Trending</span>
                    <img src="{{ asset('storage/assets/images/69.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-contain p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Cleansing & Moisturizing Soap">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Cleansing & Moisturizing Soap</h3>
                        <span class="font-semibold text-gray-900">₹135</span>
                    </div>
                    <p class="text-xs text-gray-500">Soothing Repair Sleep Mask</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-green-300"></div>
                        <div class="w-3 h-3 rounded-full bg-teal-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 9: Soap -->
        <div class="product-item group cursor-pointer" data-category="soaps">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-purple-50 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-100">
                    <img src="{{ asset('storage/assets/images/68.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Brightening Soap">
                    <button class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                    </button>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500">Brightening Soap</h3>
                        <span class="font-semibold text-gray-900">₹135</span>
                    </div>
                    <p class="text-xs text-gray-500">Antioxidant Brightening</p>
                    <div class="flex gap-1 pt-1">
                        <div class="w-3 h-3 rounded-full bg-orange-300"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product 10: SUNSCREEN - NEW PRODUCT -->
        <div class="product-item group cursor-pointer" data-category="sunscreen">
            <a href="#">
                <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] bg-blue-50 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                    <span class="absolute top-4 left-4 z-20 rounded-full bg-white/90 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900">
                        SPF 50++
                    </span>
                    <img src="{{ asset('storage/assets/images/73.png') }}"
                         class="absolute inset-0 z-10 h-full w-full object-cover p-8 transition-transform duration-700 group-hover:scale-110"
                         alt="Dr. Kinjal Sunscreen SPF 50++">
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
                        <div class="w-3 h-3 rounded-full bg-white border border-gray-300"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="mt-16 text-center">
        <a href="{{ route('customer.products.list') }}" class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-8 py-4 font-semibold text-white shadow-lg shadow-rose-200 hover:bg-rose-600 hover:scale-105 transition-all">
            View All Products
            <i data-lucide="arrow-right" class="h-4 w-4"></i>
        </a>
    </div>
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        // Get current URL path to determine active category
        const currentPath = window.location.pathname;
        const categorySlug = currentPath.split('/').pop();
        
        // Define all valid categories
        const categories = ['all', 'serum', 'facewash', 'moisturizer', 'sunscreen', 'shampoo', 'conditioner', 'bodywash', 'soaps'];
        
        // Determine current category from URL
        let currentCategory = 'all';
        if (categories.includes(categorySlug)) {
            currentCategory = categorySlug;
        }
        
        // Set active tab based on current category
        document.querySelectorAll('.category-tab').forEach(tab => {
            const href = tab.getAttribute('href');
            const tabCategory = href.includes('/category/') ? href.split('/').pop() : 'all';
            
            if (tabCategory === currentCategory) {
                // Remove existing classes
                tab.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
                
                // Add appropriate active classes based on category
                if (currentCategory === 'all') {
                    tab.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                } else if (currentCategory === 'serum') {
                    tab.classList.add('bg-purple-100', 'text-purple-900', 'border-purple-200', 'active');
                } else if (currentCategory === 'facewash') {
                    tab.classList.add('bg-rose-100', 'text-rose-900', 'border-rose-200', 'active');
                } else if (currentCategory === 'moisturizer') {
                    tab.classList.add('bg-sky-100', 'text-sky-900', 'border-sky-200', 'active');
                } else if (currentCategory === 'sunscreen') {
                    tab.classList.add('bg-blue-100', 'text-blue-900', 'border-blue-200', 'active');
                } else if (currentCategory === 'shampoo') {
                    tab.classList.add('bg-emerald-100', 'text-emerald-900', 'border-emerald-200', 'active');
                } else if (currentCategory === 'conditioner') {
                    tab.classList.add('bg-amber-100', 'text-amber-900', 'border-amber-200', 'active');
                } else if (currentCategory === 'bodywash') {
                    tab.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                } else if (currentCategory === 'soaps') {
                    tab.classList.add('bg-yellow-100', 'text-yellow-900', 'border-yellow-200', 'active');
                }
            }
        });
        
        // Update title and description
        const titleElement = document.getElementById('category-title');
        const descElement = document.getElementById('category-description');
        
        if (currentCategory === 'all') {
            titleElement.textContent = 'All Products';
            descElement.textContent = 'Showing all products';
        } else {
            titleElement.textContent = currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1) + ' Products';
            descElement.textContent = 'Showing ' + currentCategory + ' products';
        }
        
        // Filter products based on selected category
        const productItems = document.querySelectorAll('.product-item');
        
        // Initially show all products
        productItems.forEach(item => {
            item.style.display = 'block';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
        
        // If a specific category is selected, filter products
        if (currentCategory !== 'all') {
            filterProducts(currentCategory);
        }
        
        // Add click handlers to category tabs for client-side filtering
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.addEventListener('click', function(e) {
                // Get category from href
                const href = this.getAttribute('href');
                const category = href.includes('/category/') ? href.split('/').pop() : 'all';
                
                // Update URL without page reload
                if (category === 'all') {
                    window.history.pushState({}, '', '{{ route("customer.products.list") }}');
                } else {
                    window.history.pushState({}, '', '/category/' + category);
                }
                
                // Filter products
                filterProducts(category);
                
                // Update active state
                document.querySelectorAll('.category-tab').forEach(t => {
                    // Remove all active classes
                    t.classList.remove('active', 'bg-teal-100', 'text-teal-900', 'border-teal-200');
                    t.classList.remove('bg-purple-100', 'text-purple-900', 'border-purple-200');
                    t.classList.remove('bg-rose-100', 'text-rose-900', 'border-rose-200');
                    t.classList.remove('bg-sky-100', 'text-sky-900', 'border-sky-200');
                    t.classList.remove('bg-blue-100', 'text-blue-900', 'border-blue-200');
                    t.classList.remove('bg-emerald-100', 'text-emerald-900', 'border-emerald-200');
                    t.classList.remove('bg-amber-100', 'text-amber-900', 'border-amber-200');
                    t.classList.remove('bg-yellow-100', 'text-yellow-900', 'border-yellow-200');
                    t.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
                });
                
                // Add appropriate color for active tab
                if (category === 'all') {
                    this.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                } else if (category === 'serum') {
                    this.classList.add('bg-purple-100', 'text-purple-900', 'border-purple-200', 'active');
                } else if (category === 'facewash') {
                    this.classList.add('bg-rose-100', 'text-rose-900', 'border-rose-200', 'active');
                } else if (category === 'moisturizer') {
                    this.classList.add('bg-sky-100', 'text-sky-900', 'border-sky-200', 'active');
                } else if (category === 'sunscreen') {
                    this.classList.add('bg-blue-100', 'text-blue-900', 'border-blue-200', 'active');
                } else if (category === 'shampoo') {
                    this.classList.add('bg-emerald-100', 'text-emerald-900', 'border-emerald-200', 'active');
                } else if (category === 'conditioner') {
                    this.classList.add('bg-amber-100', 'text-amber-900', 'border-amber-200', 'active');
                } else if (category === 'bodywash') {
                    this.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                } else if (category === 'soaps') {
                    this.classList.add('bg-yellow-100', 'text-yellow-900', 'border-yellow-200', 'active');
                }
                
                // Update page title and description
                if (category === 'all') {
                    titleElement.textContent = 'All Products';
                    descElement.textContent = 'Showing all products';
                } else {
                    titleElement.textContent = category.charAt(0).toUpperCase() + category.slice(1) + ' Products';
                    descElement.textContent = 'Showing ' + category + ' products';
                }
                
                // Prevent default navigation for client-side filtering
                e.preventDefault();
            });
        });
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const currentPath = window.location.pathname;
            const categorySlug = currentPath.split('/').pop();
            const category = categories.includes(categorySlug) ? categorySlug : 'all';
            
            filterProducts(category);
            
            // Update active tab
            document.querySelectorAll('.category-tab').forEach(tab => {
                const href = tab.getAttribute('href');
                const tabCategory = href.includes('/category/') ? href.split('/').pop() : 'all';
                
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
                
                if (tabCategory === category) {
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
            if (category === 'all') {
                titleElement.textContent = 'All Products';
                descElement.textContent = 'Showing all products';
            } else {
                titleElement.textContent = category.charAt(0).toUpperCase() + category.slice(1) + ' Products';
                descElement.textContent = 'Showing ' + category + ' products';
            }
        });
    });
    
    function filterProducts(category) {
        const productItems = document.querySelectorAll('.product-item');
        
        // Filter products
        productItems.forEach(item => {
            const itemCategory = item.dataset.category;
            
            if (category === 'all' || itemCategory === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    if (item.style.opacity === '0') {
                        item.style.display = 'none';
                    }
                }, 300);
            }
        });
    }
</script>
@endpush