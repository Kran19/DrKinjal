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


    <!-- Hero Section -->
<header class="relative overflow-hidden">
    <!-- Background Blobs -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-cyan-100/50 rounded-full blur-3xl -z-10 translate-x-1/3 -translate-y-1/4 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-teal-100/50 rounded-full blur-3xl -z-10 -translate-x-1/3 translate-y-1/4"></div>

    <!-- Full Width Swiper Container - FIXED HEIGHT -->
    <div class="swiper heroSwiper w-full object-cover">
        <!-- Swiper's Required Wrapper -->
        <div class="swiper-wrapper object-cover">
            @foreach($banners as $banner)
            <div class="swiper-slide">
                <div class="relative h-full w-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        @php
                            $bannerImg = $banner->image;
                            if (is_string($bannerImg) && \Illuminate\Support\Str::startsWith($bannerImg, '{')) {
                                $data = json_decode($bannerImg, true);
                                $bannerImg = $data['file_path'] ?? $bannerImg;
                            }
                            $bannerUrl = \Illuminate\Support\Str::startsWith($bannerImg, 'http') ? $bannerImg : asset('storage/' . $bannerImg);
                        @endphp
                        <img src="{{ $bannerUrl }}"
                            alt="{{ $banner->title ?? 'Banner' }}"
                            class="w-full h-full ">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/20 md:to-transparent"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
                    }, 500);
                }, 800); // Slight delay for branding visibility
            });
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroSwiper = new Swiper('.heroSwiper', {
        direction: 'horizontal',
        loop: {{ $banners->count() > 1 ? 'true' : 'false' }},
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
            height: 14rem !important;
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