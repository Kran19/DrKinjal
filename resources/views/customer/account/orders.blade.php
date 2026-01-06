@extends('customer.layouts.master')

@section('title', 'My Orders | Dr. Kinjal')

@section('styles')
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
    
    /* Loading animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
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
@endsection

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
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">₹12,450</div>
                            <div class="text-sm text-stone-500">Total Spent</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">8</div>
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
                
                <!-- Quick Stats -->
                <div class="bg-gradient-to-r from-cyan-500 to-teal-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4">Order Summary</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span>Pending</span>
                            <span class="font-bold">1</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipped</span>
                            <span class="font-bold">1</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Delivered</span>
                            <span class="font-bold">6</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Cancelled</span>
                            <span class="font-bold">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content Area - Orders -->
            <div class="lg:col-span-2">
                <!-- Order History Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                    <h2 class="text-2xl font-bold text-stone-900">Recent Orders</h2>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                            <i data-lucide="filter" class="w-4 h-4"></i>
                            Filter
                        </button>
                        <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            Export
                        </button>
                    </div>
                </div>
                
                <!-- Search Box -->
                <div class="mb-6">
                    <div class="relative">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                        <input
                            type="text"
                            placeholder="Search orders by ID, product, or date..."
                            class="w-full pl-12 pr-4 py-3 bg-white border border-stone-200 rounded-xl text-stone-900
                                   focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400
                                   transition-all placeholder:text-stone-400"
                        >
                    </div>
                </div>

                <!-- Orders List -->
                <div class="space-y-4">
                    
                    <!-- Order 1 - Delivered -->
                    <div class="order-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="font-bold text-stone-900">ORD-789456</h3>
                                    <span class="status-badge px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-full">
                                        Delivered
                                    </span>
                                </div>
                                <p class="text-sm text-stone-500">Placed on March 15, 2024 • 3 items</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-stone-900">₹2,999</div>
                                <a href="{{ route('customer.account.orders.details', ['id' => 789456]) }}" class="inline-block text-sm text-cyan-600 font-medium hover:text-cyan-700 mt-1 flex items-center gap-1">
                                    View Details
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Order Items Preview -->
                        <div class="flex items-center gap-4 mb-4 overflow-x-auto custom-scrollbar pb-2">
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                            <div class="flex-shrink-0 text-stone-500 text-sm">
                                + 2 more items
                            </div>
                        </div>
                        
                        <!-- Order Actions -->
                        <div class="flex flex-wrap gap-3 pt-4 border-t border-stone-100">
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="truck" class="w-4 h-4"></i>
                                Track Order
                            </button>
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="repeat" class="w-4 h-4"></i>
                                Buy Again
                            </button>
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                                Get Help
                            </button>
                        </div>
                    </div>
                    
                    <!-- Order 2 - Shipped -->
                    <div class="order-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="font-bold text-stone-900">ORD-789123</h3>
                                    <span class="status-badge px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                        Shipped
                                    </span>
                                </div>
                                <p class="text-sm text-stone-500">Placed on March 10, 2024 • 2 items</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-stone-900">₹1,499</div>
                                <a href="{{ route('customer.account.orders.details', ['id' => 789123]) }}" class="inline-block text-sm text-cyan-600 font-medium hover:text-cyan-700 mt-1 flex items-center gap-1">
                                    View Details
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Order Items Preview -->
                        <div class="flex items-center gap-4 mb-4 overflow-x-auto custom-scrollbar pb-2">
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                        </div>
                        
                        <!-- Tracking Info -->
                        <div class="bg-stone-50 p-4 rounded-xl mb-4">
                            <div class="flex items-center gap-3 mb-2">
                                <i data-lucide="truck" class="w-5 h-5 text-blue-500"></i>
                                <span class="font-medium text-sm">Tracking Number: TRK-321654987</span>
                            </div>
                            <div class="w-full bg-white rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full w-3/4"></div>
                            </div>
                            <p class="text-sm text-stone-500 mt-2">Expected delivery: March 18, 2024</p>
                        </div>
                        
                        <!-- Order Actions -->
                        <div class="flex flex-wrap gap-3 pt-4 border-t border-stone-100">
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                View Tracking
                            </button>
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                                Contact Support
                            </button>
                        </div>
                    </div>
                    
                    <!-- Order 3 - Processing -->
                    <div class="order-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="font-bold text-stone-900">ORD-456789</h3>
                                    <span class="status-badge px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full">
                                        Processing
                                    </span>
                                </div>
                                <p class="text-sm text-stone-500">Placed on March 5, 2024 • 1 item</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-stone-900">₹899</div>
                                <a href="{{ route('customer.account.orders.details', ['id' => 456789]) }}" class="inline-block text-sm text-cyan-600 font-medium hover:text-cyan-700 mt-1 flex items-center gap-1">
                                    View Details
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Order Items Preview -->
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex-shrink-0 w-16 h-16 bg-stone-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="package" class="w-6 h-6 text-stone-400"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-stone-900">C-Glow Vitamin C Serum</h4>
                                <p class="text-sm text-stone-500">30ml • Brightening Formula</p>
                            </div>
                        </div>
                        
                        <!-- Order Actions -->
                        <div class="flex flex-wrap gap-3 pt-4 border-t border-stone-100">
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                                Check Status
                            </button>
                            <button class="px-4 py-2 bg-white border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-50 flex items-center gap-2">
                                <i data-lucide="x-circle" class="w-4 h-4"></i>
                                Cancel Order
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center items-center gap-2 mt-8">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-stone-200 hover:bg-stone-50">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-cyan-600 text-white font-medium">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-stone-200 hover:bg-stone-50 font-medium">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-stone-200 hover:bg-stone-50 font-medium">3</button>
                    <span class="px-2">...</span>
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-stone-200 hover:bg-stone-50">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
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

@section('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Order action buttons
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality placeholder
        const searchInput = document.querySelector('input[placeholder*="Search orders"]');
        if (searchInput) {
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    alert(`Searching for: ${this.value}. Backend integration pending.`);
                }
            });
        }
        
        // Filter button
        const filterBtn = document.querySelector('button:contains("Filter")');
        if (filterBtn) {
            filterBtn.addEventListener('click', function() {
                alert('Filter options would appear here. Backend integration pending.');
            });
        }
        
        // Export button
        const exportBtn = document.querySelector('button:contains("Export")');
        if (exportBtn) {
            exportBtn.addEventListener('click', function() {
                alert('Exporting order history. Backend integration pending.');
            });
        }
        
        // Order action buttons
        const orderActionBtns = document.querySelectorAll('.order-card button');
        orderActionBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!this.querySelector('i[data-lucide="chevron-right"]')) {
                    e.preventDefault();
                    const action = this.textContent.trim();
                    alert(`${action} action triggered. Backend integration pending.`);
                }
            });
        });
    });
</script>
@endsection