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
            <span class="text-stone-900">{{ $product['name'] }}</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Product Images -->
            <div>
                <div class="relative bg-orange-50 rounded-3xl aspect-square mb-4 overflow-hidden">
                    <img id="mainImage" src="{{ asset('storage/' . $product['main_image']) }}" 
                         class="w-full h-full object-contain p-12" 
                         alt="{{ $product['name'] }}">
                     
                    @if($product['is_bestseller'])
                        <span class="absolute top-6 left-6 bg-white/90 backdrop-blur text-stone-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Best Seller</span>
                    @elseif($product['is_new'])
                        <span class="absolute top-6 left-6 bg-brand-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">New</span>
                    @elseif(isset($product['category']))
                        <span class="absolute top-6 left-6 bg-white/90 backdrop-blur text-stone-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">{{ $product['category'] }}</span>
                    @endif
                </div>
                
                @if(isset($product['images']) && count($product['images']) > 0)
                <div class="grid grid-cols-4 gap-4">
                    @foreach($product['images'] as $image)
                    <button onclick="changeImage('{{ asset('storage/' . $image['url']) }}')" 
                            class="aspect-square rounded-2xl bg-stone-100 overflow-hidden border-2 border-transparent hover:border-rose-500 transition-colors">
                        <img src="{{ asset('storage/' . $image['url']) }}" class="w-full h-full object-cover" alt="Product Image">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-6">
                    <span class="text-rose-500 font-bold uppercase tracking-wider text-xs">{{ $product['category'] ?? 'Skincare' }}</span>
                    <h1 class="text-4xl lg:text-5xl font-bold text-stone-900 mt-2 mb-4">{{ $product['name'] }}</h1>
                    
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
                    <h3 class="font-bold text-stone-900 mb-3">Description</h3>
                    @if($product['short_description'])
                        <p class="text-stone-600 mb-4">{{ $product['short_description'] }}</p>
                    @endif
                    @if($product['description'])
                        <div class="text-stone-600 mb-4 text-base leading-relaxed">
                            {!! $product['description'] !!}
                        </div>
                    @endif
                </div>

                <!-- Variant Selection -->
                <!-- @if(isset($product['attribute_groups']) && count($product['attribute_groups']) > 0)
                <div class="mb-8">
                    <h3 class="font-bold text-stone-900 mb-3">Size</h3>
                    <div class="flex gap-3">
                        @foreach($product['attribute_groups'] as $attributeName => $group)
                            @foreach($group['options'] as $option)
                                <button type="button" 
                                        class="variant-btn px-6 py-3 rounded-full border-2 {{ $loop->first ? 'border-stone-900 text-stone-900 font-medium hover:bg-stone-900 hover:text-white' : 'border-stone-200 text-stone-700 hover:border-rose-300 hover:text-rose-600' }} transition-colors"
                                        data-attribute="{{ $attributeName }}"
                                        data-value="{{ $option['value'] }}"
                                        onclick="selectVariant(this)">
                                    {{ $option['label'] }}
                                </button>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @endif -->

                <!-- Size Display -->
@php
    // Extract size from specifications
    $size = null;
    if (isset($product['specifications'])) {
        foreach ($product['specifications'] as $spec) {
            if (in_array($spec['name'], ['Net Volume/Weight', 'Size', 'Net Weight', 'Volume'])) {
                $size = $spec['value'];
                break;
            }
        }
    }
@endphp

@if($size)
<div class="mb-8">
    <h3 class="font-bold text-stone-900 mb-3">Size</h3>
    <div class="flex gap-3">
        <button class="px-6 py-3 rounded-full border-2 border-stone-900 text-stone-900 font-medium hover:bg-stone-900 hover:text-white transition-colors">
            {{ $size }}
        </button>
    </div>
