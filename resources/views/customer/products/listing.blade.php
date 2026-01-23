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
                @if(isset($filters['categories']) && count($filters['categories']) > 0)
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

                    @foreach ($filters['categories'] as $index => $category)
                        @php
                            $gradient = $gradients[$index % count($gradients)];
                            $bgFrom = $gradient['from'];
                            $bgTo = $gradient['to'];
                        @endphp
                        <a href="{{ route('customer.category.products', ['slug' => $category['slug']]) }}"
                            class="snap-start shrink-0 relative w-[160px] h-[160px] bg-gradient-to-br {{ $bgFrom }} {{ $bgTo }} rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                            <span class="absolute top-4 left-4 text-sm font-semibold text-stone-900 z-10">{{ $category['name'] }}</span>
                            <div class="absolute bottom-4 left-4 w-8 h-8 rounded-full border border-stone-900/10 flex items-center justify-center bg-white/40 z-10 group-hover:bg-white">
                                <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                            </div>
                            @if(isset($category['image']) && $category['image'])
                                <img src="{{ asset('storage/' . $category['image']) }}"
                                    class="absolute bottom-0 right-0 w-24 h-24 object-contain rotate-[-10deg] group-hover:rotate-0 transition-transform duration-500"
                                    alt="{{ $category['name'] }}" loading="lazy">
                            @endif
                        </a>
                    @endforeach
                @else
                    <div class="px-4 text-stone-500">No categories found.</div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Product Grid Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900 tracking-tight">All Products</h2>
            
            <!-- Product Count and Filter -->
            <div class="flex items-center gap-4">
                <div class="text-sm text-stone-600 hidden md:block">
                    <span id="product-count">{{ $paginator['total'] ?? 0 }}</span> Products
                </div>
                
                <!-- Sort Dropdown -->
                <form method="GET" action="{{ route('customer.products.list') }}" class="flex items-center">
                    @foreach(request()->except(['sort_by', 'page']) as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                    <select name="sort_by" onchange="this.form.submit()" class="text-sm border-stone-200 rounded-lg focus:ring-brand-500 focus:border-brand-500 py-1.5 pl-3 pr-8">
                        <option value="newest" {{ ($sortBy ?? 'newest') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_asc" {{ ($sortBy ?? '') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ ($sortBy ?? '') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="featured" {{ ($sortBy ?? '') == 'featured' ? 'selected' : '' }}>Featured</option>
                        <option value="popular" {{ ($sortBy ?? '') == 'popular' ? 'selected' : '' }}>Best Selling</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6" id="product-grid">
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

                <div class="product-card group cursor-pointer">
                    <a href="{{ route('customer.products.details', ['slug' => $product['slug']]) }}">
                        <div class="relative {{ $bgColor }} rounded-2xl aspect-[3/4] mb-4 overflow-hidden card-tilt transition-all duration-300 hover:shadow-2xl hover:{{ $shadowColor }}">
                            @if ($badge)
                                <span class="absolute top-4 left-4 {{ $badgeColor }} backdrop-blur text-stone-900 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide z-20">
                                    {{ $badge }}
                                </span>
                            @endif
                            <img src="{{ asset('storage/' . $product['main_image']) }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 z-10"
                                alt="{{ $product['name'] }}" loading="lazy"
                                onerror="this.src='{{ asset('assets/images/placeholder.jpg') }}'">
                            <button
                                class="quick-add-btn absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg translate-y-14 group-hover:translate-y-0 transition-transform duration-300 z-20 hover:bg-stone-900 hover:text-white"
                                data-variant-id="{{ $product['default_variant_id'] ?? $product['id'] }}"
                                onclick="addToCart(event, {{ $product['default_variant_id'] ?? $product['id'] }})">
                                <i data-lucide="plus" class="w-5 h-5 stroke-[1.5]"></i>
                            </button>
                        </div>
                        <div class="space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold tracking-tight text-stone-900 text-lg group-hover:text-brand-500 transition-colors line-clamp-1">
                                    {{ $product['name'] }}
                                </h3>
                                <div class="flex flex-col items-end">
                                    <span class="font-semibold text-stone-900">₹{{ number_format($product['price'], 0) }}</span>
                                    @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                                        <span class="text-xs text-stone-400 line-through">₹{{ number_format($product['compare_price'], 0) }}</span>
                                    @endif
                                </div>
                            </div>
                            <p class="text-xs text-stone-500 line-clamp-1">{{ $product['short_description'] ?? 'Premium Quality Product' }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full py-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-stone-100 mb-4">
                        <i data-lucide="search" class="w-8 h-8 text-stone-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">No products found</h3>
                    <p class="text-stone-500 mt-2">Try adjusting your filters or search criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($paginator['last_page']) && $paginator['last_page'] > 1)
        <div class="mt-12 flex justify-center">
            <div class="flex gap-2">
                <!-- Previous Page -->
                @if ($paginator['current_page'] > 1)
                    <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $paginator['current_page'] - 1])) }}" 
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
                    <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => 1])) }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 text-stone-600 hover:bg-stone-50">1</a>
                    @if($start > 2)
                        <span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $i])) }}"
                       class="w-10 h-10 flex items-center justify-center rounded-full font-medium transition-colors
                              {{ $i == $paginator['current_page'] ? 'bg-stone-900 text-white' : 'border border-stone-200 text-stone-600 hover:bg-stone-50' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($end < $paginator['last_page'])
                    @if($end < $paginator['last_page'] - 1)
                        <span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
                    @endif
                    <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $paginator['last_page']])) }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-stone-200 text-stone-600 hover:bg-stone-50">{{ $paginator['last_page'] }}</a>
                @endif

                <!-- Next Page -->
                @if ($paginator['current_page'] < $paginator['last_page'])
                    <a href="{{ route('customer.products.list', array_merge(request()->query(), ['page' => $paginator['current_page'] + 1])) }}"
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
                // Update cart count in header
                const cartCountEl = document.getElementById('cartCount');
                if (cartCountEl) {
                    cartCountEl.textContent = data.cart_count;
                    cartCountEl.classList.remove('hidden');
                }
                
                // Success state
                btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 text-green-600"></i>';
                lucide.createIcons();
                
                // Reset after delay
                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    lucide.createIcons();
                }, 2000);
            } else {
                // Error handling
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