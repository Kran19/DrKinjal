@extends('customer.layouts.master')

@section('title', 'Order Details | Dr. Kinjal')

@section('styles')
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
@endsection

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
                <p class="text-stone-600">Order #ORD-789456 • Placed on March 15, 2024</p>
            </div>
            <div class="text-right">
                <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 text-sm font-semibold rounded-full">
                    Delivered
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Sidebar - Navigation -->
            <div class="lg:col-span-1">
                <!-- Profile Card -->
                <div class="profile-card bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-6 animate-fade-in">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-100 to-teal-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-8 h-8 text-cyan-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-stone-900">Alex Johnson</h2>
                            <p class="text-stone-500">alex@example.com</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-semibold rounded-full">
                                Premium Member
                            </span>
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

                        <a href="{{ route('customer.wishlist') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="heart" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">wishlist</span>
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
                
                <!-- Order Quick Actions -->
                <div class="bg-gradient-to-r from-cyan-500 to-teal-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4">Order Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="download" class="w-5 h-5"></i>
                            <span>Download Invoice</span>
                        </button>
                        <button class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
                            <span>Request Return</span>
                        </button>
                        <button class="w-full px-4 py-3 bg-white/20 rounded-xl text-left hover:bg-white/30 transition-colors flex items-center gap-3">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span>Contact Support</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Content Area - Order Details -->
            <div class="lg:col-span-2">
                <!-- Order Timeline -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-8">
                    <h2 class="text-xl font-bold text-stone-900 mb-6">Order Status</h2>
                    
                    <div class="space-y-6">
                        <div class="timeline-item completed">
                            <div class="text-sm text-stone-500">March 15, 2024 • 10:30 AM</div>
                            <div class="font-medium text-stone-900">Order Placed</div>
                            <p class="text-sm text-stone-600 mt-1">Your order has been confirmed</p>
                        </div>
                        
                        <div class="timeline-item completed">
                            <div class="text-sm text-stone-500">March 15, 2024 • 2:45 PM</div>
                            <div class="font-medium text-stone-900">Processing</div>
                            <p class="text-sm text-stone-600 mt-1">Your items are being prepared</p>
                        </div>
                        
                        <div class="timeline-item completed">
                            <div class="text-sm text-stone-500">March 16, 2024 • 9:15 AM</div>
                            <div class="font-medium text-stone-900">Shipped</div>
                            <p class="text-sm text-stone-600 mt-1">Your order is on the way</p>
                        </div>
                        
                        <div class="timeline-item active">
                            <div class="text-sm text-stone-500">March 17, 2024 • 3:20 PM</div>
                            <div class="font-medium text-stone-900">Out for Delivery</div>
                            <p class="text-sm text-stone-600 mt-1">Your order will be delivered today</p>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="text-sm text-stone-500">Expected</div>
                            <div class="font-medium text-stone-900">Delivered</div>
                            <p class="text-sm text-stone-600 mt-1">Order will be delivered to your address</p>
                        </div>
                    </div>
                </div>
                
                <!-- Order Items -->
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-8">
                    <h2 class="text-xl font-bold text-stone-900 mb-6">Order Items (3 items)</h2>
                    
                    <div class="space-y-6">
                        <!-- Item 1 -->
                        <div class="flex flex-col md:flex-row gap-6 pb-6 border-b border-stone-100">
                            <div class="flex-shrink-0">
                                <div class="w-24 h-24 bg-stone-100 rounded-xl flex items-center justify-center">
                                    <i data-lucide="package" class="w-8 h-8 text-stone-400"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-stone-900 mb-1">C-Glow Vitamin C Serum</h3>
                                <p class="text-sm text-stone-600 mb-2">30ml • Brightening Formula • For all skin types</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-stone-500">Quantity: 1</span>
                                        <span class="mx-2 text-stone-300">•</span>
                                        <span class="text-sm text-stone-500">Price: ₹1,299</span>
                                    </div>
                                    <div class="text-lg font-bold text-stone-900">₹1,299</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="flex flex-col md:flex-row gap-6 pb-6 border-b border-stone-100">
                            <div class="flex-shrink-0">
                                <div class="w-24 h-24 bg-stone-100 rounded-xl flex items-center justify-center">
                                    <i data-lucide="package" class="w-8 h-8 text-stone-400"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-stone-900 mb-1">Hydra-Boost Moisturizer</h3>
                                <p class="text-sm text-stone-600 mb-2">50ml • Intense Hydration • For dry skin</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-stone-500">Quantity: 1</span>
                                        <span class="mx-2 text-stone-300">•</span>
                                        <span class="text-sm text-stone-500">Price: ₹899</span>
                                    </div>
                                    <div class="text-lg font-bold text-stone-900">₹899</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 3 -->
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-24 h-24 bg-stone-100 rounded-xl flex items-center justify-center">
                                    <i data-lucide="package" class="w-8 h-8 text-stone-400"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-stone-900 mb-1">SunShield SPF 50+</h3>
                                <p class="text-sm text-stone-600 mb-2">30ml • PA++++ • Non-greasy formula</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-sm text-stone-500">Quantity: 1</span>
                                        <span class="mx-2 text-stone-300">•</span>
                                        <span class="text-sm text-stone-500">Price: ₹799</span>
                                    </div>
                                    <div class="text-lg font-bold text-stone-900">₹799</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary & Shipping Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Order Summary -->
                    <div class="order-summary bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                        <h2 class="text-xl font-bold text-stone-900 mb-6">Order Summary</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-stone-600">Subtotal (3 items)</span>
                                <span class="font-medium text-stone-900">₹2,997</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Shipping</span>
                                <span class="font-medium text-stone-900">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Discount</span>
                                <span class="font-medium text-emerald-600">-₹149.85</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-600">Tax</span>
                                <span class="font-medium text-stone-900">₹227.79</span>
                            </div>
                            <div class="pt-4 border-t border-stone-100">
                                <div class="flex justify-between text-lg font-bold text-stone-900">
                                    <span>Total</span>
                                    <span>₹3,074.94</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-stone-100">
                            <div class="text-sm text-stone-600 mb-2">Payment Method</div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-cyan-100 rounded flex items-center justify-center">
                                    <i data-lucide="credit-card" class="w-4 h-4 text-cyan-600"></i>
                                </div>
                                <span class="font-medium text-stone-900">Credit Card ending in 4242</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Information -->
                    <div class="order-summary bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                        <h2 class="text-xl font-bold text-stone-900 mb-6">Shipping Information</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-stone-600 mb-1">Shipping Address</div>
                                <div class="font-medium text-stone-900">Alex Johnson</div>
                                <p class="text-sm text-stone-600">123 Main Street, Apt 4B</p>
                                <p class="text-sm text-stone-600">Mumbai, Maharashtra 400001</p>
                                <p class="text-sm text-stone-600">India</p>
                                <p class="text-sm text-stone-600 mt-2">Phone: +91 98765 43210</p>
                            </div>
                            
                            <div class="pt-4 border-t border-stone-100">
                                <div class="text-sm text-stone-600 mb-1">Shipping Method</div>
                                <div class="font-medium text-stone-900">Standard Shipping</div>
                                <p class="text-sm text-stone-600">Estimated delivery: 5-7 business days</p>
                            </div>
                            
                            <div class="pt-4 border-t border-stone-100">
                                <div class="text-sm text-stone-600 mb-1">Tracking Information</div>
                                <div class="font-medium text-stone-900">TRK-321654987</div>
                                <p class="text-sm text-stone-600">Delivered on March 17, 2024 at 4:30 PM</p>
                            </div>
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

@section('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    document.addEventListener('DOMContentLoaded', function() {
        // Order action buttons
        const actionButtons = document.querySelectorAll('.bg-white\\/20 button');
        actionButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.textContent.trim();
                alert(`${action} action triggered. Backend integration pending.`);
            });
        });
        
        // Back button
        const backButton = document.querySelector('a:contains("Back to Orders")');
        if (backButton) {
            backButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.history.back();
            });
        }
    });
</script>
@endsection