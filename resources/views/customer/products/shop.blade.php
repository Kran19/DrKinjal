@extends('customer.layouts.master')

@section('title', 'Shop All Products')
@section('description', 'Browse our complete collection of skincare products including serums, moisturizers, facewash, sunscreen and more.')
@section('keywords', 'skincare, beauty products, shop, buy, serum, moisturizer, facewash')

@section('content')
<!-- Category Navigation Section -->
<section class="py-12 bg-white border-b border-stone-100">
    <div class="max-w-7xl mx-auto px-4 md:px-6 relative">
        <h2 class="text-2xl md:text-3xl font-bold text-stone-900 mb-8 tracking-tight">Need Help Choosing? Start Here!</h2>

        <!-- Navigation buttons (hidden on mobile, visible on md+) -->
        <button class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-20 w-10 h-10 rounded-full bg-white shadow-lg border border-stone-200 items-center justify-center hover:bg-stone-50 transition-colors duration-200"
                onclick="scrollCategories(-1)">
            <i data-lucide="chevron-left" class="w-5 h-5 text-stone-700"></i>
        </button>
        
        <button class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-20 w-10 h-10 rounded-full bg-white shadow-lg border border-stone-200 items-center justify-center hover:bg-stone-50 transition-colors duration-200"
                onclick="scrollCategories(1)">
            <i data-lucide="chevron-right" class="w-5 h-5 text-stone-700"></i>
        </button>

        <div class="relative">
            <div id="categories-container" class="flex gap-4 overflow-x-auto pb-8 no-scrollbar scrollbar-hide snap-x -mx-4 md:mx-0 px-4 md:px-0">
                @php
                    $categories = [
                        ['slug' => 'soaps', 'name' => 'Soaps', 'bg_from' => 'from-rose-50', 'bg_to' => 'to-rose-200', 'image' => 'storage/assets/images/62.png'],
                        ['slug' => 'serum', 'name' => 'Serum', 'bg_from' => 'from-purple-50', 'bg_to' => 'to-purple-200', 'image' => 'storage/assets/images/40.png'],
                        ['slug' => 'moisturizer', 'name' => 'Moisturizer', 'bg_from' => 'from-orange-50', 'bg_to' => 'to-orange-200', 'image' => 'storage/assets/images/23.png'],
                        ['slug' => 'shampoo', 'name' => 'Shampoo', 'bg_from' => 'from-sky-50', 'bg_to' => 'to-sky-200', 'image' => 'storage/assets/images/30.png'],
                        ['slug' => 'conditioner', 'name' => 'Conditioner', 'bg_from' => 'from-teal-50', 'bg_to' => 'to-teal-200', 'image' => 'storage/assets/images/50.png'],
                        ['slug' => 'facewash', 'name' => 'Face Wash', 'bg_from' => 'from-lime-50', 'bg_to' => 'to-lime-200', 'image' => 'storage/assets/images/6.png'],
                        ['slug' => 'sunscreen', 'name' => 'Sunscreen', 'bg_from' => 'from-amber-50', 'bg_to' => 'to-amber-200', 'image' => 'storage/assets/images/72.png'],
                        ['slug' => 'bodywash', 'name' => 'Bodywash', 'bg_from' => 'from-yellow-50', 'bg_to' => 'to-yellow-200', 'image' => 'storage/assets/images/46.png'],
                    ];
                @endphp

                @foreach ($categories as $category)
                    <a href="{{ route('customer.category.products', ['slug' => $category['slug']]) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br {{ $category['bg_from'] }} {{ $category['bg_to'] }} rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">{{ $category['name'] }}</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        <img src="{{ asset($category['image']) }}"
                            class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] group-hover:scale-105 transition-transform duration-500"
                            alt="{{ $category['name'] }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Product Grid Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900 tracking-tight">All Products</h2>
            
            <!-- Product Count and Filter (Optional) -->
            <div class="text-sm text-stone-600">
                <span id="product-count">12</span> Products
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6" id="product-grid">
            @php
                $products = [
                    [
                        'slug' => 'skin-brightening-face-wash',
                        'name' => 'Skin Brightening Face Wash',
                        'price' => '399',
                        'description' => 'Brightening & Anti-Pigmentation',
                        'image' => 'storage/assets/images/16.png',
                        'badge' => 'Best Seller',
                        'badge_color' => 'bg-white/90',
                        'bg_color' => 'bg-teal-50',
                        'shadow_color' => 'shadow-teal-100'
                    ],
                    [
                        'slug' => 'moisturizer',
                        'name' => 'Moisturizer',
                        'price' => '399',
                        'description' => 'Oil-Free Matte Moisturizer',
                        'image' => 'storage/assets/images/23.png',
                        'badge' => 'New',
                        'badge_color' => 'bg-brand-500 text-white',
                        'bg_color' => 'bg-cyan-50',
                        'shadow_color' => 'shadow-cyan-100'
                    ],
                    [
                        'slug' => '3-in-1-shampoo',
                        'name' => '3 in 1 Shampoo',
                        'price' => '799',
                        'description' => 'Deep Hydration Serum',
                        'image' => 'storage/assets/images/31.png',
                        'badge' => null,
                        'bg_color' => 'bg-sky-50',
                        'shadow_color' => 'shadow-sky-100'
                    ],
                    [
                        'slug' => 'face-serum',
                        'name' => 'Face Serum',
                        'price' => '480',
                        'description' => 'Brightening & Anti-Pigmentation',
                        'image' => 'storage/assets/images/36.png',
                        'badge' => 'Best Seller',
                        'badge_color' => 'bg-white/90',
                        'bg_color' => 'bg-teal-50',
                        'shadow_color' => 'shadow-teal-100'
                    ],
                    [
                        'slug' => 'bodywash',
                        'name' => 'Bodywash',
                        'price' => '420',
                        'description' => 'Oil-Free Matte Moisturizer',
                        'image' => 'storage/assets/images/70.png',
                        'badge' => 'New',
                        'badge_color' => 'bg-brand-500 text-white',
                        'bg_color' => 'bg-cyan-50',
                        'shadow_color' => 'shadow-cyan-100'
                    ],
                    [
                        'slug' => 'conditioner',
                        'name' => 'Conditioner',
                        'price' => '330',
                        'description' => 'Deep Hydration Serum',
                        'image' => 'storage/assets/images/49.png',
                        'badge' => null,
                        'bg_color' => 'bg-sky-50',
                        'shadow_color' => 'shadow-sky-100'
                    ],
                    [
                        'slug' => 'facewash',
                        'name' => 'Facewash',
                        'price' => '299',
                        'description' => 'Deep Hydration Serum',
                        'image' => 'storage/assets/images/54.png',
                        'badge' => null,
                        'bg_color' => 'bg-sky-50',
                        'shadow_color' => 'shadow-sky-100'
                    ],
                    [
                        'slug' => 'cleansing-moisturizing-soap',
                        'name' => 'Cleansing & Moisturizing Soap',
                        'price' => '135',
                        'description' => 'Soothing Repair Sleep Mask',
                        'image' => 'storage/assets/images/69.png',
                        'badge' => 'Trending',
                        'badge_color' => 'bg-white/90',
                        'bg_color' => 'bg-teal-50',
                        'shadow_color' => 'shadow-teal-100'
                    ],
                    [
                        'slug' => 'skin-brightening-soap',
                        'name' => 'Skin Brightening Soap',
                        'price' => '135',
                        'description' => 'Antioxidant Brightening',
                        'image' => 'storage/assets/images/68.png',
                        'badge' => null,
                        'bg_color' => 'bg-sky-50',
                        'shadow_color' => 'shadow-sky-100'
                    ],
                    [
                        'slug' => 'sunscreen-spf-50',
                        'name' => 'Sunscreen SPF 50++',
                        'price' => '398',
                        'description' => 'SPF 50++ Broad Spectrum',
                        'image' => 'storage/assets/images/73.png',
                        'badge' => null,
                        'bg_color' => 'bg-amber-50',
                        'shadow_color' => 'shadow-amber-100'
                    ],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="product-card group cursor-pointer">
                    <a href="{{ route('customer.products.details', ['slug' => $product['slug']]) }}">
                        <div class="relative {{ $product['bg_color'] }} rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:{{ $product['shadow_color'] }}">
                            @if ($product['badge'])
                                <span class="absolute top-4 left-4 {{ $product['badge_color'] }} backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                    {{ $product['badge'] }}
                                </span>
                            @endif
                            <img src="{{ asset($product['image']) }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="{{ $product['name'] }}" loading="lazy">
                            <button
                                class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                data-product-id="{{ $loop->iteration }}">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-brand-500 transition-colors">
                                    {{ $product['name'] }}
                                </h3>
                                <span class="font-semibold text-stone-900">₹{{ $product['price'] }}</span>
                            </div>
                            <p class="text-xs text-stone-500">{{ $product['description'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="{{ route('customer.products.bestsellers') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 md:px-8 md:py-4
                      bg-brand-500 text-white font-semibold rounded-full
                      hover:bg-brand-600 hover:scale-105
                      transition-all duration-300 shadow-lg shadow-brand-200">
                View Best Sellers
                <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    /* Product card tilt effect */
    .card-tilt {
        transform-style: preserve-3d;
        perspective: 1000px;
    }
    
    .card-tilt:hover {
        transform: translateZ(10px) rotateX(2deg) rotateY(2deg);
    }
</style>
@endpush

@push('scripts')
<script>
    // Categories horizontal scroll
    function scrollCategories(direction) {
        const container = document.getElementById('categories-container');
        const scrollAmount = 200;
        container.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }

    // Initialize Lucide icons
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        // Quick add to cart functionality
        document.querySelectorAll('.quick-add-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productId = this.getAttribute('data-product-id');
                
                // Show loading state
                const icon = this.querySelector('i');
                const originalIcon = icon.getAttribute('data-lucide');
                icon.setAttribute('data-lucide', 'loader');
                lucide.createIcons();
                
                // Simulate API call
                setTimeout(() => {
                    // Restore icon
                    icon.setAttribute('data-lucide', 'check');
                    lucide.createIcons();
                    
                    // Update cart count
                    updateCartCount(1);
                    
                    // Show success message
                    showToast('Product added to cart!', 'success');
                    
                    // Revert icon after 2 seconds
                    setTimeout(() => {
                        icon.setAttribute('data-lucide', originalIcon);
                        lucide.createIcons();
                    }, 2000);
                }, 800);
            });
        });
        
        // Product count update
        const productCount = document.querySelectorAll('.product-card').length;
        document.getElementById('product-count').textContent = productCount;
    });

    // Toast notification
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform translate-y-0 opacity-100 transition-all duration-300 ${
            type === 'success' ? 'bg-brand-500' : 'bg-red-500'
        }`;
        toast.textContent = message;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(-20px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Cart count update function
    function updateCartCount(change) {
        const cartCountElement = document.getElementById('cartCount');
        let currentCount = parseInt(cartCountElement.textContent) || 0;
        
        if (change) {
            currentCount += change;
        }
        
        cartCountElement.textContent = currentCount;
        
        if (currentCount > 0) {
            cartCountElement.classList.remove('hidden');
        } else {
            cartCountElement.classList.add('hidden');
        }
    }
</script>
@endpush