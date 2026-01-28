@extends('customer.layouts.master')

@section('title', 'My Orders | Dr. Kinjal')

@push('styles')
<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background-color: #fafafa;
        min-height: 100vh;
    }
    
    /* Status Badge Animation */
    .status-badge {
        transition: all 0.3s ease;
    }
    
    .status-badge:hover {
        transform: translateY(-1px);
    }
    
    /* Order Card Hover */
    .order-card {
        transition: all 0.3s ease;
    }
    
    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .account-container {
            padding: 0 1rem;
        }
        .profile-card {
            padding: 1.5rem !important;
        }
        .order-details {
            padding: 1rem !important;
        }
        .stats-grid {
            grid-template-columns: 1fr !important;
        }
    }
    
    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }
</style>
@endpush

@section('content')
<!-- Main Content -->
<main class="flex-grow account-container pt-8 lg:pt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">
        
        <!-- Page Header -->
        <div class="mb-8 lg:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">My Orders</h1>
            <p class="text-stone-600">Track your orders and view order history</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Sidebar - Navigation -->
            <div class="lg:col-span-1">
                <!-- Profile Card -->
                <div class="profile-card bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-100 to-teal-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-8 h-8 text-cyan-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-stone-900">{{ Auth::guard('customer')->user()->name }}</h2>
                            <p class="text-stone-500">{{ strtolower(Auth::guard('customer')->user()->email) }}</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-semibold rounded-full">
                                Member
                            </span>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">₹{{ number_format($totalSpent, 0) }}</div>
                            <div class="text-sm text-stone-500">Total Spent</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $totalOrders }}</div>
                            <div class="text-sm text-stone-500">Total Orders</div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="space-y-2">
                        <a href="{{ route('customer.account.orders') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-cyan-600 flex items-center gap-3">
                            <i data-lucide="package" class="w-5 h-5 text-cyan-600"></i>
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
                        
                        <a href="{{ route('customer.wishlist.index') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="heart" class="w-5 h-5 text-stone-400"></i>
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

            </div>

            <!-- Right Content Area - Orders -->
            <div class="lg:col-span-2">
                <!-- Order History Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                    <h2 class="text-2xl font-bold text-stone-900">Recent Orders</h2>
                    <div class="flex gap-2 relative group">
                        <!-- Simple Filter Links -->
                         <div class="flex flex-wrap gap-2">
                            <a href="{{ route('customer.account.orders') }}" class="px-3 py-1 bg-white border border-stone-200 rounded-lg text-xs font-medium hover:bg-stone-50 {{ !request()->route('status') ? 'bg-cyan-50 border-cyan-200 text-cyan-700' : '' }}">All</a>
                            <a href="{{ route('customer.account.orders.filter', 'confirmed') }}" class="px-3 py-1 bg-white border border-stone-200 rounded-lg text-xs font-medium hover:bg-stone-50 {{ request()->route('status') == 'confirmed' ? 'bg-cyan-50 border-cyan-200 text-cyan-700' : '' }}">Confirmed</a>
                            <a href="{{ route('customer.account.orders.filter', 'shipped') }}" class="px-3 py-1 bg-white border border-stone-200 rounded-lg text-xs font-medium hover:bg-stone-50 {{ request()->route('status') == 'shipped' ? 'bg-cyan-50 border-cyan-200 text-cyan-700' : '' }}">Shipped</a>
                            <a href="{{ route('customer.account.orders.filter', 'delivered') }}" class="px-3 py-1 bg-white border border-stone-200 rounded-lg text-xs font-medium hover:bg-stone-50 {{ request()->route('status') == 'delivered' ? 'bg-cyan-50 border-cyan-200 text-cyan-700' : '' }}">Delivered</a>
                         </div>
                    </div>
                </div>
                
                <!-- Search Box -->
                <div class="mb-6">
                    <form action="{{ route('customer.account.orders') }}" method="GET" class="relative">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search orders by ID..."
                            class="w-full pl-12 pr-4 py-3 bg-white border border-stone-200 rounded-xl text-stone-900
                                   focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400
                                   transition-all placeholder:text-stone-400"
                        >
                    </form>
                </div>

                <!-- Orders List -->
                <div class="space-y-4">
                    @forelse($orders as $order)
                        <div class="order-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="font-bold text-stone-900">{{ $order->order_number }}</h3>
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-amber-100 text-amber-800',
                                                'confirmed' => 'bg-blue-100 text-blue-800',
                                                'processing' => 'bg-indigo-100 text-indigo-800',
                                                'shipped' => 'bg-purple-100 text-purple-800',
                                                'delivered' => 'bg-emerald-100 text-emerald-800',
                                                'cancelled' => 'bg-red-100 text-red-800',
                                                'refunded' => 'bg-gray-100 text-gray-800',
                                                'returned' => 'bg-orange-100 text-orange-800',
                                            ];
                                            $badgeInfo = $statusColors[$order->status] ?? 'bg-stone-100 text-stone-800';
                                        @endphp
                                        <span class="status-badge px-3 py-1 {{ $badgeInfo }} text-xs font-semibold rounded-full">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-stone-500">Placed on {{ $order->created_at->format('F j, Y') }} • {{ $order->items->count() }} items</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-stone-900">₹{{ number_format($order->grand_total, 2) }}</div>
                                    <a href="{{ route('customer.account.orders.details', $order->id) }}" class="inline-block text-sm text-cyan-600 font-medium hover:text-cyan-700 mt-1 flex items-center gap-1">
                                        View Details
                                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Order Items Preview -->
                            <div class="flex items-center gap-4 mb-4 overflow-x-auto custom-scrollbar pb-2">
                                @foreach($order->items->take(3) as $item)
                                    <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center overflow-hidden">
                                        @if($item->product && $item->product->images && count($item->product->images) > 0)
                                             <img src="{{ asset('storage/' . $item->product->images[0]) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                                        @endif
                                    </div>
                                @endforeach
                                
                                @if($order->items->count() > 3)
                                    <div class="flex-shrink-0 text-stone-500 text-sm pl-2">
                                        + {{ $order->items->count() - 3 }} more items
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Order Actions -->
                            <div class="flex flex-wrap gap-3 pt-4 border-t border-stone-100">
                                @if(in_array($order->status, ['shipped', 'delivered']))
                                    <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                        <i data-lucide="truck" class="w-4 h-4"></i>
                                        Track Order
                                    </button>
                                @endif
                                @if($order->status == 'delivered')
                                    <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                        <i data-lucide="repeat" class="w-4 h-4"></i>
                                        Buy Again
                                    </button>
                                @endif
                                <a href="{{ route('customer.page.contact') }}" class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                                    Get Help
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-white rounded-3xl border border-stone-100">
                            <i data-lucide="package-search" class="w-16 h-16 text-stone-300 mx-auto mb-4"></i>
                            <h3 class="text-xl font-bold text-stone-900 mb-2">No orders found</h3>
                            <p class="text-stone-500">You haven't placed any orders yet.</p>
                            <a href="{{ route('customer.products.list') }}" class="inline-block mt-4 px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
                                Start Shopping
                            </a>
                        </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                @if($orders->hasPages())
                    <div class="mt-8">
                        {{ $orders->appends(request()->query())->links() }}
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
            Need help with your orders? 
            <a href="{{ route('customer.page.contact') }}" class="text-cyan-600 hover:text-cyan-700 font-medium ml-1">Contact our support team</a>
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    document.addEventListener('DOMContentLoaded', function() {
        // Any custom JS for orders page
    });
</script>
@endpush