</div>
@endif

                <!-- Add to Cart -->
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex items-center border border-stone-200 rounded-full">
                            <button class="px-4 py-3 text-stone-600 hover:text-rose-500 decrease-qty">-</button>
                            <span class="px-4 py-3 font-medium product-qty">1</span>
                            <button class="px-4 py-3 text-stone-600 hover:text-rose-500 increase-qty">+</button>
                        </div>
                        <button id="addToCartBtn" 
                                class="flex-1 px-8 py-4 bg-stone-900 text-white font-semibold rounded-full hover:bg-rose-500 hover:scale-105 transition-all duration-300 disabled:bg-stone-300 disabled:cursor-not-allowed"
                                data-product-id="{{ $product['id'] }}"
                                data-variant-id="{{ $product['default_variant_id'] ?? $product['id'] }}"
                                {{ !$product['is_in_stock'] ? 'disabled' : '' }}>
                            {{ $product['is_in_stock'] ? 'Add to Cart' : 'Out of Stock' }} · ₹<span class="total-price">{{ $product['price'] }}</span>
                        </button>
                    </div>
                    <button onclick="addToWishlist({{ $product['id'] }})" 
                            class="w-full px-8 py-4 bg-white text-stone-900 font-semibold rounded-full border border-stone-200 hover:border-rose-300 hover:bg-rose-50 transition-all duration-300 mb-4">
                        <i data-lucide="heart" class="w-5 h-5 inline-block mr-2"></i>
                        Add to Wishlist
                    </button>
                </div>

                <!-- Key Ingredients / Materials -->
                @if(isset($product['materials']) && count($product['materials']) > 0)
                <div class="mb-8">
                    <h3 class="font-bold text-stone-900 mb-3">Key Ingredients</h3>
                    <div class="flex gap-2 flex-wrap">
                        @foreach($product['materials'] as $material)
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm">{{ $material }}</span>
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
                    @if(isset($product['specifications']) && count($product['specifications']) > 0)
                        <button class="pb-4 font-semibold tab-btn text-stone-600 hover:text-stone-900 transition-colors" data-tab="benefits">Key Benefits</button>
                        <button class="pb-4 font-semibold tab-btn text-stone-600 hover:text-stone-900 transition-colors" data-tab="ingredients">Ingredients</button>
                        <button class="pb-4 font-semibold tab-btn text-stone-600 hover:text-stone-900 transition-colors" data-tab="how-to-use">How to Use</button>
                    @endif
                    <button class="pb-4 font-semibold tab-btn active border-b-2 border-stone-900 text-stone-900" data-tab="details">Product Details</button>
                    <button class="pb-4 font-semibold tab-btn text-stone-600 hover:text-stone-900 transition-colors" data-tab="reviews">Reviews ({{ count($reviews) }})</button>
                </div>
            </div>
            
            <!-- Key Benefits Tab -->
            @if(isset($product['specifications']) && count($product['specifications']) > 0)
            <div id="benefits-tab" class="tab-content hidden">
                <div class="space-y-4">
                    <ul class="space-y-2 text-stone-600">
                        @php
                            // Extract benefits from specifications
                            $benefits = collect($product['specifications'])->firstWhere('name', 'Key Benefits');
                            $benefitItems = $benefits ? explode(', ', $benefits['value']) : [];
                        @endphp
                        
                        @if(count($benefitItems) > 0)
                            @foreach($benefitItems as $benefit)
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                {{ $benefit }}
                            </li>
                            @endforeach
                        @else
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                Brightens and evens skin tone
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                Reduces dark spots and pigmentation
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                Gently exfoliates and removes impurities
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                Hydrates and soothes skin
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                                Suitable for all skin types
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif

            <!-- Ingredients Tab -->
            @if(isset($product['specifications']) && count($product['specifications']) > 0)
            <div id="ingredients-tab" class="tab-content hidden">
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-xl font-bold text-stone-900 mb-4">Active Ingredients</h3>
                        <div class="space-y-4">
                            @php
                                // Extract key ingredients from specifications
                                $ingredients = collect($product['specifications'])->firstWhere('name', 'Key Ingredients');
                                $ingredientItems = $ingredients ? explode(', ', $ingredients['value']) : [];
                            @endphp
                            
                            @if(count($ingredientItems) > 0)
                                @foreach(array_slice($ingredientItems, 0, 4) as $ingredient)
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">{{ $ingredient }}</h4>
                                    <p class="text-sm text-stone-600">
                                        @if($ingredient == 'Kojic Acid')
                                            Natural skin brightener that reduces pigmentation and dark spots.
                                        @elseif($ingredient == 'Niacinamide')
                                            Improves skin barrier and reduces inflammation.
                                        @elseif($ingredient == 'Glutathione')
                                            Powerful antioxidant that helps brighten skin.
                                        @elseif($ingredient == 'Vitamin C')
                                            Protects against environmental damage and boosts collagen.
                                        @else
                                            Helps improve skin texture and appearance.
                                        @endif
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Kojic Acid</h4>
                                    <p class="text-sm text-stone-600">Natural skin brightener that reduces pigmentation and dark spots.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Niacinamide</h4>
                                    <p class="text-sm text-stone-600">Improves skin barrier and reduces inflammation.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Glutathione</h4>
                                    <p class="text-sm text-stone-600">Powerful antioxidant that helps brighten skin.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Vitamin C</h4>
                                    <p class="text-sm text-stone-600">Protects against environmental damage and boosts collagen.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-stone-900 mb-4">Supporting Ingredients</h3>
                        <div class="space-y-4">
                            @if(count($ingredientItems) > 4)
                                @foreach(array_slice($ingredientItems, 4, 4) as $ingredient)
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">{{ $ingredient }}</h4>
                                    <p class="text-sm text-stone-600">
                                        @if($ingredient == 'Aloe Vera')
                                            Soothes and hydrates the skin.
                                        @elseif($ingredient == 'Vitamin E')
                                            Nourishes and protects skin from damage.
                                        @else
                                            Provides additional skincare benefits.
                                        @endif
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Arbutin</h4>
                                    <p class="text-sm text-stone-600">Natural brightening agent derived from bearberry plants.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Mulberry Extract</h4>
                                    <p class="text-sm text-stone-600">Contains antioxidants that help even out skin tone.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Aloe Vera</h4>
                                    <p class="text-sm text-stone-600">Soothes and hydrates the skin.</p>
                                </div>
                                <div class="p-4 bg-stone-50 rounded-xl">
                                    <h4 class="font-bold text-stone-900 mb-1">Vitamin E</h4>
                                    <p class="text-sm text-stone-600">Nourishes and protects skin from damage.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- How to Use Tab -->
            @if(isset($product['specifications']) && count($product['specifications']) > 0)
            <div id="how-to-use-tab" class="tab-content hidden">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-stone-900 mb-4">Directions</h3>
                        @php
                            $howToUse = collect($product['specifications'])->firstWhere('name', 'How to Use');
                        @endphp
                        <p class="text-stone-600 mb-4">
                            {{ $howToUse ? $howToUse['value'] : 'Apply a small amount on wet face, gently massage in circular motions, and rinse thoroughly with water. Use twice daily for best results.' }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Product Details Tab -->
            <div id="details-tab" class="tab-content">
                <div class="space-y-6">
                    @if(isset($product['specifications']) && count($product['specifications']) > 0)
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-stone-50 p-6 rounded-xl">
                            <h4 class="font-bold text-stone-900 mb-2">Product Specifications</h4>
                            <ul class="space-y-2 text-stone-600">
                                @foreach($product['specifications'] as $spec)
                                    @if(in_array($spec['name'], ['Net Volume/Weight', 'MRP', 'Skin Type', 'Shelf Life', 'Dermatologist Tested']))
                                    <li class="flex justify-between">
                                        <span>{{ $spec['name'] }}:</span>
                                        <span class="font-medium">{{ $spec['value'] }}</span>
                                    </li>
                                    @endif
                                @endforeach
                                @if(!isset($product['specifications']) || count($product['specifications']) == 0)
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
                                    <span class="font-medium">36 Months</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Skin Type:</span>
                                    <span class="font-medium">All Skin Types</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Dermatologist Tested:</span>
                                    <span class="font-medium">Yes</span>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="bg-stone-50 p-6 rounded-xl">
                            <h4 class="font-bold text-stone-900 mb-2">Perfect For</h4>
                            <p class="text-stone-600">
                                Reveal visibly brighter, clearer, and healthier-looking skin with Dr. Kinjal Skin Brightening Face Wash, a scientifically formulated cleanser designed to gently cleanse while enhancing your skin's natural radiance.
                            </p>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Detailed Description -->
                    @if($product['description'])
                    <div class="text-stone-600 leading-relaxed">
                        {!! $product['description'] !!}
                    </div>
                    @endif
                </div>
            </div>

            <!-- Reviews Tab -->
            <div id="reviews-tab" class="tab-content hidden">
                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Reviews List -->
                    <div class="lg:col-span-2 space-y-8">
                        <h3 class="text-2xl font-bold text-stone-900">Customer Reviews</h3>
                        
                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(isset($reviews) && count($reviews) > 0)
                            @foreach($reviews as $review)
                            <div class="border-b border-stone-200 pb-8 last:border-0">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                            @else
                                                <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    @php
                                        $parts = explode("\n\n", $review->review ?? '', 2);
                                        $title = count($parts) == 2 ? $parts[0] : '';
                                        $comment = count($parts) == 2 ? $parts[1] : $parts[0];
                                    @endphp
                                    @if($title)
                                    <span class="font-bold text-stone-900">{{ $title }}</span>
                                    @endif
                                </div>
                                <p class="text-stone-600 mb-4">{{ $comment }}</p>
                                <div class="text-sm text-stone-500">
                                    <span class="font-medium text-stone-900">{{ $review->user_name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $review->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="text-stone-500 italic">No reviews yet. Be the first to write one!</div>
                        @endif
                    </div>

                    <!-- Review Form -->
                    <div class="bg-stone-50 p-8 rounded-2xl h-fit sticky top-24">
                        <h3 class="text-xl font-bold text-stone-900 mb-6">Write a Review</h3>
                        <form action="{{ route('customer.products.reviews.store', ['productId' => $product['id']]) }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Rating</label>
                                <div class="flex gap-1" id="star-rating-input">
                                    @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                        <i data-lucide="star" class="w-6 h-6 text-stone-300 peer-checked:text-yellow-400 peer-checked:fill-current group-hover:text-yellow-400 transition-colors star-icon" data-value="{{ $i }}"></i>
                                    </label>
                                    @endfor
                                </div>
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-medium text-stone-700 mb-1">Title</label>
                                <input type="text" name="title" id="title" required
                                       class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-2 focus:ring-stone-900 focus:border-stone-900 outline-none">
                            </div>

                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                                <input type="text" name="customer_name" id="customer_name" required
                                       class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-2 focus:ring-stone-900 focus:border-stone-900 outline-none">
                            </div>

                            <div>
                                <label for="customer_email" class="block text-sm font-medium text-stone-700 mb-1">Email</label>
                                <input type="email" name="customer_email" id="customer_email" required
                                       class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-2 focus:ring-stone-900 focus:border-stone-900 outline-none">
                            </div>

                            <div>
                                <label for="comment" class="block text-sm font-medium text-stone-700 mb-1">Review</label>
                                <textarea name="comment" id="comment" rows="4" required
                                          class="w-full px-4 py-2 border border-stone-200 rounded-lg focus:ring-2 focus:ring-stone-900 focus:border-stone-900 outline-none"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-stone-900 text-white font-bold py-3 rounded-xl hover:bg-rose-500 transition-colors">
                                Submit Review
                            </button>
                        </form>
                    </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        let quantity = 1;
        
        // Image Switcher
        window.changeImage = function(src) {
            const mainImg = document.getElementById('mainImage');
            mainImg.src = src;
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
            const currentPrice = {{ $product['price'] }};
            const total = currentPrice * quantity;
            totalPriceEl.textContent = total.toLocaleString();
        }

        // Variant Selection
        window.selectVariant = function(btn) {
            // Reset all variant buttons
            document.querySelectorAll('.variant-btn').forEach(b => {
                b.classList.remove('border-stone-900', 'text-stone-900', 'hover:bg-stone-900', 'hover:text-white');
                b.classList.add('border-stone-200', 'text-stone-700', 'hover:border-rose-300', 'hover:text-rose-600');
            });
            
            // Set selected variant
            btn.classList.remove('border-stone-200', 'text-stone-700', 'hover:border-rose-300', 'hover:text-rose-600');
            btn.classList.add('border-stone-900', 'text-stone-900', 'hover:bg-stone-900', 'hover:text-white');
        }

        // Add to Cart
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            if (this.disabled) return;
            
            const btn = this;
            const originalContent = btn.innerHTML;
            const variantId = btn.getAttribute('data-variant-id');
            // quantity variable is already defined in the scope above
            
            // Loading state
            btn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin inline-block"></i> Adding...';
            lucide.createIcons();
            btn.disabled = true;
            
            fetch("{{ route('customer.cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    variant_id: variantId,
                    quantity: quantity
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update header cart count
                    const cartCountEl = document.getElementById('cartCount'); // Ensure ID matches header
                    if (cartCountEl) {
                        cartCountEl.textContent = data.cart_count;
                        cartCountEl.classList.remove('hidden');
                    }

                    // Show notification
                    const notification = document.getElementById('cartNotification');
                    if (notification) {
                        notification.classList.remove('hidden');
                        notification.classList.add('flex');
                        
                        setTimeout(() => {
                            notification.classList.add('hidden');
                            notification.classList.remove('flex');
                        }, 3000);
                    }
                    
                    btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 inline-block mr-2"></i> Added';
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
                    lucide.createIcons();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding to cart.');
                btn.innerHTML = originalContent;
                btn.disabled = false;
                lucide.createIcons();
            });
        });
        
        // Wishlist
        // Wishlist
        window.addToWishlist = function(productId) {
            const btn = event.currentTarget;
            // Lucide replaces <i> with <svg>, so check for both or use the first child
            const icon = btn.querySelector('i') || btn.querySelector('svg');
            
            if (!icon) {
                 console.warn('Wishlist icon not found');
                 return;
            }
            
            // Toggle heart fill
            // Check based on class if it's an <i> tag or lucide svg styles
            if (icon.classList.contains('text-rose-500')) {
                icon.classList.remove('text-rose-500', 'fill-current');
                icon.classList.add('text-stone-400');
            } else {
                icon.classList.remove('text-stone-400');
                icon.classList.add('text-rose-500', 'fill-current');
            }
            
            // Show feedback (optional)
            // In a real app, you would make an AJA call here
            if (typeof window.showToast === 'function') {
                window.showToast('Added to wishlist!', 'success');
            } else {
                alert('Added to wishlist!');
            }
        }

        // Star Rating Interaction
        const stars = document.querySelectorAll('.star-icon');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                stars.forEach(s => {
                    const sVal = s.getAttribute('data-value');
                    if (sVal <= value) {
                        s.classList.add('text-yellow-400', 'fill-current');
                        s.classList.remove('text-stone-300');
                    } else {
                        s.classList.remove('text-yellow-400', 'fill-current');
                        s.classList.add('text-stone-300');
                    }
                });
            });
            
            // Hover effect
            star.addEventListener('mouseenter', function() {
                 const value = this.getAttribute('data-value');
                 stars.forEach(s => {
                     if (s.getAttribute('data-value') <= value) {
                         s.classList.add('text-yellow-400');
                     }
                 });
            });
            
             star.addEventListener('mouseleave', function() {
                 stars.forEach(s => {
                     // Only remove if not checked (but we are simulating check with class manipulation here slightly, 
                     // better to rely on input:checked for strictness, but this visual feedback is fine for now
                     // proper implementation would read the input value)
                     if (!s.previousElementSibling.checked) {
                         s.classList.remove('text-yellow-400');
                     }
                 });
                 // Re-apply state based on checked input
                 const checkedInput = document.querySelector('input[name="rating"]:checked');
                 if(checkedInput) {
                     const val = checkedInput.value;
                     stars.forEach(s => {
                        if(s.getAttribute('data-value') <= val) {
                            s.classList.add('text-yellow-400', 'fill-current');
                        } else {
                            s.classList.remove('text-yellow-400', 'fill-current');
                        }
                     });
                 } else {
                     stars.forEach(s => s.classList.remove('text-yellow-400'));
                 }
            });
        });
    });
</script>
@endpush