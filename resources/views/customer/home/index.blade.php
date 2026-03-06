@extends('customer.layouts.master')

@section('title', \App\Helpers\SettingsHelper::get('store_name', 'Dr Kinjal Beauty') . ' - Premium Skincare Products')
@section('description', \App\Helpers\SettingsHelper::get('meta_description', 'Discover clinically effective, result-oriented skincare products.'))

@section('content')

    <!-- Preloader -->
    <div id="home-preloader" class="fixed inset-0 z-[9999] bg-white flex flex-col items-center justify-center transition-opacity duration-500">
        <div class="flex flex-col items-center animate-pulse">
            <img src="{{ asset('storage/assets/images/logo.png') }}" 
                 class="w-48 mb-2" 
                 alt="Dr.Kinjal Logo">
            <h1 class="text-2xl font-bold text-stone-800 tracking-wider">Dr.Kinjal</h1>
        </div>
    </div>
    <!-- Start Offer Banner Modal -->
    <div id="start-banner-modal" class="fixed inset-0 z-[10000] flex items-center justify-center p-4 sm:p-8" style="display:none!important;">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeStartBanner()"></div>

        <!-- Modal Card -->
        <!-- ✏️ ADJUST POPUP WIDTH HERE: change max-w-* values below -->
        <!-- max-w-xs=mobile | sm:max-w-md=tablet | lg:max-w-4xl=desktop -->
        <div id="banner-content"
             class="relative w-full max-w-xs sm:max-w-md lg:max-w-4xl rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 scale-90 opacity-0 bg-white">

            <!-- Banner image -->
            <!-- ✏️ ADJUST IMAGE HEIGHT: lg:aspect-video=16:9 | lg:aspect-[4/3]=taller | lg:aspect-[16/10]=medium -->
            <div id="banner-body" class="relative w-full aspect-[3/3.2] sm:aspect-video lg:aspect-video bg-stone-100 overflow-hidden">

                <!-- Spinner while loading -->
                <div id="banner-shimmer" class="absolute inset-0 flex items-center justify-center bg-stone-100">
                    <div class="w-10 h-10 rounded-full border-4 border-stone-200 border-t-stone-500 animate-spin"></div>
                </div>

                <!-- Close button on image top-right -->
                <button onclick="closeStartBanner()"
                        class="absolute top-3 right-3 z-30 w-8 h-8 flex items-center justify-center rounded-full bg-black/40 hover:bg-black/60 text-white transition-colors backdrop-blur-sm">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- Button bar below image -->
            <div id="banner-info" class="hidden py-4 px-5 bg-white flex justify-center border-t border-stone-100">
                <a id="banner-shop-link" href="/products"
                   onclick="closeStartBanner()"
                   class="inline-flex items-center gap-2 bg-stone-900 text-white font-bold text-sm px-8 py-2.5 rounded-full hover:bg-stone-700 active:scale-95 transition-all shadow-md w-full justify-center">
                    Shop Now
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>

