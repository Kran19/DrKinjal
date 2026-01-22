@extends('customer.layouts.master')

@section('title', $title ?? 'Search Results | Dr. Kinjal Skincare')
@section('description', $meta_description ?? 'Search results for ' . $searchQuery)

@push('styles')
<style>
    .product-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
</style>
@endpush

@section('content')
<section class="border-b border-gray-100 bg-white py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Search Results</h1>
            <p class="mt-4 text-lg text-gray-500">Results for "<span class="font-semibold text-gray-900">{{ $searchQuery }}</span>"</p>
        </div>
    </div>
</section>

<main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex flex-col gap-4 pb-10 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-semibold tracking-tight text-gray-900">Products Found</h2>
        <p class="text-gray-500">
            Showing {{ isset($paginator) ? $paginator['total'] : 0 }} results
        </p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-10" id="products-container">
            @php
                $bgColors = ['bg-teal-50', 'bg-cyan-50', 'bg-sky-50', 'bg-amber-50', 'bg-rose-50', 'bg-purple-50'];
                $shadowColors = ['shadow-teal-100', 'shadow-cyan-100', 'shadow-sky-100', 'shadow-amber-100', 'shadow-rose-100', 'shadow-purple-100'];
            @endphp
        
        @forelse ($products as $index => $product)
            @php
                $bgColor = $bgColors[$index % count($bgColors)];
                $shadowColor = $shadowColors[$index % count($shadowColors)];
                
                $badge = null;
                $badgeColor = '';
                
                if ($product['is_bestseller']) {
                    $badge = 'Best Seller';
                    $badgeColor = 'bg-white/90';
                } elseif ($product['is_new']) {
                    $badge = 'New';
                    $badgeColor = 'bg-brand-500 text-white';
                } elseif ($product['discount_percent'] > 0) {
                    $badge = $product['discount_percent'] . '% OFF';
                    $badgeColor = 'bg-rose-500 text-white';
                } elseif ($product['is_featured']) {
                        $badge = 'Featured';
                        $badgeColor = 'bg-purple-500 text-white';
                }
            @endphp

            <div class="product-item group cursor-pointer">
                <a href="{{ route('customer.products.details', ['slug' => $product['slug']]) }}">
                    <div class="relative mb-4 aspect-[3/4] overflow-hidden rounded-[2rem] {{ $bgColor }} transition-all duration-300 hover:shadow-2xl hover:{{ $shadowColor }}">
                        @if ($badge)
                        <span class="absolute top-4 left-4 z-20 rounded-full {{ $badgeColor }} backdrop-blur text-stone-900 px-2 py-1 text-[10px] font-bold uppercase tracking-wide">
                            {{ $badge }}
                        </span>
                        @endif
                        <img src="{{ asset('storage/' . $product['main_image']) }}"
                                class="absolute inset-0 z-10 h-full w-full object-cover p-0 group-hover:scale-110 transition-transform duration-700" 
                                alt="{{ $product['name'] }}" loading="lazy"
                                onerror="this.src='{{ asset('assets/images/placeholder.jpg') }}'">
                        
                         <button
                            class="absolute bottom-4 right-4 z-20 flex h-10 w-10 translate-y-14 items-center justify-center rounded-full bg-white shadow-lg transition-transform duration-300 hover:bg-gray-900 hover:text-white group-hover:translate-y-0"
                            onclick="addToCart(event, {{ $product['id'] }})">
                            <i data-lucide="plus" class="h-5 w-5"></i>
                        </button>
                    </div>
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-rose-500 line-clamp-1">{{ $product['name'] }}</h3>
                            <div class="flex flex-col items-end">
                                <span class="font-semibold text-gray-900">₹{{ number_format($product['price'], 0) }}</span>
                                @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                                    <span class="text-xs text-stone-400 line-through">₹{{ number_format($product['compare_price'], 0) }}</span>
                                @endif
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 line-clamp-1">{{ $product['short_description'] ?? 'Premium Skincare' }}</p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-full py-12 text-center">
                <div class="rounded-xl bg-gray-50 p-12 text-center">
                    <i data-lucide="search-x" class="mx-auto h-12 w-12 text-gray-400"></i>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No results found</h3>
                    <p class="mt-1 text-sm text-gray-500">No products matching your search query were found.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(isset($paginator['last_page']) && $paginator['last_page'] > 1)
        <div class="mt-16 flex justify-center">
            <div class="flex gap-2">
                <!-- Previous Page -->
                @if ($paginator['current_page'] > 1)
                    <a href="{{ route('customer.products.search', array_merge(['q' => $searchQuery], request()->query(), ['page' => $paginator['current_page'] - 1])) }}" 
                       class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">
                        <i data-lucide="chevron-left" class="w-5 h-5 text-stone-600"></i>
                    </a>
                @endif

                <!-- Page Numbers -->
                @for ($i = 1; $i <= $paginator['last_page']; $i++)
                    <a href="{{ route('customer.products.search', array_merge(['q' => $searchQuery], request()->query(), ['page' => $i])) }}"
                       class="w-10 h-10 flex items-center justify-center rounded-full font-medium transition-colors
                              {{ $i == $paginator['current_page'] ? 'bg-stone-900 text-white' : 'border border-stone-200 text-stone-600 hover:bg-stone-50' }}">
                        {{ $i }}
                    </a>
                @endfor

                <!-- Next Page -->
                @if ($paginator['current_page'] < $paginator['last_page'])
                    <a href="{{ route('customer.products.search', array_merge(['q' => $searchQuery], request()->query(), ['page' => $paginator['current_page'] + 1])) }}"
                       class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">
                        <i data-lucide="chevron-right" class="w-5 h-5 text-stone-600"></i>
                    </a>
                @endif
            </div>
        </div>
    @endif
    
    <div class="mt-16 text-center">
        <a href="{{ route('customer.products.list') }}" class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-8 py-4 font-semibold text-white shadow-lg shadow-rose-200 hover:bg-rose-600 hover:scale-105 transition-all">
            Browse All Products
            <i data-lucide="arrow-right" class="h-4 w-4"></i>
        </a>
    </div>
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
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
                product_id: productId,
                quantity: 1
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const cartCountEl = document.getElementById('cart-count');
                if (cartCountEl) {
                    cartCountEl.textContent = data.cart_count;
                    cartCountEl.classList.remove('hidden');
                }
                btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 text-green-600"></i>';
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
            btn.innerHTML = originalContent;
            btn.disabled = false;
            lucide.createIcons();
        });
    }
</script>
@endpush
