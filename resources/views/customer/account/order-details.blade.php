@extends('customer.layouts.master')

@section('title', 'Order Details | Dr. Kinjal')

@push('styles')
<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background-color: #fafafa;
        min-height: 100vh;
    }
    
    /* Timeline */
    .timeline-item {
        position: relative;
        padding-left: 2rem;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #cbd5e1;
    }
    
    .timeline-item.active::before {
        background-color: #06b6d4;
        box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.2);
    }
    
    .timeline-item.completed::before {
        background-color: #10b981;
    }
    
    .timeline-item::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 12px;
        bottom: -1.5rem;
        width: 2px;
        background-color: #e2e8f0;
    }
    
    .timeline-item:last-child::after {
        display: none;
    }
    
    .timeline-item.completed::after {
        background-color: #10b981;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .account-container {
            padding: 0 1rem;
        }
        .profile-card {
            padding: 1.5rem !important;
        }
        .order-summary {
            padding: 1rem !important;
        }
    }

    /* Loading animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
@endpush

@section('content')
<!-- Main Content -->
<main class="flex-grow account-container pt-8 lg:pt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">

        <!-- Page Header with Back Button -->
        <div class="mb-8 lg:mb-12 flex items-center justify-between">
            <div>
                <a href="{{ route('customer.account.orders') }}" class="inline-flex items-center gap-2 text-cyan-600 hover:text-cyan-700 mb-4">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    <span>Back to Orders</span>
                </a>
                <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">Order Details</h1>
                <p class="text-stone-600">Order #{{ $order->order_number }} • Placed on {{ $order->created_at->format('F j, Y') }}</p>
            </div>
            <div class="text-right">
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
                <span class="inline-block px-4 py-2 {{ $badgeInfo }} text-sm font-semibold rounded-full">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
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
                            <span class="font-medium">wishlist</span>
                        </a>

                        <a href="{{ route('customer.forgot-password') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
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

                <!-- Order Quick Actions -->
                <div class="bg-gradient-to-r from-cyan-500 to-teal-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4">Order Actions</h3>
                    <div class="space-y-3">
                        <!-- <a href="{{ route('customer.account.orders.download-invoice', $order->id) }}" class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="download" class="w-5 h-5"></i>
                            <span>Download Invoice</span>
                        </a> -->
                        @if($order->status == 'delivered')
                        <a href="{{ route('customer.page.contact') }}" class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
                            <span>Request Return</span>
                        </a>
                        @endif
                        <a href="{{ route('customer.page.contact') }}" class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span>Contact Support</span>
                        </a>

                        @if(in_array($order->status, ['pending', 'confirmed']))
                            <!-- <div class="pt-2"> -->
                                <!-- <form action="{{ route('customer.account.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                    @csrf
                                    <input type="hidden" name="cancellation_reason" value="Cancelled by customer">
                                    <button type="submit" class="w-full px-4 py-3 bg-red-500/80 rounded-xl text-left hover:bg-red-600/80 transition-colors flex items-center gap-3">
                                        <i data-lucide="x-circle" class="w-5 h-5"></i>
                                        <span>Cancel Order</span>
                                    </button>
                                </form>
                            </div> -->
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Content Area - Order Details -->
            <div class="lg:col-span-2">
                <!-- Order Timeline -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-8">
                    <h2 class="text-xl font-bold text-stone-900 mb-6">Order History</h2>

                    <div class="space-y-6">
                        @forelse($statusHistory as $history)
                            <div class="timeline-item completed">
                                <div class="text-sm text-stone-500">{{ $history->created_at->format('F j, Y • g:i A') }}</div>
                                <div class="font-medium text-stone-900">{{ ucfirst($history->status) }}</div>
                                @if($history->notes)
                                    <p class="text-sm text-stone-600 mt-1">{{ $history->notes }}</p>
                                @endif
                            </div>
                        @empty
                            <div class="timeline-item completed">
                                <div class="text-sm text-stone-500">{{ $order->created_at->format('F j, Y • g:i A') }}</div>
                                <div class="font-medium text-stone-900">Order Placed</div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-8">
                    <h2 class="text-xl font-bold text-stone-900 mb-6">Order Items ({{ $order->items->count() }} items)</h2>

                    <div class="space-y-6">
                        @foreach($order->items as $item)
                        <div class="flex flex-col md:flex-row gap-6 pb-6 border-b border-stone-100 last:border-0 last:pb-0">
                            <div class="flex-shrink-0">
                                <div class="w-24 h-24 bg-stone-100 rounded-xl flex items-center justify-center overflow-hidden">
                                     @if($item->variant && $item->variant->display_image)
                                          <img src="{{ asset('storage/' . $item->variant->display_image) }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                     @else
                                        <i data-lucide="package" class="w-8 h-8 text-stone-400"></i>
                                     @endif
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-stone-900 mb-1">{{ $item->product->name ?? 'Product Unavailable' }}</h3>
                                 @if($item->variant_info)
                                    <p class="text-sm text-stone-600 mb-2">{{ $item->variant_info }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-stone-500">Quantity: {{ $item->quantity }}</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Summary & Shipping Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Order Summary -->
                    <div class="order-summary bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                        <h2 class="text-xl font-bold text-stone-900 mb-6">Order Summary</h2>

                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-stone-600">Subtotal</span>
                                <span class="font-medium text-stone-900">₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Shipping</span>
                                <span class="font-medium text-stone-900">₹{{ number_format($order->shipping_cost, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Discount</span>
                                <span class="font-medium text-emerald-600">-₹{{ number_format($order->discount, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Tax</span>
                                <span class="font-medium text-stone-900">₹{{ number_format($order->tax, 2) }}</span>
                            </div>
                            <div class="pt-4 border-t border-stone-100">
                                <div class="flex justify-between text-lg font-bold text-stone-900">
                                    <span>Total</span>
                                    <span>₹{{ number_format($order->grand_total, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-stone-100">
                            <div class="text-sm text-stone-600 mb-2">Payment Method</div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-cyan-100 rounded flex items-center justify-center">
                                    <i data-lucide="credit-card" class="w-4 h-4 text-cyan-600"></i>
                                </div>
                                <span class="font-medium text-stone-900">{{ ucfirst($order->payment_method) }}</span>
                            </div>
                             <div class="mt-2 text-sm text-stone-500">
                                Status: {{ ucfirst($order->payment_status) }}
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="order-summary bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                        <h2 class="text-xl font-bold text-stone-900 mb-6">Shipping Information</h2>

                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-stone-600 mb-1">Shipping Address</div>
                                @if($shippingAddress)
                                    <div class="font-medium text-stone-900">{{ $shippingAddress['name'] ?? 'N/A' }}</div>
                                    <p class="text-sm text-stone-600">{{ $shippingAddress['address'] ?? '' }}</p>
                                    @if(!empty($shippingAddress['address2']))
                                        <p class="text-sm text-stone-600">{{ $shippingAddress['address2'] }}</p>
                                    @endif
                                    <p class="text-sm text-stone-600">{{ $shippingAddress['city'] ?? '' }}, {{ $shippingAddress['state'] ?? '' }} {{ $shippingAddress['pincode'] ?? '' }}</p>
                                    <p class="text-sm text-stone-600">India</p> <!-- Assuming India -->
                                    <p class="text-sm text-stone-600 mt-2">Phone: {{ $shippingAddress['phone'] ?? 'N/A' }}</p>
                                @else
                                    <p class="text-sm text-stone-500">Address not available</p>
                                @endif
                            </div>

                            <div class="pt-4 border-t border-stone-100">
                                <div class="text-sm text-stone-600 mb-1">Shipping Method</div>
                                <div class="font-medium text-stone-900">Standard Shipping</div>
                            </div>

                            @if($order->tracking_number)
                            <div class="pt-4 border-t border-stone-100">
                                <div class="text-sm text-stone-600 mb-1">Tracking Information</div>
                                <div class="font-medium text-stone-900">{{ $order->tracking_number }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer Note -->
<div class="bg-white border-t border-stone-200 py-4 px-4 mt-8">
    <div class="max-w-7xl mx-auto">
        <p class="text-center text-sm text-stone-500">
            Need help with this order?
            <a href="{{ route('customer.page.contact') }}" class="text-cyan-600 hover:text-cyan-700 font-medium ml-1">Contact our support team</a>
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