@push('styles')
<style>
    /* Animations for hero section */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

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

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Hero element animations */
    .hero-text {
        animation: fadeInUp 0.8s ease-out 0.3s forwards;
    }

    .hero-image {
        animation: fadeInUp 0.8s ease-out 0.6s forwards;
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

    /* Scrollbar hiding for testimonials */
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Card tilt effect */
    .card-tilt {
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .card-tilt:hover {
        transform: rotateY(10deg) rotateX(5deg) scale(1.02);
    }

    /* Ensure hero is visible immediately on load */
    .hero-text,
    .hero-image {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }

    /* Make sure animations still work for other states */
    .floating-element,
    .floating-element-delay-1,
    .floating-element-delay-2,
    .card-tilt,
    .card-tilt:hover {
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }


    /* Touch target size for mobile */
    .swiper-button-next,
    .swiper-button-prev {
        width: 44px !important;
        height: 44px !important;
    }

    /* Prevent text overflow */
    .swiper-slide h1,
    .swiper-slide p {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Image loading optimization */
    .swiper-slide img {
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }


    /* Accessibility improvements */
    @media (prefers-reduced-motion: reduce) {
        .animate-float,
        .animate-bounce,
        .animate-scroll,
        .swiper-slide img {
            animation: none !important;
            transition: none !important;
        }
    }
</style>
@endpush

<!-- Hero Section - Fully Responsive -->
<header class="relative overflow-hidden bg-gradient-to-b from-stone-50 to-white">
    <!-- Mobile Background Pattern -->
    <div class="absolute inset-0 lg:hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-cyan-50/30 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-full h-1/3 bg-gradient-to-t from-rose-50/20 to-transparent"></div>
    </div>

    <!-- Full Width Swiper Container -->
    <div class="swiper heroSwiper w-full relative">
        <div class="swiper-wrapper">
            <!-- Slide 1: Main Product -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between h-full py-12 lg:py-20 gap-8 lg:gap-12">
                        
                        <!-- Text Content (Order 2 on Mobile, Order 1 on Desktop) -->
                        <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left order-2 lg:order-1">
                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-stone-900 leading-[1.1] mb-6">
                                <span class="block">Real Care Backed</span>
                                <span class="bg-clip-text text-transparent pb-1" style="background-image: linear-gradient(to right, #06b6d4, #0ea5e9);">
                                    By Medical Expertise.
                                </span>
                            </h1>
                            <p class="text-lg sm:text-xl text-stone-600 mb-8 leading-relaxed max-w-lg">
                                boost your confidence with healthy glowing skin clinically proven ingredients.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                                <a href="{{ route('customer.products.bestsellers') }}"
                                    class="px-8 py-4 text-white font-semibold rounded-full hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-cyan-200/50 text-center"
                                    style="background-image: linear-gradient(to right, #06b6d4, #0ea5e9);">
                                    Shop Bestsellers
                                </a>
                                <a href="{{ route('customer.page.concerns') }}"
                                    class="px-8 py-4 bg-white text-stone-900 font-semibold rounded-full border-2 border-stone-200 hover:border-cyan-300 hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-stone-100/50 text-center">
                                    Shop By Concern
                                </a>
                            </div>
                        </div>
                        
                        <!-- Image Content (Order 1 on Mobile, Order 2 on Desktop) -->
                        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end order-1 lg:order-2">
                            <div class="relative w-full max-w-md lg:max-w-xl aspect-square">
                                <div class="absolute inset-0 bg-gradient-to-tr from-cyan-100/50 to-transparent rounded-full filter blur-3xl opacity-70 animate-pulse"></div>
                                <div class="relative w-full h-full rounded-[2rem] overflow-hidden shadow-2xl shadow-cyan-200/50 transform hover:scale-105 transition-transform duration-500">
                                    <img src="{{ asset('storage/assets/images/70.png') }}"
                                        alt="Skincare Product"
                                        class="w-full h-full object-cover object-center">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Slide 2: Fresh Ingredients -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between h-full py-12 lg:py-20 gap-8 lg:gap-12">
                        
                        <!-- Text Content -->
                        <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left order-2 lg:order-1">

                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-stone-900 leading-[1.1] mb-6">
                                <span class="block">Price You Will Love</span>
                                <span class="bg-clip-text text-transparent pb-1" style="background-image: linear-gradient(to right, #f97316, #eab308);">
                                    Quality You Trust.
                                </span>
                            </h1>
                            <p class="text-lg sm:text-xl text-stone-600 mb-8 leading-relaxed max-w-lg">
                                Primium skincare made affordable, so expert care is accessible without Compromising on safety, Ingredients, or effectiveness.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                                <a href="{{ route('customer.page.ingredients') }}"
                                    class="px-8 py-4 text-white font-semibold rounded-full hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-orange-200/50 text-center"
                                    style="background-image: linear-gradient(to right, #f97316, #eab308);">
                                    Explore Ingredients
                                </a>
                                <a href="{{ route('customer.page.about') }}"
                                    class="px-8 py-4 bg-white text-stone-900 font-semibold rounded-full border-2 border-stone-200 hover:border-orange-300 hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-stone-100/50 text-center">
                                    Our Sustainability
                                </a>
                            </div>
                        </div>
                        
                        <!-- Image Content -->
                        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end order-1 lg:order-2">
                             <div class="relative w-full max-w-md lg:max-w-xl aspect-square">
                                <div class="absolute inset-0 bg-gradient-to-tr from-orange-100/50 to-transparent rounded-full filter blur-3xl opacity-70 animate-pulse"></div>
                                <div class="relative w-full h-full rounded-[2rem] overflow-hidden shadow-2xl shadow-orange-200/50 transform hover:scale-105 transition-transform duration-500">
                                    <img src="{{ asset('storage/assets/images/18.png') }}"
                                        alt="Fresh Fruits"
                                        class="w-full h-full object-cover object-center">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Slide 3: Glow Results -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between h-full py-12 lg:py-20 gap-8 lg:gap-12">
                        
                        <!-- Text Content -->
                        <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left order-2 lg:order-1">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 bg-white/95 backdrop-blur-sm border border-pink-100 rounded-full shadow-sm mb-6">
                                <span class="flex h-2 w-2 rounded-full bg-pink-500 animate-pulse"></span>
                                <span class="text-xs sm:text-sm font-semibold uppercase tracking-wide text-stone-600">Visible Results</span>
                            </div>
                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-stone-900 leading-[1.1] mb-6">
                                <span class="block">Reveal Your</span>
                                <span class="bg-clip-text text-transparent pb-1" style="background-image: linear-gradient(to right, #ec4899, #f43f5e);">
                                    Natural Glow
                                </span>
                            </h1>
                            <p class="text-lg sm:text-xl text-stone-600 mb-8 leading-relaxed max-w-lg">
                                94% of users see brighter, more radiant skin in just 2 weeks. Join thousands of glowing customers.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                                <a href="{{ route('customer.page.about') }}"
                                    class="px-8 py-4 text-white font-semibold rounded-full hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-pink-200/50 text-center"
                                    style="background-image: linear-gradient(to right, #ec4899, #f43f5e);">
                                    Our Story
                                </a>
                                <a href="{{ route('customer.page.concerns') }}"
                                    class="px-8 py-4 bg-white text-stone-900 font-semibold rounded-full border-2 border-stone-200 hover:border-pink-300 hover:scale-105 active:scale-95 transition-all duration-300 shadow-lg shadow-stone-100/50 text-center">
                                    Get Personalized Routine
                                </a>
                            </div>
                        </div>
                        
                        <!-- Image Content -->
                        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end order-1 lg:order-2">
                            <div class="relative w-full max-w-md lg:max-w-xl aspect-square">
                                <div class="absolute inset-0 bg-gradient-to-tr from-pink-100/50 to-transparent rounded-full filter blur-3xl opacity-70 animate-pulse"></div>
                                <div class="relative w-full h-full rounded-[2rem] overflow-hidden shadow-2xl shadow-pink-200/50 transform hover:scale-105 transition-transform duration-500">
                                    <img src="{{ asset('storage/assets/images/slide3newnew.png') }}"
                                        alt="Glowing Skin"
                                        class="w-full h-full object-cover object-center">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination !bottom-8"></div>
        
    </div>
</header>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const preloader = document.getElementById('home-preloader');
        if(preloader){
            window.addEventListener('load', function() {
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    setTimeout(() => {
                        preloader.remove();
                        checkStartBanner();
                    }, 500);
                }, 800); // Slight delay for branding visibility
            });
        }
    });

    async function checkStartBanner() {
        // Check if already shown in this session
        if (localStorage.getItem('offer_banner_shown')) {
            return;
        }

        try {
            const response = await fetch('/api/customer/offers/start-banner');
            const result = await response.json();

            if (result.success && result.data) {
                showStartBanner(result.data);
            }
        } catch (error) {
            console.error('Failed to fetch start banner:', error);
        }
    }

    function showStartBanner(bannerData) {
        const modal = document.getElementById('start-banner-modal');
        const content = document.getElementById('banner-content');
        const body = document.getElementById('banner-body');
        const shimmer = document.getElementById('banner-shimmer');
        const info = document.getElementById('banner-info');
        const nameEl = document.getElementById('banner-offer-name');
        const codeWrap = document.getElementById('banner-code-wrap');
        const codeText = document.getElementById('banner-code-text');
        const shopLink = document.getElementById('banner-shop-link');

        if (!modal || !content || !body) return;

        // Load image
        const img = new Image();
        img.onload = function() {
            // Replace shimmer with image
            if (shimmer) shimmer.remove();
            const imgEl = document.createElement('img');
            imgEl.src = bannerData.banner_url;
            imgEl.className = 'w-full h-full object-cover';
            imgEl.alt = bannerData.name || 'Offer Banner';
            body.appendChild(imgEl);

            // Populate info bar
            if (nameEl) nameEl.textContent = bannerData.name || '';
            if (bannerData.code && codeText && codeWrap) {
                codeText.textContent = bannerData.code;
                codeWrap.classList.remove('hidden');
            }
            if (shopLink) {
                shopLink.href = bannerData.banner_button_link || '/products';
                
                // Get the text node (first child) and update it
                const buttonText = bannerData.banner_button_text || 'Shop Now';
                const lucideIcon = shopLink.querySelector('i');
                shopLink.innerHTML = '';
                shopLink.appendChild(document.createTextNode(buttonText + ' '));
                if (lucideIcon) shopLink.appendChild(lucideIcon);
            }
            if (info) info.classList.remove('hidden');

            // Show modal
            modal.style.display = 'flex';
            setTimeout(() => {
                content.classList.remove('scale-90', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 20);

            // Mark as shown
            localStorage.setItem('offer_banner_shown', 'true');
            if (typeof lucide !== 'undefined') lucide.createIcons();
        };
        img.onerror = function() {
            // Even on error, show modal without image
            modal.style.display = 'flex';
            setTimeout(() => {
                content.classList.remove('scale-90', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 20);
            localStorage.setItem('offer_banner_shown', 'true');
        };
        img.src = bannerData.banner_url;
    }

    function closeStartBanner() {
        const modal = document.getElementById('start-banner-modal');
        const content = document.getElementById('banner-content');
        if (!modal || !content) return;

        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-90', 'opacity-0');

        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    function copyBannerCode() {
        const code = document.getElementById('banner-code-text')?.textContent;
        if (!code) return;
        navigator.clipboard.writeText(code).then(() => {
            const btn = document.getElementById('banner-code-btn');
            if (btn) {
                const orig = btn.innerHTML;
                btn.innerHTML = '<span class="text-emerald-400 font-bold">Copied!</span>';
                setTimeout(() => { btn.innerHTML = orig; if (typeof lucide !== 'undefined') lucide.createIcons(); }, 1800);
            }
        }).catch(() => {});
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroSwiper = new Swiper('.heroSwiper', {
        direction: 'horizontal',
        loop: true,
        speed: 600,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'slide',
        slidesPerView: 1,
        spaceBetween: 0,
        
        // Pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                const isMobile = window.innerWidth < 1024;
                const size = isMobile ? 'w-1.5 h-1.5' : 'w-2 h-2';
                return '<span class="' + className + ' ' + size + ' rounded-full bg-white/50 border border-white/30"></span>';
            },
        },
        
        on: {
            init: function () {
                // Initialize icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
                
                this.update();
                
                // Add active state to pagination
                const bullets = document.querySelectorAll('.swiper-pagination-bullet');
                if (bullets.length > 0) {
                    bullets[this.activeIndex].classList.add('swiper-pagination-bullet-active');
                }
            },
            slideChange: function () {
                // Update pagination active state
                const bullets = document.querySelectorAll('.swiper-pagination-bullet');
                bullets.forEach(bullet => bullet.classList.remove('swiper-pagination-bullet-active'));
                if (bullets.length > 0) {
                    bullets[this.activeIndex].classList.add('swiper-pagination-bullet-active');
                }
                
                // Add slide transition effect
                const activeSlide = this.slides[this.activeIndex];
                const images = activeSlide.querySelectorAll('img');
                images.forEach(img => {
                    img.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        img.style.transition = 'transform 0.6s ease';
                        img.style.transform = 'scale(1)';
                    }, 50);
                });
            }
        }
    });
    
    // Custom pagination active state styling
    const style = document.createElement('style');
    style.textContent = `
        /* Mobile pagination */
        @media (max-width: 1024px) {
            .swiper-pagination-bullet-active {
                width: 18px !important;
                border-radius: 9px !important;
                background: white !important;
                border-color: white !important;
            }
        }
        
        /* Desktop pagination */
        @media (min-width: 1024px) {
            .swiper-pagination-bullet-active {
                width: 24px !important;
                border-radius: 12px !important;
                background: white !important;
                border-color: white !important;
            }
        }
        
        /* Mobile animations */
        @keyframes scroll-indicator {
            0% { transform: translateY(0); opacity: 0.6; }
            50% { transform: translateY(4px); opacity: 1; }
            100% { transform: translateY(0); opacity: 0.6; }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .animate-scroll {
            animation: scroll-indicator 1.8s ease-in-out infinite;
        }
        
        .animate-bounce {
            animation: bounce 2s ease-in-out infinite;
        }
        
        /* Desktop floating animation */
        @keyframes float-element {
            0%, 100% { transform: translateY(0) rotate(12deg); }
            50% { transform: translateY(-10px) rotate(12deg); }
        }
        
        .animate-float {
            animation: float-element 3s ease-in-out infinite;
        }
        
        /* Mobile touch feedback */
        button:active, a:active {
            transform: scale(0.95) !important;
            transition: transform 0.1s ease !important;
        }
        
        /* Better mobile scrolling */
        .swiper-container {
            -webkit-overflow-scrolling: touch;
            touch-action: pan-y;
        }
        
        /* Fix image containment */
        .swiper-slide img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
    `;
    document.head.appendChild(style);
    

    
    // Adjust height on resize - REMOVED as we use CSS now
    // function adjustHeroHeight() { ... }
    
    // Adjust on window resize with debounce
    let resizeTimeout;
    /*
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(adjustHeroHeight, 150);
    });
    */
    
    // Add touch feedback for mobile buttons
    const navButtons = document.querySelectorAll('.swiper-button-next, .swiper-button-prev, a[href]');
    navButtons.forEach(button => {
        button.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.95)';
        });
        button.addEventListener('touchend', function() {
            this.style.transform = '';
        });
    });
    
    // Prevent swiper from interfering with button clicks
    document.querySelectorAll('a[href]').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.getAttribute('href') && !this.classList.contains('swiper-button')) {
                return true;
            }
        });
    });
    
    // Add swipe indicator for mobile
    if (window.innerWidth < 1024) {
        const swipeIndicator = document.createElement('div');
        swipeIndicator.className = 'absolute top-4 right-4 text-xs text-stone-400 flex items-center gap-1 lg:hidden z-10';
        swipeIndicator.innerHTML = `
            <i data-lucide="move-horizontal" class="w-3 h-3"></i>
            <span>Swipe</span>
        `;
        document.querySelector('.heroSwiper').parentElement.appendChild(swipeIndicator);
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        // Remove after 3 seconds
        setTimeout(() => {
            swipeIndicator.style.opacity = '0';
            swipeIndicator.style.transition = 'opacity 0.5s ease';
            setTimeout(() => swipeIndicator.remove(), 500);
        }, 3000);
    }
});

