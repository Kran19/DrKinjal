@extends('customer.layouts.master')

@section('title', 'Dr Kinjal Beauty - Premium Skincare Products')
@section('description', 'Discover clinically effective, result-oriented skincare products. Natural, clean formulas for radiant skin.')

@section('content')
    <!-- Hero Section -->
<header class="relative overflow-hidden">
    <!-- Background Blobs -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-cyan-100/50 rounded-full blur-3xl -z-10 translate-x-1/3 -translate-y-1/4 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-teal-100/50 rounded-full blur-3xl -z-10 -translate-x-1/3 translate-y-1/4"></div>

    <!-- Full Width Swiper Container - FIXED HEIGHT -->
    <div class="swiper heroSwiper w-full object-cover">
        <!-- Swiper's Required Wrapper -->
        <div class="swiper-wrapper object-cover">
            <!-- Slide 1: Main Product -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 1.png') }}"
                            alt="Skincare Product"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/20 md:to-transparent"></div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Fresh Ingredients -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 2.png') }}"
                            alt="Fresh Fruits"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Glow Results -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 3.png') }}"
                            alt="3"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 4 -->
            <!-- <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    
                    <div class="absolute inset-0 z-0">
                        <img src="assets\images\slide 4.png"
                            alt="4"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div> -->
            
            <!-- Slide 5 -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 5.png') }}"
                            alt="5"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 6 -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 6.png') }}"
                            alt="6"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 7 -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 7.png') }}"
                            alt="7"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 8 -->
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    
                    <div class="absolute inset-0 z-0">
                        <img src= "{{ asset('storage/assets/images/slide 8.png') }}"
                            alt="8"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 9 -->
            <!-- <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                   
                    <div class="absolute inset-0 z-0">
                        <img src="assets\images\slide 9.png"
                            alt="9"
                            class="w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 md:to-transparent"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</header>
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroSwiper = new Swiper('.heroSwiper', {
        direction: 'horizontal',
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        navigation: false,
        pagination: false,
        breakpoints: {
            320: {
                spaceBetween: 0,
            },
            768: {
                spaceBetween: 0,
            },
            1024: {
                spaceBetween: 0,
            }
        }
    });
    
    // No need for height adjustment since we're using fixed heights
});
</script>
@endpush


    <!-- Marquee/USP -->
    <div class="bg-cyan-600 text-white overflow-hidden py-4">
        <div class="flex whitespace-nowrap gap-12 animate-[scroll_20s_linear_infinite] items-center text-sm font-bold tracking-widest uppercase">
            <span>✨ Free Shipping on orders above ₹499</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>🌿 Clean Formulas</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>♻️ Recyclable Packaging</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>💸 5% OFF on Orders above ₹999</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <!-- Repeat for smooth infinite scroll -->
            <span>✨ Free Shipping on orders above ₹499</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>🌿 Clean Formulas</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>♻️ Recyclable Packaging</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>💸 5% OFF on Orders above ₹999</span>
        </div>
    </div>

    <!-- Categories Section -->
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
                <div id="categories-container" class="flex gap-4 overflow-x-auto pb-8 scrollbar-hide snap-x -mx-6 px-6 md:mx-0 md:px-0">
                    <!-- Soaps -->
                    <a href="{{ route('customer.category.products', ['slug' => 'soaps']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-rose-50 to-rose-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Soaps</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/62.png') }}"
                            class="absolute bottom-0 right-0 w-24 h-31 object-contain rotate-[-10deg] group-hover:rotate-0 transition-transform duration-500"
                            alt="Soaps">
                    </a>

                    <!-- Serum -->
                    <a href="{{ route('customer.category.products', ['slug' => 'serum']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-purple-50 to-purple-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Serum</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/40.png') }}"
                            class="absolute bottom-0 right-0 w-20 h-30 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                            alt="Serum">
                    </a>

                    <!-- Moisturizer -->
                    <a href="{{ route('customer.category.products', ['slug' => 'moisturizer']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-orange-50 to-orange-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Moisturizer</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/23.png') }}"
                            class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] translate-x-2 group-hover:scale-105 transition-transform duration-500"
                            alt="Moisturizer">
                    </a>

                    <!-- Shampoo -->
                    <a href="{{ route('customer.category.products', ['slug' => 'shampoo']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-sky-50 to-sky-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Shampoo</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/30.png') }}"
                            class="absolute bottom-0 right-0 w-20 h-30 object-contain rotate-[-10deg] group-hover:scale-105 transition-transform duration-500"
                            alt="Shampoo">
                    </a>

                    <!-- Conditioner -->
                    <a href="{{ route('customer.category.products', ['slug' => 'conditioner']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-teal-50 to-teal-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Conditioner</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/49.png') }}"
                            class="absolute bottom-0 right-0 w-22 h-24 object-contain rotate-[-10deg] group-hover:scale-105 transition-transform duration-500"
                            alt="Conditioner">
                    </a>

                    <!-- Face Wash -->
                    <a href="{{ route('customer.category.products', ['slug' => 'facewash']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-lime-50 to-lime-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Face Wash</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/6.png') }}"
                            class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] translate-x-2 group-hover:scale-105 transition-transform duration-500"
                            alt="Face Wash">
                    </a>

                    <!-- Sunscreen -->
                    <a href="{{ route('customer.category.products', ['slug' => 'sunscreen']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-amber-50 to-amber-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Sunscreen</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/72.png') }}"
                            class="absolute bottom-0 right-0 w-25 h-24 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                            alt="Sunscreen">
                    </a>

                    <!-- Bodywash -->
                    <a href="{{ route('customer.category.products', ['slug' => 'bodywash']) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br from-yellow-50 to-yellow-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">Bodywash</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset('storage/assets/images/46.png') }}"
                            class="absolute bottom-0 right-0 w-25 h-24 object-contain rotate-[-10deg] group-hover:scale-110 transition-transform duration-500"
                            alt="Bodywash">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section -->
    <section class="py-12 bg-white" id="bestsellers">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <span class="text-cyan-500 font-bold uppercase tracking-wider text-xs mb-2 block">Customer Favorites</span>
                <h2 class="text-4xl font-bold tracking-tight text-stone-900 mb-4">Picked For You</h2>
                <p class="text-stone-500">GET RID OF YOUR CONCERNS WITH CLINICALLY PROVEN INGREDIENTS</p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center gap-4 mb-12 flex-wrap">
                <button class="px-6 py-2 rounded-full bg-stone-900 text-white font-medium text-sm shadow-lg shadow-stone-200 filter-btn active"
                        data-filter="all">All Stars</button>
                <button class="px-6 py-2 rounded-full bg-white border border-stone-200 text-stone-600 font-medium text-sm hover:border-rose-300 hover:text-rose-500 transition-colors filter-btn"
                        data-filter="moisturizers">Moisturizers</button>
                <button class="px-6 py-2 rounded-full bg-white border border-stone-200 text-stone-600 font-medium text-sm hover:border-rose-300 hover:text-rose-500 transition-colors filter-btn"
                        data-filter="serums">Serums</button>
                <button class="px-6 py-2 rounded-full bg-white border border-stone-200 text-stone-600 font-medium text-sm hover:border-rose-300 hover:text-rose-500 transition-colors filter-btn"
                        data-filter="sunscreens">Sunscreens</button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8" id="product-grid">
                <!-- Product 1 -->
                <div class="product-card group cursor-pointer" data-category="serums">
                    <a href="{{ route('customer.products.details', ['slug' => 'brightening-face-wash']) }}">
                        <div class="relative bg-orange-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                            <!-- Badge -->
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">Best Seller</span>

                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/16.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Brightening Face Wash">

                            <!-- Quick Add -->
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="1"
                                    data-product-name="Brightening Face Wash"
                                    data-product-price="399"
                                    data-product-image="{{ asset('assets/images/16.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    Brightening Face Wash</h3>
                                <span class="font-semibold text-stone-900">₹399</span>
                            </div>
                            <p class="text-xs text-stone-500">Brightening & Anti-Pigmentation</p>
                        </div>
                    </a>
                </div>

                <!-- Product 2 -->
                <div class="product-card group cursor-pointer" data-category="serums">
                    <a href="{{ route('customer.products.details', ['slug' => '3-in-1-shampoo']) }}">
                        <div class="relative bg-blue-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/31.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="3 in 1 Shampoo">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="3"
                                    data-product-name="3 in 1 Shampoo"
                                    data-product-price="799"
                                    data-product-image="{{ asset('assets/images/31.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    3 in 1 Shampoo</h3>
                                <span class="font-semibold text-stone-900">₹799</span>
                            </div>
                            <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                        </div>
                    </a>
                </div>

                <!-- Product 3 -->
                <div class="product-card group cursor-pointer" data-category="serums">
                    <a href="{{ route('customer.products.details', ['slug' => 'face-serum']) }}">
                        <div class="relative bg-orange-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                            <!-- Badge -->
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">Best Seller</span>

                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/36.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Face Serum">

                            <!-- Quick Add -->
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="4"
                                    data-product-name="Face Serum"
                                    data-product-price="480"
                                    data-product-image="{{ asset('assets/images/36.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    Face Serum</h3>
                                <span class="font-semibold text-stone-900">₹480</span>
                            </div>
                            <p class="text-xs text-stone-500">Brightening & Anti-Pigmentation</p>
                        </div>
                    </a>
                </div>

                <!-- Product 4 -->
                <div class="product-card group cursor-pointer" data-category="moisturizers">
                    <a href="{{ route('customer.products.details', ['slug' => 'bodywash']) }}">
                        <div class="relative bg-rose-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                            <span class="absolute top-4 left-4 bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/70.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Bodywash">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="5"
                                    data-product-name="Bodywash"
                                    data-product-price="420"
                                    data-product-image="{{ asset('assets/images/70.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    Bodywash</h3>
                                <span class="font-semibold text-stone-900">₹420</span>
                            </div>
                            <p class="text-xs text-stone-500">Oil-Free Matte Moisturizer</p>
                        </div>
                    </a>
                </div>

                <!-- Product 5 -->
                <div class="product-card group cursor-pointer" data-category="serums">
                    <a href="{{ route('customer.products.details', ['slug' => 'facewash']) }}">
                        <div class="relative bg-blue-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/54.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Facewash">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="7"
                                    data-product-name="Facewash"
                                    data-product-price="299"
                                    data-product-image="{{ asset('assets/images/54.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    Facewash</h3>
                                <span class="font-semibold text-stone-900">₹299</span>
                            </div>
                            <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                        </div>
                    </a>
                </div>

                <!-- Product 6 -->
                <div class="product-card group cursor-pointer" data-category="sunscreens">
                    <a href="{{ route('customer.products.details', ['slug' => 'sunscreen-spf-50']) }}">
                        <div class="relative bg-yellow-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-100">
                            <!-- Image -->
                            <img src="{{ asset('storage/assets/images/73.png') }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="Sunscreen SPF 50">
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    data-product-id="10"
                                    data-product-name="Sunscreen SPF 50++"
                                    data-product-price="398"
                                    data-product-image="{{ asset('assets/images/73.png') }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                    Sunscreen SPF 50++</h3>
                                <span class="font-semibold text-stone-900">₹398</span>
                            </div>
                            <p class="text-xs text-stone-500">SPF 50++ Broad Spectrum</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('customer.products.list') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-cyan-600 text-white font-semibold rounded-full hover:bg-cyan-700 hover:scale-105 transition-all duration-300 shadow-lg shadow-cyan-200">
                    View All Products <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Categories / Concerns -->
    <section class="py-24" id="concerns">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-stone-900 mb-2">Shop by Concern</h2>
                    <p class="text-stone-500">Targeted solutions for your skin goals.</p>
                </div>
                <a href="{{ route('customer.products.search') }}?concern=all"
                    class="hidden md:flex items-center gap-2 text-rose-500 font-semibold hover:gap-3 transition-all">
                    View All <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Concern 1 - Dullness & Dark Spots -->
                <a href="{{ route('customer.products.search') }}?concern=dullness-dark-spots"
                    class="group relative overflow-hidden aspect-[4/5] bg-orange-50 hover:bg-orange-100 transition-colors">
                    <div class="absolute inset-0 p-6 flex flex-col justify-between z-10">
                        <h3 class="text-xl font-bold tracking-tight text-stone-900">Dullness &amp;<br>Dark Spots</h3>
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                            <i data-lucide="arrow-up-right" class="w-5 h-5 text-stone-900 stroke-[1.5]"></i>
                        </div>
                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1682096423780-41ca1b04af68?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8c2tpbiUyMGNhcmV8ZW58MHx8MHx8fDA%3D"
                        class="absolute bottom-0 right-0 w-3/4 object-contain translate-x-4 translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"
                        alt="Vitamin C">
                </a>
                
                <!-- Concern 2 - Dryness & Dehydration -->
                <a href="{{ route('customer.products.search') }}?concern=dryness-dehydration"
                    class="group relative overflow-hidden aspect-[4/5] bg-blue-50 hover:bg-blue-100 transition-colors">
                    <div class="absolute inset-0 p-6 flex flex-col justify-between z-10">
                        <h3 class="text-xl font-bold tracking-tight text-stone-900">Dryness &amp;<br>Dehydration</h3>
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                            <i data-lucide="arrow-up-right" class="w-5 h-5 text-stone-900 stroke-[1.5]"></i>
                        </div>
                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1679760653272-516d42f1fd83?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8c2tpbiUyMGRyeW5lc3N8ZW58MHx8MHx8fDA%3D"
                        class="absolute bottom-0 right-0 w-3/4 object-contain translate-x-4 translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"
                        alt="Hydration">
                </a>
                
                <!-- Concern 3 - Acne & Breakouts -->
                <a href="{{ route('customer.products.search') }}?concern=acne-breakouts"
                    class="group relative overflow-hidden aspect-[4/5] bg-green-50 hover:bg-green-100 transition-colors">
                    <div class="absolute inset-0 p-6 flex flex-col justify-between z-10">
                        <h3 class="text-xl font-bold tracking-tight text-stone-900">Acne &amp;<br>Breakouts</h3>
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                            <i data-lucide="arrow-up-right" class="w-5 h-5 text-stone-900 stroke-[1.5]"></i>
                        </div>
                    </div>
                    <img src="https://media.istockphoto.com/id/1142670146/photo/young-woman-looking-her-acne-scars-on-the-mirror.jpg?s=612x612&w=0&k=20&c=EdSdTEy9zbTOLDwCiSn7MtS3OT3NYijNJ72wuh7He3c="
                        class="absolute bottom-0 right-0 w-3/4 object-contain translate-x-4 translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"
                        alt="Acne">
                </a>
                
                <!-- Concern 4 - Hair & Care -->
                <a href="{{ route('customer.products.search') }}?concern=hair-care"
                    class="group relative overflow-hidden aspect-[4/5] bg-rose-50 hover:bg-rose-100 transition-colors">
                    <div class="absolute inset-0 p-6 flex flex-col justify-between z-10">
                        <h3 class="text-xl font-bold tracking-tight text-stone-900">Hair <br>Care</h3>
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                            <i data-lucide="arrow-up-right" class="w-5 h-5 text-stone-900 stroke-[1.5]"></i>
                        </div>
                    </div>
                    <img src="https://media.istockphoto.com/id/1345846432/photo/young-woman-hair-care-stock-photo.webp?a=1&b=1&s=612x612&w=0&k=20&c=Il_0BnTuMrPD1Zy6aPRFfDOMavOtJJApjZq0LZP1Q70="
                        class="absolute bottom-0 right-0 w-3/4 object-contain translate-x-4 translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"
                        alt="Anti Aging">
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-stone-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 mb-12 flex justify-between items-end">
            <h2 class="text-3xl font-bold tracking-tight text-stone-900">Reviews</h2>
            <div class="flex gap-2">
                <button class="testimonial-prev w-10 h-10 rounded-full border border-stone-200 bg-white flex items-center justify-center hover:bg-stone-900 hover:text-white transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 stroke-[1.5]"></i>
                </button>
                <button class="testimonial-next w-10 h-10 rounded-full border border-stone-200 bg-white flex items-center justify-center hover:bg-stone-900 hover:text-white transition-colors">
                    <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
                </button>
            </div>
        </div>

        <div class="testimonial-container flex gap-6 overflow-x-auto px-6 scrollbar-hide pb-10 max-w-7xl mx-auto">
            <!-- Review 1 -->
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <div class="flex gap-1 text-yellow-400 mb-4">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                </div>
                <p class="text-stone-600 mb-6 italic">
                    "Best clinic I have ever been to. The staff is polite, the Doctor is really knowledgeable and gives real advice. We are very satisfied with experience."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1622049605334-72e1e4432346?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8aW5kaWFuJTIwZ2lybHxlbnwwfHwwfHx8MA%3D%3D"
                             class="w-full h-full object-cover" alt="Bhavya Patel">
                    </div>
                    <div>
                        <h5 class="font-bold text-sm">Vaishali Maradia</h5>
                        <p class="text-xs text-stone-400">Verified Buyer · Surat</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <div class="flex gap-1 text-yellow-400 mb-4">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                </div>
                <p class="text-stone-600 mb-6 italic">
                    "I had a great exprience of microbalding. Doctors have a great expreience staff is very humble. My eyebrows look really nice and dark now . I am very satisfied with service."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1706943262459-3ef6ce03305c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGluZGlhbiUyMGdpcmx8ZW58MHx8MHx8fDA%3D"
                             class="w-full h-full object-cover" alt="Riya Shah">
                    </div>
                    <div>
                        <h5 class="font-bold text-sm">Shalu Hinduja</h5>
                        <p class="text-xs text-stone-400">Verified Buyer · Ahmedabad</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <div class="flex gap-1 text-yellow-400 mb-4">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                </div>
                <p class="text-stone-600 mb-6 italic">
                    "Warm and welcoming atmosphere and very pleased with my daughter skin treatment. Had excellent result and happy with Dr Kinjal consultation."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="https://plus.unsplash.com/premium_photo-1691030254390-aa56b22e6a45?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8aW5kaWFuJTIwbWFufGVufDB8fDB8fHww"
                             class="w-full h-full object-cover" alt="Neel Desai">
                    </div>
                    <div>
                        <h5 class="font-bold text-sm">dharmesh dodia</h5>
                        <p class="text-xs text-stone-400">Verified Buyer · Vadodara</p>
                    </div>
                </div>
            </div>

            <!-- Review 4 -->
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <div class="flex gap-1 text-yellow-400 mb-4">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 fill-current"></i>
                </div>
                <p class="text-stone-600 mb-6 italic">
                    "good service for My face treatment about 1 year i realise a good thik for abha clinic. my experience are very good face no reaction no skin tone about a treatment because her treatment are very smoothly."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1706943262117-b35de4ba50b4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8aW5kaWFuJTIwZ2lybHxlbnwwfHwwfHx8MA%3D%3D"
                             class="w-full h-full object-cover" alt="Pooja Joshi">
                    </div>
                    <div>
                        <h5 class="font-bold text-sm">Hiral Patel</h5>
                        <p class="text-xs text-stone-400">Verified Buyer · Rajkot</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Hero Section Styles */
    .heroSwiper {
        height: 12rem !important;
    }

    @media (min-width: 768px) {
        .heroSwiper {
            height: 35rem !important;
        }
    }

    .swiper-slide .absolute.inset-0.z-0 img {
        object-position: center center !important;
        width: 100% !important;
        height: 100% !important;
    }

    .swiper-slide .absolute.inset-0.z-0 {
        background-color: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-slide .absolute.inset-0.bg-gradient-to-r {
        background: linear-gradient(to right, 
            rgba(0,0,0,0.4) 0%, 
            rgba(0,0,0,0.2) 30%, 
            transparent 70%) !important;
        z-index: 2;
    }

    @media (max-width: 768px) {
        .heroSwiper {
            height: 12rem !important;
        }
    }

    /* Animation Keyframes */
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(-6deg); }
        50% { transform: translateY(-10px) rotate(-6deg); }
    }

    @keyframes float-delay-1 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
    }

    @keyframes float-delay-2 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-12px) rotate(-5deg); }
    }

    /* Custom Classes */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .card-tilt {
        transform-style: preserve-3d;
        transform: perspective(1000px);
        transition: transform 0.3s ease;
    }

    .card-tilt:hover {
        transform: perspective(1000px) rotateY(10deg) rotateX(5deg) scale(1.02);
    }

    .floating-element {
        animation: float 3s ease-in-out infinite;
    }

    .floating-element-delay-1 {
        animation: float-delay-1 4s ease-in-out infinite 0.5s;
    }

    .floating-element-delay-2 {
        animation: float-delay-2 3.5s ease-in-out infinite 1s;
    }

    /* Mobile optimizations */
    @media (max-width: 768px) {
        .quick-add-btn {
            transform: translateY(0) !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    }

    @media (max-width: 640px) {
        .quick-add-btn {
            width: 44px;
            height: 44px;
            bottom: 12px;
            right: 12px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Hero Swiper
        const heroSwiper = new Swiper('.heroSwiper', {
            direction: 'horizontal',
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            navigation: false,
            pagination: false,
        });

        // Category scrolling
        window.scrollCategories = function(direction) {
            const container = document.getElementById('categories-container');
            const cardWidth = 176; // 160px + 16px gap
            const scrollAmount = cardWidth * 3 * direction;
            
            if (container) {
                container.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        // Testimonial slider
        const prevBtn = document.querySelector('.testimonial-prev');
        const nextBtn = document.querySelector('.testimonial-next');
        const testimonialContainer = document.querySelector('.testimonial-container');

        if (prevBtn && nextBtn && testimonialContainer) {
            prevBtn.addEventListener('click', () => {
                testimonialContainer.scrollBy({ left: -400, behavior: 'smooth' });
            });

            nextBtn.addEventListener('click', () => {
                testimonialContainer.scrollBy({ left: 400, behavior: 'smooth' });
            });
        }

        // Product filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const productCards = document.querySelectorAll('.product-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active state
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-stone-900', 'text-white');
                    btn.classList.add('bg-white', 'text-stone-600');
                });

                this.classList.add('active', 'bg-stone-900', 'text-white');
                this.classList.remove('bg-white', 'text-stone-600');

                // Filter products
                const filter = this.getAttribute('data-filter');
                productCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Quick add to cart functionality
        document.querySelectorAll('.quick-add-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productId = this.getAttribute('data-product-id');
                const productName = this.getAttribute('data-product-name');
                const productPrice = this.getAttribute('data-product-price');
                const productImage = this.getAttribute('data-product-image');

                // Add to cart using the global function
                if (typeof window.addItemToCart === 'function') {
                    window.addItemToCart(productId, productName, productPrice, productImage);
                }

                // Visual feedback
                const originalHTML = this.innerHTML;
                this.innerHTML = '<i data-lucide="check" class="w-5 h-5"></i>';
                this.style.backgroundColor = '#10b981';
                this.style.color = 'white';

                // Re-initialize icons
                lucide.createIcons();

                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.style.backgroundColor = '';
                    this.style.color = '';
                    lucide.createIcons();
                }, 1000);
            });
        });

        // Notification function
        window.showNotification = function(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-4 py-3 rounded-xl shadow-lg z-50 transform transition-all duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <i data-lucide="${type === 'success' ? 'check-circle' : type === 'error' ? 'alert-circle' : 'info'}" 
                       class="w-5 h-5"></i>
                    <span class="text-sm font-medium">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            lucide.createIcons();
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    if (notification.parentNode) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        };
    });
</script>
@endpush