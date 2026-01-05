@extends('customer.layouts.master')

@section('title', 'Bestsellers - Dr Kinjal Beauty')
@section('description', 'Our most-loved products, clinically proven to boost your confidence with healthy glowing skin.')
@section('keywords', 'bestsellers, skincare, beauty, top products')

@section('styles')
<style>
    /* Card tilt effect */
    .card-tilt {
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .card-tilt:hover {
        transform: rotateY(10deg) rotateX(5deg) scale(1.02);
    }

    /* Mobile: Always show quick-add buttons */
    @media (max-width: 768px) {
        .quick-add-btn {
            transform: translateY(0) !important;
            opacity: 1 !important;
            visibility: visible !important;
        }

        /* Larger touch target for mobile */
        @media (max-width: 640px) {
            .quick-add-btn {
                width: 44px;
                height: 44px;
                bottom: 12px;
                right: 12px;
            }

            .quick-add-btn i {
                width: 20px;
                height: 20px;
            }
        }
    }

    /* Filter button active state */
    .filter-btn.active {
        background-color: #1f2937 !important;
        color: white !important;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-12 bg-gradient-to-b from-sky-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Hero Section -->
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <span class="text-cyan-500 font-bold uppercase tracking-wider text-xs mb-2 block">Customer Favorites</span>
            <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-stone-900 mb-4">Best Sellers</h1>
            <p class="text-stone-500 text-lg">
                Our most-loved products, clinically proven to boost your confidence with healthy glowing skin.
            </p>
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
                <a href="#">
                    <div class="relative bg-orange-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                        <!-- Badge -->
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                            Best Seller
                        </span>

                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/16.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="C-Glow Serum">

                        <!-- Quick Add -->
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="1">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                Brightening Face Wash
                            </h3>
                            <span class="font-semibold text-stone-900">₹399</span>
                        </div>
                        <p class="text-xs text-stone-500">Brightening &amp; Anti-Pigmentation</p>
                    </div>
                </a>
            </div>

            <!-- Product 2 -->
            <div class="product-card group cursor-pointer" data-category="moisturizers">
                <a href="#">
                    <div class="relative bg-rose-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                        <span class="absolute top-4 left-4 bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/23.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Watermelon Gel">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="2">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                 Moisturizer
                            </h3>
                            <span class="font-semibold text-stone-900">₹399</span>
                        </div>
                        <p class="text-xs text-stone-500">Oil-Free Matte Moisturizer</p>
                    </div>
                </a>
            </div>

            <!-- Product 3 -->
            <div class="product-card group cursor-pointer" data-category="serums">
                <a href="#">
                    <div class="relative bg-blue-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/31.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Hyaluronic Burst">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="3">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                3 in 1 Shampoo
                            </h3>
                            <span class="font-semibold text-stone-900">₹799</span>
                        </div>
                        <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                    </div>
                </a>
            </div>

            <!-- Product 4 -->
            <div class="product-card group cursor-pointer" data-category="serums">
                <a href="#">
                    <div class="relative bg-orange-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-orange-100">
                        <!-- Badge -->
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                            Best Seller
                        </span>

                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/36.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="C-Glow Serum">

                        <!-- Quick Add -->
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="4">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                Face Serum
                            </h3>
                            <span class="font-semibold text-stone-900">₹480</span>
                        </div>
                        <p class="text-xs text-stone-500">Brightening &amp; Anti-Pigmentation</p>
                    </div>
                </a>
            </div>

            <!-- Product 5 -->
            <div class="product-card group cursor-pointer" data-category="moisturizers">
                <a href="#">
                    <div class="relative bg-rose-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-rose-100">
                        <span class="absolute top-4 left-4 bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/70.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Watermelon Gel">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="5">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                Bodywash
                            </h3>
                            <span class="font-semibold text-stone-900">₹420</span>
                        </div>
                        <p class="text-xs text-stone-500">Oil-Free Matte Moisturizer</p>
                    </div>
                </a>
            </div>

            <!-- Product 6 -->
            <div class="product-card group cursor-pointer" data-category="serums">
                <a href="#">
                    <div class="relative bg-blue-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/49.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Hyaluronic Burst">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="6">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                 Conditioner
                            </h3>
                            <span class="font-semibold text-stone-900">₹330</span>
                        </div>
                        <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                    </div>
                </a>
            </div>

            <!-- Product 7 -->
            <div class="product-card group cursor-pointer" data-category="serums">
                <a href="#">
                    <div class="relative bg-blue-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100">
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/54.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Hyaluronic Burst">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="7">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                                 Facewash
                            </h3>
                            <span class="font-semibold text-stone-900">₹299</span>
                        </div>
                        <p class="text-xs text-stone-500">Deep Hydration Serum</p>
                    </div>
                </a>
            </div>

            <!-- Product 8 -->
            <div class="product-card group cursor-pointer" data-category="moisturizers">
                <a href="#">
                    <div class="relative bg-green-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-green-100">
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">Trending</span>
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/69.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Cica Night Mask">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="8">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                               Cleansing & Moisturizing Soap
                            </h3>
                            <span class="font-semibold text-stone-900">₹135</span>
                        </div>
                        <p class="text-xs text-stone-500">Soothing Repair Sleep Mask</p>
                    </div>
                </a>
            </div>

            <!-- Product 9 -->
            <div class="product-card group cursor-pointer" data-category="serums">
                <a href="#">
                    <div class="relative bg-purple-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-purple-100">
                        <!-- Local Image -->
                        <img src="{{ asset('assets/images/68.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Vitamin C Serum">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="9">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                               Skin Brightening Soap
                            </h3>
                            <span class="font-semibold text-stone-900">₹135</span>
                        </div>
                        <p class="text-xs text-stone-500">Antioxidant Brightening</p>
                    </div>
                </a>
            </div>

            <!-- Product 10 -->
            <div class="product-card group cursor-pointer" data-category="sunscreens">
                <a href="#">
                    <div class="relative bg-yellow-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-100">
                        <img src="{{ asset('assets/images/73.png') }}"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                            alt="Mineral Sunscreen">
                        <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                            data-product-id="10">
                            <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors">
                               Sunscreen SPF 50++
                            </h3>
                            <span class="font-semibold text-stone-900">₹398</span>
                        </div>
                        <p class="text-xs text-stone-500">SPF 50++ Broad Spectrum</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="{{ route('customer.products.list') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-cyan-600 text-white font-semibold rounded-full hover:bg-cyan-700 hover:scale-105 transition-all duration-300 shadow-lg shadow-cyan-200">
                View All Products <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Product filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const productCards = document.querySelectorAll('.product-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
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
        const quickAddButtons = document.querySelectorAll('.quick-add-btn');
        quickAddButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productId = this.getAttribute('data-product-id');
                const productCard = this.closest('.product-card');
                const productName = productCard.querySelector('h3').textContent;
                const productPrice = productCard.querySelector('span.font-semibold').textContent.replace('₹', '');
                const productImage = productCard.querySelector('img').src;

                // Add to cart using the global function from header
                if (typeof window.addItemToCart === 'function') {
                    window.addItemToCart(productId, productName, productPrice, productImage);
                }

                // Visual feedback
                const originalHTML = this.innerHTML;
                const originalBg = this.style.backgroundColor;
                const originalColor = this.style.color;
                
                this.innerHTML = '<i data-lucide="check" class="w-5 h-5"></i>';
                this.style.backgroundColor = '#10b981';
                this.style.color = 'white';

                // Show notification
                if (typeof window.showNotification === 'function') {
                    window.showNotification(`${productName} added to cart!`, 'success');
                }

                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.style.backgroundColor = originalBg;
                    this.style.color = originalColor;
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                }, 1000);
            });
        });

        // Tilt effect for product cards
        const productCardsTilt = document.querySelectorAll('.card-tilt');
        productCardsTilt.forEach(card => {
            card.addEventListener('mousemove', handleTilt);
            card.addEventListener('mouseleave', resetTilt);
        });

        function handleTilt(e) {
            const card = e.currentTarget;
            const cardWidth = card.offsetWidth;
            const cardHeight = card.offsetHeight;
            const centerX = card.offsetLeft + cardWidth / 2;
            const centerY = card.offsetTop + cardHeight / 2;
            const mouseX = e.clientX - centerX;
            const mouseY = e.clientY - centerY;
            
            const rotateX = (mouseY / cardHeight) * 10;
            const rotateY = -(mouseX / cardWidth) * 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
        }

        function resetTilt(e) {
            const card = e.currentTarget;
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        }
    });
</script>
@endsection