function addToCart(e, variantId) {
    e.preventDefault();
    e.stopPropagation(); // Stop bubbling to the anchor tag

    const btn = e.currentTarget;
    if (btn.disabled) return; // Prevent double submission

    if (!variantId) {
        if (typeof window.showToast === 'function') {
            window.showToast('Product not available', 'error');
        } else {
            alert('Product not available');
        }
        return;
    }

    const originalContent = btn.innerHTML;
    
    // Show Loading
    btn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin"></i>';
    if (typeof lucide !== 'undefined') lucide.createIcons();
    btn.disabled = true;

    fetch('{{ route("customer.cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            variant_id: variantId,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show Success
            btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 text-green-600"></i>';
            if (typeof lucide !== 'undefined') lucide.createIcons();
            
            // Update Cart Count
            const cartCountEl = document.getElementById('cartCount');
            if (cartCountEl) cartCountEl.textContent = data.cart_count;

            // Show Toast
            if (typeof window.showToast === 'function') {
                window.showToast('Added to cart!', 'success');
            }
            
            // Revert button after delay
            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.disabled = false;
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }, 2000);
        } else {
            throw new Error(data.message || 'Failed to add to cart');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        btn.innerHTML = '<i data-lucide="x" class="w-5 h-5 text-red-600"></i>';
        if (typeof lucide !== 'undefined') lucide.createIcons();
        
        if (typeof window.showToast === 'function') {
            window.showToast(error.message || 'Error adding to cart', 'error');
        } else {
            alert(error.message);
        }
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }, 2000);
    });
}
</script>
@endpush


    <!-- Marquee/USP -->
    <div class="bg-cyan-600 text-white overflow-hidden py-4">
        <div class="flex whitespace-nowrap gap-12 animate-[scroll_20s_linear_infinite] items-center text-sm font-bold tracking-widest uppercase">
            <span>✨ Free Shipping on orders above ₹{{ number_format(\App\Helpers\SettingsHelper::get('free_shipping_min', 499), 0) }}</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>🌿 Clean Formulas</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>♻️ Recyclable Packaging</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span>💸 5% OFF on Orders above ₹999</span>
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <!-- Repeat for smooth infinite scroll -->
            <span>✨ Free Shipping on orders above ₹{{ number_format(\App\Helpers\SettingsHelper::get('free_shipping_min', 499), 0) }}</span>
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
                    @php
                        $gradients = [
                            ['from' => 'from-rose-50', 'to' => 'to-rose-200'],
                            ['from' => 'from-purple-50', 'to' => 'to-purple-200'],
                            ['from' => 'from-orange-50', 'to' => 'to-orange-200'],
                            ['from' => 'from-sky-50', 'to' => 'to-sky-200'],
                            ['from' => 'from-teal-50', 'to' => 'to-teal-200'],
                            ['from' => 'from-lime-50', 'to' => 'to-lime-200'],
                            ['from' => 'from-amber-50', 'to' => 'to-amber-200'],
                            ['from' => 'from-yellow-50', 'to' => 'to-yellow-200'],
                        ];
                    @endphp

                    @foreach($featuredCategories as $index => $category)
                        @php
                            $gradient = $gradients[$index % count($gradients)];
                            $bgFrom = $gradient['from'];
                            $bgTo = $gradient['to'];
                        @endphp
                    <a href="{{ route('customer.category.products', ['slug' => $category->slug]) }}"
                        class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br {{ $bgFrom }} {{ $bgTo }} rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">{{ $category->name }}</span>
                        <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                            <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                        </div>
                        @if($category->image)
                        @php
                            $catImg = $category->image;
                            if (is_string($catImg) && \Illuminate\Support\Str::startsWith($catImg, '{')) {
                                $data = json_decode($catImg, true);
                                $catImg = $data['file_path'] ?? $catImg;
                            } elseif (is_object($catImg)) {
                                $catImg = $catImg->file_path ?? '';
                            }
                            $catUrl = \Illuminate\Support\Str::startsWith($catImg, 'http') ? $catImg : asset('storage/' . $catImg);
                        @endphp
                        <img src="{{ $catUrl }}"
                            class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] group-hover:rotate-0 transition-transform duration-500"
                            alt="{{ $category->name }}">
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section / Dynamic Sections -->
    @foreach($dynamicSections as $section)
    <section class="py-12 bg-white" id="section-{{ Str::slug($section['title']) }}">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <span class="text-cyan-500 font-bold uppercase tracking-wider text-xs mb-2 block">{{ $section['subtitle'] ?? 'Featured Collection' }}</span>
                <h2 class="text-4xl font-bold tracking-tight text-stone-900 mb-4">{{ $section['title'] }}</h2>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($section['products'] as $product)
                <!-- Product Card -->
                <div class="product-card group cursor-pointer">
                    <a href="{{ route('customer.products.details', ['slug' => $product['slug']]) }}">
                        <div class="relative bg-stone-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:shadow-stone-200">
                            <!-- Badge -->
                            @if($product['is_new'])
                                <span class="absolute top-4 left-4 bg-rose-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                            @elseif($product['is_bestseller'])
                                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">Best Seller</span>
                            @endif

                            <!-- Image -->
                            @php
                                $prodImg = $product['main_image'] ?? 'assets/images/placeholder.jpg';
                                if (is_string($prodImg) && \Illuminate\Support\Str::startsWith($prodImg, '{')) {
                                    $data = json_decode($prodImg, true);
                                    $prodImg = $data['file_path'] ?? $prodImg;
                                } elseif (is_array($prodImg)) {
                                    $prodImg = $prodImg['file_path'] ?? $prodImg;
                                }
                                $prodUrl = \Illuminate\Support\Str::startsWith($prodImg, 'http') ? $prodImg : asset('storage/' . $prodImg);
                                if ($prodImg === 'assets/images/placeholder.jpg') {
                                    $prodUrl = asset('assets/images/placeholder.jpg'); 
                                }
                            @endphp
                            <img src="{{ $prodUrl }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="{{ $product['name'] }}">

                            <!-- Quick Add -->
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                    onclick="addToCart(event, {{ $product['default_variant_id'] ?? 'null' }})">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors line-clamp-1">
                                    {{ $product['name'] }}
                                </h3>
                                <span class="font-semibold text-stone-900 whitespace-nowrap">₹{{ number_format($product['offer_price'] ?? $product['price'], 0) }}</span>
                            </div>
                            <p class="text-xs text-stone-500 line-clamp-1">{{ $product['subtitle'] ?? $product['category']['name'] ?? 'Skincare' }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('customer.products.list') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-cyan-600 text-white font-semibold rounded-full hover:bg-cyan-700 hover:scale-105 transition-all duration-300 shadow-lg shadow-cyan-200">
                    View All Products <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
                </a>
            </div>
        </div>
    </section>
    @endforeach

    <!-- Categories / Concerns -->
<section class="py-24" id="concerns">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-stone-900 mb-2">Shop by Concern</h2>
                <p class="text-stone-500">Targeted solutions for your skin goals.</p>
            </div>
            <a href="{{ route('customer.page.concerns') }}"
               class="hidden md:flex items-center gap-2 text-rose-500 font-semibold hover:gap-3 transition-all">
                View All <i data-lucide="arrow-right" class="w-4 h-4 stroke-[1.5]"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Concern 1 - Dullness & Dark Spots -->
            <a href="{{ route('customer.page.concerns') }}?concern=dullness-dark-spots"
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
            <a href="{{ route('customer.page.concerns') }}?concern=dryness-dehydration"
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
            <a href="{{ route('customer.page.concerns') }}?concern=acne-breakouts"
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
            <a href="{{ route('customer.page.concerns') }}?concern=hair-care"
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
            @forelse($testimonials as $testimonial)
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <div class="flex gap-1 text-yellow-400 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        @if($i < $testimonial->rating)
                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        @else
                            <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                        @endif
                    @endfor
                </div>
                <p class="text-stone-600 mb-6 italic">
                    "{{ $testimonial->message }}"
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-stone-100 flex items-center justify-center">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}"
                                 class="w-full h-full object-cover" alt="{{ $testimonial->name }}">
                        @else
                            <span class="font-bold text-stone-500">{{ substr($testimonial->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div>
                        <h5 class="font-bold text-sm">{{ $testimonial->name }}</h5>
                        <p class="text-xs text-stone-400">{{ $testimonial->designation ?? 'Verified Buyer' }}</p>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback if no testimonials -->
            <div class="testimonial min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                <p class="text-stone-600 mb-6 italic">No reviews yet.</p>
            </div>
            @endforelse
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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