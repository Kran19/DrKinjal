@extends('customer.layouts.master')

@section('title', 'Dr. Kinjal Skin Brightening Face Wash')

@section('content')
<section class="pt-8 pb-20">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-stone-500 mb-8">
            <a href="{{ route('customer.home.index') }}" class="hover:text-rose-500">Home</a>
            <i data-lucide="chevron-right" class="w-4 h-4"></i>
            <span class="text-stone-900">Dr. Kinjal Skin Brightening Face Wash</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Product Images -->
            <div>
                <div class="relative bg-orange-50 rounded-3xl aspect-square mb-4 overflow-hidden">
                    <img src="{{ asset('storage/assets/images/16.png') }}" 
                         class="w-full h-full object-contain p-12" 
                         alt="Dr. Kinjal Skin Brightening Face Wash">
                    <span class="absolute top-6 left-6 bg-white/90 backdrop-blur text-stone-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Best Seller</span>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <button class="aspect-square rounded-2xl bg-stone-100 overflow-hidden border-2 border-transparent hover:border-rose-500 transition-colors">
                        <img src="{{ asset('storage/assets/images/13.png') }}" class="w-full h-full object-cover" alt="Product">
                    </button>
                    <button class="aspect-square rounded-2xl bg-stone-100 overflow-hidden border border-stone-200">
                        <img src="{{ asset('storage/assets/images/5.png') }}" class="w-full h-full object-cover" alt="Application">
                    </button>
                    <button class="aspect-square rounded-2xl bg-stone-100 overflow-hidden border border-stone-200">
                        <img src="{{ asset('storage/assets/images/3.png') }}" class="w-full h-full object-cover" alt="Ingredients">
                    </button>
                    <button class="aspect-square rounded-2xl bg-stone-100 overflow-hidden border border-stone-200">
                        <img src="{{ asset('storage/assets/images/14.png') }}" class="w-full h-full object-cover" alt="Results">
                    </button>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-6">
                    <span class="text-rose-500 font-bold uppercase tracking-wider text-xs">Face Wash</span>
                    <h1 class="text-4xl lg:text-5xl font-bold text-stone-900 mt-2 mb-4">Dr. Kinjal Skin Brightening Face Wash (100 ml)</h1>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex gap-1 text-yellow-400">
                            @for($i = 0; $i < 5; $i++)
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            @endfor
                        </div>
                        <span class="text-stone-500">(4.7 · 986 reviews)</span>
                    </div>
                    <p class="text-2xl font-bold text-stone-900 mb-6">₹399</p>
                </div>

                <div class="mb-8">
                    <h3 class="font-bold text-stone-900 mb-3">Description</h3>
                    <p class="text-stone-600 mb-4">
                        Reveal visibly brighter, clearer, and healthier-looking skin with Dr. Kinjal Skin Brightening Face Wash, a scientifically formulated cleanser designed to gently cleanse while enhancing your skin's natural radiance.
                    </p>
                    <p class="text-stone-600 mb-4">
                        Enriched with powerful brightening and skin-loving ingredients like Kojic Acid, Niacinamide, Glutathione, Vitamin C, Arbutin, and Mulberry Extract, this face wash helps reduce pigmentation, dark spots, and dullness while promoting an even skin tone.
                    </p>
                </div>

                <!-- Add to Cart -->
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex items-center border border-stone-200 rounded-full">
                            <button class="px-4 py-3 text-stone-600 hover:text-rose-500 decrease-qty">-</button>
                            <span class="px-4 py-3 font-medium product-qty">1</span>
                            <button class="px-4 py-3 text-stone-600 hover:text-rose-500 increase-qty">+</button>
                        </div>
                        <button id="addToCartBtn" class="flex-1 px-8 py-4 bg-stone-900 text-white font-semibold rounded-full hover:bg-rose-500 hover:scale-105 transition-all duration-300">
                            Add to Cart · ₹<span class="total-price">399</span>
                        </button>
                    </div>
                </div>

                <!-- Key Ingredients -->
                <div class="mb-8">
                    <h3 class="font-bold text-stone-900 mb-3">Key Ingredients</h3>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">Kojic Acid</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Niacinamide</span>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Glutathione</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">Aloe Vera</span>
                        <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-sm">Vitamin C</span>
                    </div>
                </div>

                <!-- Delivery Info -->
                <div class="bg-rose-50 rounded-2xl p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center">
                            <i data-lucide="truck" class="w-6 h-6 text-rose-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-stone-900">Free Shipping</h4>
                            <p class="text-sm text-stone-600">Free delivery on orders over ₹499</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-20">
            <div class="border-b border-stone-200 mb-8">
                <div class="flex gap-8">
                    <button class="pb-4 font-semibold text-stone-900 border-b-2 border-stone-900 tab-btn active" data-tab="how-to-use">How to Use</button>
                    <button class="pb-4 text-stone-600 hover:text-stone-900 transition-colors tab-btn" data-tab="ingredients">Ingredients</button>
                    <button class="pb-4 text-stone-600 hover:text-stone-900 transition-colors tab-btn" data-tab="benefits">Key Benefits</button>
                    <button class="pb-4 text-stone-600 hover:text-stone-900 transition-colors tab-btn" data-tab="details">Product Details</button>
                </div>
            </div>
            
            <!-- How to Use Tab -->
            <div id="how-to-use-tab" class="tab-content">
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-xl font-bold text-stone-900 mb-4">Directions</h3>
                        <ol class="space-y-3 text-stone-600">
                            <li class="flex gap-3">
                                <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center text-sm font-bold flex-shrink-0">1</span>
                                <span>Apply a small amount on wet face</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center text-sm font-bold flex-shrink-0">2</span>
                                <span>Gently massage in circular motions</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center text-sm font-bold flex-shrink-0">3</span>
                                <span>Rinse thoroughly with water</span>
                            </li>
                        </ol>
                        <p class="mt-4 text-stone-600"><strong>Use twice daily (morning and night) for best results.</strong></p>
                    </div>
                </div>
            </div>

            <!-- Ingredients Tab -->
            <div id="ingredients-tab" class="tab-content hidden">
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-xl font-bold text-stone-900 mb-4">Active Ingredients</h3>
                        <div class="space-y-4">
                            <div class="p-4 bg-stone-50 rounded-xl">
                                <h4 class="font-bold text-stone-900 mb-1">Kojic Acid</h4>
                                <p class="text-sm text-stone-600">Naturally derived brightening agent that helps reduce melanin production and fade dark spots.</p>
                            </div>
                            <div class="p-4 bg-stone-50 rounded-xl">
                                <h4 class="font-bold text-stone-900 mb-1">Niacinamide (Vitamin B3)</h4>
                                <p class="text-sm text-stone-600">Improves skin barrier function, reduces inflammation, and minimizes pore appearance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Benefits Tab -->
            <div id="benefits-tab" class="tab-content hidden">
                <ul class="space-y-2 text-stone-600">
                    <li class="flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                        Gently brightens and evens skin tone
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                        Helps reduce pigmentation and dark spots
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                        Deep cleanses pores and removes impurities
                    </li>
                </ul>
            </div>

            <!-- Product Details Tab -->
            <div id="details-tab" class="tab-content hidden">
                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-stone-50 p-6 rounded-xl">
                            <h4 class="font-bold text-stone-900 mb-2">Product Specifications</h4>
                            <ul class="space-y-2 text-stone-600">
                                <li class="flex justify-between">
                                    <span>Net Volume:</span>
                                    <span class="font-medium">100 ml</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>MRP:</span>
                                    <span class="font-medium">₹399</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Shelf Life:</span>
                                    <span class="font-medium">24 Months</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Texture:</span>
                                    <span class="font-medium">Creamy Gel</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Fragrance:</span>
                                    <span class="font-medium">Light, Fresh</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-stone-50 p-6 rounded-xl">
                            <h4 class="font-bold text-stone-900 mb-2">Perfect For</h4>
                            <p class="text-stone-600">
                                Daily use as your first step toward clearer, brighter, and more radiant skin. Ideal for those looking to improve skin brightness, reduce pigmentation, and achieve a healthy glow. Suitable for all skin types.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart Notification -->
