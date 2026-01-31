@extends('customer.layouts.master')

@section('title', 'Order Confirmed | Dr. Kinjal Skincare')

@section('content')
<div class="min-h-[70vh] flex flex-col items-center justify-center py-20 px-6">
    <div class="max-w-3xl w-full">
        <!-- Success Animation -->
        <div class="text-center mb-12 fade-in">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-soft">
                <i data-lucide="check" class="w-12 h-12 text-green-500"></i>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Order Confirmed!</h1>
            <p class="text-gray-500 text-lg">Thank you for your purchase. Your order has been placed successfully.</p>
             <p class="text-gray-400 mt-2">Order #{{ $order->order_number }}</p>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white rounded-3xl border border-sky-50 shadow-xl overflow-hidden fade-in" style="animation-delay: 0.15s">
            <div class="p-8 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">Order Date</span>
                    <span class="font-medium text-gray-900">{{ $order->created_at->format('M d, Y, h:i A') }}</span>
                </div>
                <div>
                     <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">Payment Method</span>
                     <span class="font-medium text-gray-900 capitalize">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Online Payment' }}</span>
                     <span class="px-2 py-0.5 rounded text-xs font-medium {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} ml-2">
                        {{ ucfirst($order->payment_status) }}
                     </span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">Total Amount</span>
                    <span class="font-bold text-xl text-[#0ea5e9]">₹{{ number_format($order->grand_total, 2) }}</span>
                </div>
            </div>

            <div class="p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Order Items</h3>
                <div class="space-y-6">
                    @foreach($order->items as $item)
                    <div class="flex gap-4 items-start">
                         <!-- Ideally order items should have image URL stored, or relation to product variant images -->
                         @php
                            $image = asset('storage/assets/images/placeholder.jpg');
                            if($item->variant && $item->variant->product && $item->variant->product->main_image) {
                                $image = asset('storage/' . $item->variant->product->main_image);
                            }
                         @endphp
                        <div class="w-16 h-16 bg-slate-50 rounded-lg overflow-hidden shrink-0 border border-slate-100">
                            <img src="{{ $image }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">{{ $item->product_name }}</h4>
                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }} × ₹{{ number_format($item->unit_price, 2) }}</p>
                        </div>
                        <div class="text-right font-medium text-gray-900">
                            ₹{{ number_format($item->total, 2) }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="h-px bg-gray-100 my-8"></div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-gray-400"></i>
                            Shipping Address
                        </h4>
                        <address class="not-italic text-sm text-gray-600 space-y-1">
                            <p class="font-medium text-gray-900">{{ $order->shipping_address['name'] ?? '' }}</p>
                            <p>{{ $order->shipping_address['address'] ?? '' }}</p>
                            <p>{{ $order->shipping_address['address2'] ?? '' }}</p>
                            <p>{{ $order->shipping_address['city'] ?? '' }}, {{ $order->shipping_address['state'] ?? '' }} {{ $order->shipping_address['pincode'] ?? '' }}</p>
                            <p>{{ $order->shipping_address['country'] ?? '' }}</p>
                            <p class="mt-2 text-gray-500">Phone: {{ $order->shipping_address['phone'] ?? '' }}</p>
                        </address>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Order Summary</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>₹{{ number_format($order->shipping_total, 2) }}</span>
                            </div>
                             <div class="flex justify-between text-gray-600">
                                <span>Tax</span>
                                <span>₹{{ number_format($order->tax_total, 2) }}</span>
                            </div>
                            @if($order->discount_total > 0)
                            <div class="flex justify-between text-green-600">
                                <span>Discount</span>
                                <span>-₹{{ number_format($order->discount_total, 2) }}</span>
                            </div>
                            @endif
                            <div class="pt-2 mt-2 border-t border-gray-100 flex justify-between font-bold text-gray-900 rounded-lg bg-slate-50 p-2">
                                <span>Total Paid</span>
                                <span>₹{{ number_format($order->grand_total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center space-y-4">
             <a href="{{ route('customer.products.list') }}" class="inline-flex items-center justify-center px-8 py-4 bg-[#0f172a] text-white rounded-full text-base font-medium hover:bg-[#0ea5e9] hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 shadow-lg shadow-sky-100">
                Continue Shopping
            </a>
            <p class="text-sm text-gray-500">Need help? <a href="{{ route('customer.page.contact') }}" class="text-[#0ea5e9] hover:underline">Contact Support</a></p>
        </div>
    </div>
</div>

<style>
    @keyframes bounce-soft {
        0%, 100% { transform: translateY(-5%); }
        50% { transform: translateY(0); }
    }
    .animate-bounce-soft {
        animation: bounce-soft 2s infinite;
    }
    .fade-in {
        animation: fadeIn 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endpush
