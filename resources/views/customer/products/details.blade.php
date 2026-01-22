@extends('customer.layouts.master')

@section('title', $product['name'] . ' - Market')

@section('content')
<section class="pt-8 pb-20">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-stone-500 mb-8">
            <a href="{{ route('customer.home.index') }}" class="hover:text-rose-500">Home</a>
            <i data-lucide="chevron-right" class="w-4 h-4"></i>
            <a href="{{ route('customer.products.list') }}" class="hover:text-rose-500">Products</a>
            @if(isset($product['category']))
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <a href="{{ route('customer.category.products', ['slug' => $product['category_slug'] ?? '']) }}" class="hover:text-rose-500">{{ $product['category'] }}</a>
            @endif
            <i data-lucide="chevron-right" class="w-4 h-4"></i>
            <span class="text-stone-900 border-b border-rose-500">{{ $product['name'] }}</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Product Images -->
            <div>
                <div class="relative bg-orange-50 rounded-3xl aspect-square mb-4 overflow-hidden group">
                    <img id="mainImage" src="{{ asset('storage/' . $product['main_image']) }}" 
                         class="w-full h-full object-contain p-8 group-hover:scale-105 transition-transform duration-500" 
                         alt="{{ $product['name'] }}">
                     
                    @if($product['is_bestseller'])
                        <span class="absolute top-6 left-6 bg-white/90 backdrop-blur text-stone-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Best Seller</span>
                    @elseif($product['is_new'])
                        <span class="absolute top-6 left-6 bg-brand-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">New</span>
                    @endif
                </div>
                
                @if(isset($product['images']) && count($product['images']) > 0)
                <div class="grid grid-cols-4 gap-4">
                    @foreach($product['images'] as $image)
                    <button onclick="changeImage('{{ asset('storage/' . $image['url']) }}')" 
                            class="aspect-square rounded-2xl bg-stone-50 overflow-hidden border-2 border-transparent hover:border-rose-500 transition-colors">
                        <img src="{{ asset('storage/' . $image['url']) }}" class="w-full h-full object-contain p-2" alt="Product Image">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-6">
                    @if(isset($product['category']))
                        <span class="text-rose-500 font-bold uppercase tracking-wider text-xs">{{ $product['category'] }}</span>
                    @endif
                    <h1 class="text-3xl lg:text-4xl font-bold text-stone-900 mt-2 mb-4">{{ $product['name'] }}</h1>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex gap-1 text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product['rating']))
                                    <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                                @else
                                    <i data-lucide="star" class="w-5 h-5 text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-stone-500">({{ number_format($product['rating'], 1) }} · {{ $product['review_count'] }} reviews)</span>
                        
                        <span class="{{ $product['is_in_stock'] ? 'text-green-600' : 'text-red-500' }} font-medium text-sm ml-auto">
                            {{ $product['is_in_stock'] ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>
                    
                    <div class="flex items-baseline gap-3 mb-6">
                        <p class="text-3xl font-bold text-stone-900" id="priceDisplay">₹{{ number_format($product['price'], 0) }}</p>
                        @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                            <p class="text-lg text-stone-400 line-through">₹{{ number_format($product['compare_price'], 0) }}</p>
                            <span class="bg-rose-100 text-rose-600 text-xs font-bold px-2 py-1 rounded">{{ $product['discount_percent'] }}% OFF</span>
                        @endif
                    </div>
                </div>

                <div class="mb-8">
                    @if($product['short_description'])
                        <div class="text-stone-600 mb-4 text-base leading-relaxed">{{ $product['short_description'] }}</div>
                    @endif
                </div>

                <!-- Variant Selection -->
                @if(isset($product['attribute_groups']) && count($product['attribute_groups']) > 0)
                <div class="mb-8 p-6 bg-stone-50 rounded-2xl border border-stone-100">
                    <h3 class="font-bold text-stone-900 mb-4 text-sm uppercase tracking-wide">Select Options</h3>
                    <div class="space-y-4">
                        @foreach($product['attribute_groups'] as $attributeName => $group)
                            <div class="variant-group">
                                <label class="block text-sm font-medium text-stone-700 mb-2">{{ $attributeName }}</label>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($group['options'] as $option)
                                        <button type="button" 
                                                class="variant-btn px-4 py-2 bg-white border border-stone-200 rounded-lg text-sm font-medium hover:border-brand-500 hover:text-brand-600 transition-all {{ $loop->first ? 'active ring-2 ring-brand-500 ring-offset-1 border-brand-500 text-brand-600' : '' }}"
                                                data-attribute="{{ $attributeName }}"
                                                data-value="{{ $option['value'] }}"
                                                onclick="selectVariant(this)">
                                            {{ $option['label'] }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Add to Cart -->
                <div class="mb-8">
                    <div class="flex flex-col sm:flex-row items-center gap-4 mb-6">
                        <div class="flex items-center border border-stone-200 rounded-full bg-white h-14">
                            <button class="w-14 h-full text-stone-600 hover:text-rose-500 decrease-qty font-bold text-lg">-</button>
                            <span class="w-8 h-full flex items-center justify-center font-bold text-stone-900 product-qty">1</span>
                            <button class="w-14 h-full text-stone-600 hover:text-rose-500 increase-qty font-bold text-lg">+</button>
                        </div>
                        <button id="addToCartBtn" 
                                class="flex-1 w-full h-14 px-8 bg-stone-900 text-white font-bold rounded-full hover:bg-rose-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 disabled:bg-stone-300 disabled:cursor-not-allowed"
                                data-product-id="{{ $product['id'] }}"
                                data-variant-id="{{ $product['default_variant_id'] ?? $product['id'] }}"
                                {{ !$product['is_in_stock'] ? 'disabled' : '' }}>
                            <span class="btn-text">{{ $product['is_in_stock'] ? 'Add to Cart' : 'Out of Stock' }}</span> 
                            <span class="ml-2 font-normal opacity-80 total-price-container" style="{{ !$product['is_in_stock'] ? 'display:none' : '' }}">· ₹<span class="total-price">{{ $product['price'] }}</span></span>
                        </button>
                        <button onclick="addToWishlist({{ $product['id'] }})" class="w-14 h-14 border border-stone-200 rounded-full flex items-center justify-center hover:bg-stone-50 hover:border-rose-200 group transition-colors">
                            <i data-lucide="heart" class="w-6 h-6 text-stone-400 group-hover:text-rose-500 transition-colors"></i>
                        </button>
                    </div>
                </div>

                <!-- Key Ingredients / Materials -->
                @if(isset($product['materials']) && count($product['materials']) > 0)
                <div class="mb-8">
                    <h3 class="font-bold text-stone-900 mb-3">Materials / Ingredients</h3>
                    <div class="flex gap-2 flex-wrap">
                        @foreach($product['materials'] as $material)
                            <span class="px-3 py-1 bg-amber-50 text-amber-800 rounded-full text-sm font-medium">{{ $material }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

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
            <div class="border-b border-stone-200 mb-8 overflow-x-auto">
                <div class="flex gap-8 min-w-max">
                    <button class="pb-4 font-semibold text-stone-900 border-b-2 border-stone-900 tab-btn active" data-tab="details">Product Details</button>
                    @if(isset($product['specifications']) && count($product['specifications']) > 0)
                        <button class="pb-4 text-stone-600 hover:text-stone-900 transition-colors tab-btn" data-tab="specifications">Specifications</button>
                    @endif
                    <button class="pb-4 text-stone-600 hover:text-stone-900 transition-colors tab-btn" data-tab="reviews">Reviews ({{ $product['review_count'] }})</button>
                </div>
            </div>
            
            <!-- Product Details Tab -->
            <div id="details-tab" class="tab-content">
                <div class="prose max-w-none text-stone-600">
                    {!! nl2br(e($product['description'] ?? 'No further details available.')) !!}
                </div>
            </div>

            <!-- Specifications Tab -->
            @if(isset($product['specifications']) && count($product['specifications']) > 0)
            <div id="specifications-tab" class="tab-content hidden">
                <div class="bg-stone-50 rounded-2xl p-6 md:p-8">
                    <h3 class="font-bold text-lg text-stone-900 mb-6">Technical Specifications</h3>
                    <div class="grid md:grid-cols-2 gap-x-12 gap-y-4">
                        @foreach($product['specifications'] as $spec)
                        <div class="flex justify-between py-3 border-b border-stone-200 last:border-0">
                            <span class="text-stone-600">{{ $spec['name'] }}</span>
                            <span class="font-bold text-stone-900">{{ $spec['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Reviews Tab -->
            <div id="reviews-tab" class="tab-content hidden">
                <div class="space-y-8">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-stone-900">Customer Reviews</h3>
                        <!-- <button class="px-6 py-2 border border-stone-900 rounded-full text-stone-900 font-medium hover:bg-stone-900 hover:text-white transition-colors">Write a Review</button> -->
                    </div>
                    
                    @if(isset($reviews) && count($reviews) > 0)
                        <div class="grid gap-6">
                            @foreach($reviews as $review)
                            <div class="bg-stone-50 p-6 rounded-2xl">
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="flex gap-0.5 text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                            @else
                                                <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="font-bold text-stone-900 ml-2">{{ $review->title }}</span>
                                </div>
                                <p class="text-stone-600 mb-4">{{ $review->comment }}</p>
                                <div class="flex items-center gap-3 text-sm text-stone-500">
                                    <span class="font-medium text-stone-900">{{ $review->user->name ?? 'Anonymous' }}</span>
                                    <span>·</span>
                                    <span>{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 bg-stone-50 rounded-2xl">
                            <i data-lucide="message-square" class="w-12 h-12 text-stone-300 mx-auto mb-4"></i>
                            <p class="text-stone-500">No reviews yet for this product.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if(isset($relatedProducts) && count($relatedProducts) > 0)
        <section class="mt-24 pt-12 border-t border-stone-200">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900 mb-8">You May Also Like</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="product-card group cursor-pointer">
                    <a href="{{ route('customer.products.details', ['slug' => $related['slug']]) }}">
                        <div class="relative bg-stone-50 rounded-2xl aspect-[3/4] mb-4 overflow-hidden">
                            @if($related['is_new'])
                                <span class="absolute top-3 left-3 bg-brand-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">New</span>
                            @endif
                            <img src="{{ asset('storage/' . $related['main_image']) }}" 
                                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                                 alt="{{ $related['name'] }}"
                                 onerror="this.src='{{ asset('assets/images/placeholder.jpg') }}'">
                        </div>
                        <h3 class="font-bold text-stone-900 group-hover:text-rose-500 transition-colors line-clamp-1">{{ $related['name'] }}</h3>
                        <p class="text-stone-500 text-sm">₹{{ number_format($related['price'], 0) }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        @endif
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
    // Define variants data
    const productVariants = @json($product['variants'] ?? []);
    const basePrice = {{ $product['price'] }};

    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        let quantity = 1;
        let selectedVariantId = '{{ $product['default_variant_id'] ?? $product['id'] }}';
        
        // Image Switcher
        window.changeImage = function(src) {
            const mainImg = document.getElementById('mainImage');
            mainImg.style.opacity = '0.5';
            setTimeout(() => {
                mainImg.src = src;
                mainImg.style.opacity = '1';
            }, 200);
        }

        // Tab Switching
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.dataset.tab;
                
                tabBtns.forEach(b => {
                    b.classList.remove('active', 'border-b-2', 'border-stone-900', 'text-stone-900');
                    b.classList.add('text-stone-600');
                });
                
                btn.classList.add('active', 'border-b-2', 'border-stone-900', 'text-stone-900');
                btn.classList.remove('text-stone-600');
                
                tabContents.forEach(c => c.classList.add('hidden'));
                document.getElementById(target + '-tab').classList.remove('hidden');
            });
        });

        // Quantity Logic
        const qtyEl = document.querySelector('.product-qty');
        const totalPriceEl = document.querySelector('.total-price');

        // Initial setup for price
        updateTotalPrice();
        
        document.querySelector('.increase-qty').addEventListener('click', () => {
            quantity++;
            qtyEl.textContent = quantity;
            updateTotalPrice();
        });
        
        document.querySelector('.decrease-qty').addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                qtyEl.textContent = quantity;
                updateTotalPrice();
            }
        });

        function updateTotalPrice() {
             const currentPrice = getCurrentPrice();
             // Assuming simple calculation, if we want to show total for quantity, uncomment:
             // totalPriceEl.textContent = Number(currentPrice * quantity).toLocaleString();
             // But usually on PDP price stays per unit, and button shows total or unit.
             // The design shows "Add to Cart . {price}", implying total or unit.
             totalPriceEl.textContent = Number(currentPrice * quantity).toLocaleString();
        }

        function getCurrentPrice() {
            if (!productVariants.length) return basePrice;
            const variant = productVariants.find(v => v.id == selectedVariantId);
            return variant ? variant.price : basePrice;
        }

        // Variant Selection Logic
        window.selectVariant = function(btn) {
            const group = btn.closest('.variant-group');
            // Deactivate all in group
            group.querySelectorAll('.variant-btn').forEach(b => {
                b.classList.remove('active', 'ring-2', 'ring-brand-500', 'ring-offset-1', 'border-brand-500', 'text-brand-600');
            });
            // Activate clicked
            btn.classList.add('active', 'ring-2', 'ring-brand-500', 'ring-offset-1', 'border-brand-500', 'text-brand-600');
            
            findMatchingVariant();
        }

        function findMatchingVariant() {
            const selectedAttributes = {};
            document.querySelectorAll('.variant-btn.active').forEach(btn => {
                selectedAttributes[btn.dataset.attribute] = btn.dataset.value;
            });
            
            // This is a simplified matching. Real logic depends on structure.
            // Assuming we have variants array and we check if a variant matches all selected attributes.
            // Note: $product['variants'] structure is flat in Service, but it has 'attributes' array.
            
            let matchedVariant = null;
            
            for (const variant of productVariants) {
                let match = true;
                for (const [attrName, attrVal] of Object.entries(selectedAttributes)) {
                    // Check if variant has this attribute value
                    const hasAttr = variant.attributes.some(a => a.attribute_name === attrName && a.value === attrVal);
                    if (!hasAttr) {
                        match = false;
                        break;
                    }
                }
                if (match) {
                    matchedVariant = variant;
                    break;
                }
            }
            
            if (matchedVariant) {
                selectedVariantId = matchedVariant.id;
                document.getElementById('addToCartBtn').dataset.variantId = matchedVariant.id;
                
                // Update Price
                document.getElementById('priceDisplay').textContent = '₹' + Number(matchedVariant.price).toLocaleString();
                updateTotalPrice();
                
                // Update Stock
                const stockEl = document.querySelector('.ml-auto.font-medium'); // Stock indicator
                const btn = document.getElementById('addToCartBtn');
                
                if (matchedVariant.stock_quantity > 0) {
                     stockEl.textContent = 'In Stock';
                     stockEl.className = 'text-green-600 font-medium text-sm ml-auto';
                     btn.disabled = false;
                     btn.querySelector('.btn-text').textContent = 'Add to Cart';
                     btn.querySelector('.total-price-container').style.display = 'inline';
                } else {
                     stockEl.textContent = 'Out of Stock';
                     stockEl.className = 'text-red-500 font-medium text-sm ml-auto';
                     btn.disabled = true;
                     btn.querySelector('.btn-text').textContent = 'Out of Stock';
                     btn.querySelector('.total-price-container').style.display = 'none';
                }
                
                // Update Image if variant has a primary image
                const variantImage = matchedVariant.images.find(img => img.is_primary);
                if (variantImage) {
                    changeImage('/storage/' + variantImage.url); // Adjust path logic if needed
                }
            }
        }

        // Add to Cart
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            if (this.disabled) return;
            
            const btn = this;
            const originalContent = btn.innerHTML;
            btn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin"></i>';
            lucide.createIcons();
            btn.disabled = true;
            
            fetch('{{ route("customer.cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: btn.dataset.productId,
                    variant_id: selectedVariantId,
                    quantity: quantity
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update header cart count
                    const cartCountEl = document.getElementById('cart-count');
                    if(cartCountEl) cartCountEl.textContent = data.cart_count;
                    
                    // Show notification
                    const notification = document.getElementById('cartNotification');
                    notification.classList.remove('hidden');
                    notification.classList.add('flex');
                    setTimeout(() => {
                         notification.classList.add('hidden');
                         notification.classList.remove('flex');
                    }, 3000);
                    
                    btn.innerHTML = '<i data-lucide="check" class="w-5 h-5"></i> Added';
                    lucide.createIcons();
                    setTimeout(() => {
                        btn.innerHTML = originalContent;
                        btn.disabled = false;
                        lucide.createIcons();
                    }, 2000);
                } else {
                    alert(data.message || 'Failed to add to cart');
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                }
            })
            .catch(err => {
                console.error(err);
                btn.innerHTML = originalContent;
                btn.disabled = false;
            });
        });
        
        // Wishlist
        window.addToWishlist = function(productId) {
             const btn = event.currentTarget;
             const icon = btn.querySelector('i');
             
             fetch('{{ route("customer.wishlist.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_variant_id: selectedVariantId || productId
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    icon.classList.remove('text-stone-400');
                    icon.classList.add('text-rose-500', 'fill-current');
                    // Optional toast
                }
            });
        }
    });
</script>
@endpush