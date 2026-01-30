@extends('customer.layouts.master')

@section('title', 'My Wishlist | Dr. Kinjal')

@push('styles')
<style>
    body {
        background-color: #fafafa;
    }
    
    .wishlist-item {
        transition: all 0.3s ease;
    }
    
    .wishlist-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .product-image {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }
    
    .product-image img {
        transition: transform 0.5s ease;
    }
    
    .product-image:hover img {
        transform: scale(1.05);
    }
    
    .stock-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 10;
    }
    
    .remove-btn {
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    
    .wishlist-item:hover .remove-btn {
        opacity: 1;
    }
    
    .skeleton-loading {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    
    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
    
    /* Empty state animation */
    .empty-state-illustration {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>
@endpush

@section('content')
<!-- Main Content -->
<main class="flex-grow pt-8 lg:pt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">
        
        <!-- Page Header -->
        <div class="mb-8 lg:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">My Wishlist</h1>
            <p class="text-stone-600">Your saved items for later</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Left Sidebar - Navigation -->
            <div class="lg:col-span-1">
                <!-- Profile Card -->
                <div class="profile-card bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-100 to-rose-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-8 h-8 text-rose-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-stone-900">{{ Auth::guard('customer')->user()->name }}</h2>
                            <p class="text-stone-500">{{ strtolower(Auth::guard('customer')->user()->email) }}</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-rose-100 text-rose-700 text-xs font-semibold rounded-full">
                                Member
                            </span>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $wishlistCount }}</div>
                            <div class="text-sm text-stone-500">Wishlist Items</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $ordersCount ?? 0 }}</div>
                            <div class="text-sm text-stone-500">Total Orders</div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="space-y-2">
                        <a href="{{ route('customer.account.orders') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="package" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">My Orders</span>
                        </a>
                        
                        <a href="{{ route('customer.account.profile') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="user" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Profile Settings</span>
                        </a>
                        
                        <a href="{{ route('customer.account.addresses') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Saved Addresses</span>
                        </a>

                        <a href="{{ route('customer.wishlist.index') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-rose-600 flex items-center gap-3">
                            <i data-lucide="heart" class="w-5 h-5 text-rose-600"></i>
                            <span class="font-medium">Wishlist</span>
                        </a>
                        
                        <a href="{{ route('customer.account.change-password') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="lock" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Change Password</span>
                        </a>
                        
                        <form method="POST" action="{{ route('customer.logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left p-3 rounded-xl hover:bg-red-50 text-red-600 flex items-center gap-3 mt-4">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                                <span class="font-medium">Log Out</span>
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Wishlist Stats -->
                <div class="bg-gradient-to-r from-rose-500 to-pink-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4">Wishlist Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Total Items</span>
                            <span class="text-lg font-bold">{{ $wishlistCount }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Items in Stock</span>
                            @php
                                $inStockCount = $wishlistItems->filter(function($item) {
                                    return ($item->variant->stock_quantity ?? 0) > 0;
                                })->count();
                            @endphp
                            <span class="text-lg font-bold">{{ $inStockCount }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Total Value</span>
                            <span class="text-lg font-bold">₹{{ number_format($totalPrice, 0) }}</span>
                        </div>
                    </div>
                    <form action="{{ route('customer.wishlist.move-all-to-cart') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full mt-6 bg-white text-rose-600 font-semibold py-3 rounded-full hover:bg-stone-50 transition-colors">
                            Move All to Cart
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Content Area - Wishlist Items -->
            <div class="lg:col-span-3">
                <!-- Wishlist Actions -->
                <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-stone-900">Saved Products</h3>
                            <p class="text-stone-500 text-sm">{{ $wishlistCount }} items • Last updated {{ $wishlistItems->first()?->created_at->diffForHumans() ?? 'today' }}</p>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <!-- Select All functionality via JS (visual only if no bulk action) -->
                            <!-- <button id="selectAll" class="px-4 py-2 border border-stone-200 rounded-xl text-stone-700 hover:bg-stone-50 transition-colors">
                                Select All
                            </button> -->
                            
                            <!-- Move All Form -->
                            <form action="{{ route('customer.wishlist.move-all-to-cart') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-xl hover:bg-cyan-700 transition-colors" {{ $wishlistCount == 0 ? 'disabled' : '' }}>
                                    Move All to Cart
                                </button>
                            </form>

                            <!-- Clear All Form -->
                            <form action="{{ route('customer.wishlist.clear') }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to clear your wishlist?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 border border-red-200 text-red-600 rounded-xl hover:bg-red-50 transition-colors" {{ $wishlistCount == 0 ? 'disabled' : '' }}>
                                    Clear All
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Wishlist Items Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="wishlistItems">
                    @forelse($wishlistItems as $item)
                        @php
                            $product = $item->variant->product ?? null;
                            $variant = $item->variant ?? null;
                            $image = $variant ? $variant->display_image : null;
                        @endphp
                        @if($product && $variant)
                        <div class="wishlist-item bg-white rounded-3xl p-4 shadow-lg shadow-stone-200/50 border border-stone-100" data-id="{{ $item->id }}">
                            <div class="relative">
                                <div class="product-image aspect-square rounded-xl bg-stone-100 mb-4">
                                    @if($image)
                                        <img src="{{ asset('storage/' . $image) }}"
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover rounded-xl">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-stone-300">
                                            <i data-lucide="image-off" class="w-10 h-10"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="stock-badge">
                                        @if($variant->stock_quantity > 0)
                                            <span class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">In Stock</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-500 text-white text-xs font-semibold rounded-full">Out of Stock</span>
                                        @endif
                                    </div>
                                    
                                    <form action="{{ route('customer.wishlist.remove') }}" method="POST" class="absolute top-2 right-2">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <button type="submit" class="w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white text-stone-700 hover:text-red-500 transition-colors">
                                            <i data-lucide="x" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h4 class="font-semibold text-stone-900 mb-1 line-clamp-1"><a href="{{ route('customer.products.details', $product->slug) }}">{{ $product->name }}</a></h4>
                                        <p class="text-sm text-stone-500">{{ $variant->name ?? '' }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl font-bold text-stone-900">₹{{ number_format($variant->price, 0) }}</span>
                                    </div>
                                </div>
                                
                                <form action="{{ route('customer.wishlist.move-to-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <button type="submit" class="w-full py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors flex items-center justify-center gap-2" {{ $variant->stock_quantity <= 0 ? 'disabled' : '' }}>
                                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif
                    @empty
                        <!-- Empty state handled by check in controller or just show it below if logic dictates -->
                    @endforelse
                </div>

                <!-- Empty State -->
                @if($wishlistItems->isEmpty())
                <div id="emptyWishlist">
                    <div class="text-center py-16">
                        <div class="empty-state-illustration inline-block mb-8">
                            <i data-lucide="heart" class="w-24 h-24 text-rose-200"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-stone-900 mb-3">Your wishlist is empty</h3>
                        <p class="text-stone-600 mb-8 max-w-md mx-auto">Save products you love to your wishlist. Review them anytime and easily move them to your cart.</p>
                        <a href="{{ route('customer.products.list') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
                            <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                            Start Shopping
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Footer Note -->
<div class="bg-white border-t border-stone-200 py-4 px-4 mt-8">
    <div class="max-w-7xl mx-auto">
        <p class="text-center text-sm text-stone-500">
            Prices and availability are subject to change. 
            <a href="{{ route('customer.page.contact') }}" class="text-cyan-600 hover:text-cyan-700 font-medium ml-1">Contact us</a> for any queries.
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>
@endpush