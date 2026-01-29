@extends('customer.layouts.master')

@section('title', $title ?? 'Bestsellers - Dr Kinjal')
@section('description', 'Our most-loved products, clinically proven to boost your confidence with healthy glowing skin.')
@section('keywords', 'bestsellers, skincare, beauty, top products')

@push('styles')
<style>
    /* Card tilt effect */
    .card-tilt {
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .card-tilt:hover {
        transform: rotateY(10deg) rotateX(5deg) scale(1.02);
    }
</style>
@endpush

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
            <a href="{{ route('customer.products.bestsellers') }}" 
               class="px-6 py-2 rounded-full font-medium text-sm transition-colors {{ !request('category_id') ? 'bg-stone-900 text-white shadow-lg shadow-stone-200' : 'bg-white border border-stone-200 text-stone-600 hover:border-rose-300 hover:text-rose-500' }}">
                All Stars
            </a>
            
            @if(isset($filters['categories']))
                @foreach($filters['categories'] as $category)
                    <a href="{{ route('customer.products.bestsellers', ['category_id' => $category['id']]) }}"
                       class="px-6 py-2 rounded-full font-medium text-sm transition-colors {{ request('category_id') == $category['id'] ? 'bg-stone-900 text-white shadow-lg shadow-stone-200' : 'bg-white border border-stone-200 text-stone-600 hover:border-rose-300 hover:text-rose-500' }}">
                        {{ $category['name'] }}
                    </a>
                @endforeach
            @endif
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8" id="product-grid">
            @php
                $bgColors = ['bg-orange-50', 'bg-rose-50', 'bg-blue-50', 'bg-green-50', 'bg-purple-50', 'bg-yellow-50'];
                $shadowColors = ['shadow-orange-100', 'shadow-rose-100', 'shadow-blue-100', 'shadow-green-100', 'shadow-purple-100', 'shadow-yellow-100'];
            @endphp

            @forelse($products as $index => $product)
                @php
                    $bgColor = $bgColors[$index % count($bgColors)];
                    $shadowColor = $shadowColors[$index % count($shadowColors)];
                    
                    // Construct Badge
                    $badge = null;
                    if ($product['is_new']) { 
                        $badge = 'New';
                    } elseif ($product['discount_percent'] > 0) {
                        $badge = $product['discount_percent'] . '% OFF';
                    } else {
                        $badge = 'Best Seller'; // Default for this page
                    }
                @endphp

                <div class="product-card group cursor-pointer">
                    <!-- Ensure link handles potentially different array keys or object properties. listing.blade.php uses array syntax -->
                    <a href="{{ route('customer.products.details', ['slug' => $product['slug']]) }}">
                        <div class="relative {{ $bgColor }} rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:{{ $shadowColor }}">
                            <!-- Badge -->
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                {{ $badge }}
                            </span>

                            <!-- Image -->
                            <img src="{{ asset('storage/' . $product['main_image']) }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="{{ $product['name'] }}"
                                onerror="this.src='{{ asset('storage/assets/images/placeholder.jpg') }}'">

                            <!-- Quick Add -->
                            <button class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                data-variant-id="{{ $product['default_variant_id'] ?? $product['id'] }}"
                                onclick="addToCart(event, {{ $product['default_variant_id'] ?? $product['id'] }})">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-rose-500 transition-colors line-clamp-1">
                                    {{ $product['name'] }}
                                </h3>
                                <div class="flex flex-col items-end">
                                    <span class="font-semibold text-stone-900">₹{{ number_format($product['price'], 0) }}</span>
                                    {{-- @if(isset($product['compare_price']) && $product['compare_price'] > $product['price'])
                                        <span class="text-xs text-stone-400 line-through">₹{{ number_format($product['compare_price'], 0) }}</span>
                                    @endif --}}
                                </div>
                            </div>
                            <p class="text-xs text-stone-500 line-clamp-1">{{ $product['short_description'] ?? 'Premium Quality Product' }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-stone-500 text-lg">No bestselling products found in this category.</p>
                    <a href="{{ route('customer.products.bestsellers') }}" class="text-cyan-600 font-semibold mt-2 inline-block">View All Bestsellers</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($paginator) && $paginator['last_page'] > 1)
        <div class="mt-12 flex justify-center">
            <div class="flex gap-2">
                <!-- Previous Page -->
                @if ($paginator['current_page'] > 1)
                    <a href="{{ route('customer.products.bestsellers', array_merge(request()->query(), ['page' => $paginator['current_page'] - 1])) }}" 
                       class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">
                        <i data-lucide="chevron-left" class="w-5 h-5 text-stone-600"></i>
                    </a>
                @endif

                <!-- Page Numbers -->
                @php
                    $start = max(1, $paginator['current_page'] - 2);
                    $end = min($paginator['last_page'], $paginator['current_page'] + 2);
                @endphp

                @if($start > 1)
                    <a href="{{ route('customer.products.bestsellers', array_merge(request()->query(), ['page' => 1])) }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 text-stone-600 hover:bg-stone-50">1</a>
                    @if($start > 2)
                        <span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <a href="{{ route('customer.products.bestsellers', array_merge(request()->query(), ['page' => $i])) }}"
                       class="w-10 h-10 flex items-center justify-center rounded-full font-medium transition-colors
                              {{ $i == $paginator['current_page'] ? 'bg-stone-900 text-white' : 'border border-stone-200 text-stone-600 hover:bg-stone-50' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($end < $paginator['last_page'])
                    @if($end < $paginator['last_page'] - 1)
                        <span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
                    @endif
                    <a href="{{ route('customer.products.bestsellers', array_merge(request()->query(), ['page' => $paginator['last_page']])) }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 text-stone-600 hover:bg-stone-50">{{ $paginator['last_page'] }}</a>
                @endif

                <!-- Next Page -->
                @if ($paginator['current_page'] < $paginator['last_page'])
                    <a href="{{ route('customer.products.bestsellers', array_merge(request()->query(), ['page' => $paginator['current_page'] + 1])) }}"
                       class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">
                        <i data-lucide="chevron-right" class="w-5 h-5 text-stone-600"></i>
                    </a>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    function addToCart(event, productId) {
        event.preventDefault();
        event.stopPropagation();
        
        const btn = event.currentTarget;
        const originalContent = btn.innerHTML;
        
        // Loading state
        btn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin"></i>';
        lucide.createIcons();
        btn.disabled = true;

        fetch("{{ route('customer.cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                variant_id: productId,
                quantity: 1
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update cart count
                const cartCountEl = document.getElementById('cartCount');
                if (cartCountEl) {
                    cartCountEl.textContent = data.cart_count;
                    cartCountEl.classList.remove('hidden');
                }
                
                // Success state
                btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 text-green-600"></i>';
                lucide.createIcons();
                
                // Reset
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
            btn.innerHTML = originalContent;
            btn.disabled = false;
            lucide.createIcons();
        });
    }
</script>
@endpush