<div id="cartNotification" class="fixed top-24 right-6 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg z-50 hidden">
    <div class="flex items-center gap-3">
        <i data-lucide="check-circle" class="w-6 h-6"></i>
        <span>Added to cart successfully!</span>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    lucide.createIcons();
    
    const basePrice = 399;
    let quantity = 1;
    let isInCart = false;
    
    // Tab functionality
    $('.tab-btn').click(function() {
        const tabId = $(this).data('tab');
        
        $('.tab-btn').removeClass('active border-b-2 border-stone-900 text-stone-900');
        $('.tab-btn').addClass('text-stone-600');
        $(this).addClass('active border-b-2 border-stone-900 text-stone-900');
        $(this).removeClass('text-stone-600');
        
        $('.tab-content').addClass('hidden');
        $('#' + tabId + '-tab').removeClass('hidden');
    });
    
    // Quantity controls
    $('.increase-qty').click(function() {
        quantity++;
        $('.product-qty').text(quantity);
        $('.total-price').text(basePrice * quantity);
    });
    
    $('.decrease-qty').click(function() {
        if (quantity > 1) {
            quantity--;
            $('.product-qty').text(quantity);
            $('.total-price').text(basePrice * quantity);
        }
    });
    
    // Add to cart
    $('#addToCartBtn').click(function() {
        isInCart = !isInCart;
        
        if (isInCart) {
            $(this).removeClass('bg-stone-900 hover:bg-rose-500');
            $(this).addClass('bg-green-600 hover:bg-green-700');
            $(this).html(`<i data-lucide="check" class="w-5 h-5 inline-block mr-2"></i>In Cart · ₹<span class="total-price">${basePrice * quantity}</span>`);
            
            $('#cartNotification').removeClass('hidden').addClass('flex');
            setTimeout(function() {
                $('#cartNotification').removeClass('flex').addClass('hidden');
            }, 3000);
        } else {
            $(this).removeClass('bg-green-600 hover:bg-green-700');
            $(this).addClass('bg-stone-900 hover:bg-rose-500');
            $(this).html(`Add to Cart · ₹<span class="total-price">${basePrice * quantity}</span>`);
        }
        
        lucide.createIcons();
    });
});
</script>
@endpush