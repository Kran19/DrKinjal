@extends('customer.layouts.master')

@section('title', 'Profile Settings | Dr. Kinjal')

@push('styles')
<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background-color: #fafafa;
        min-height: 100vh;
    }
    
    .tab-content {
        display: none;
        animation: fadeIn 0.5s ease-out;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .tab-btn.active {
        background-color: #ffffff;
        color: #0891b2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Loading animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .account-container {
            padding: 0 1rem;
        }
        .profile-card {
            padding: 1.5rem !important;
        }
        .stats-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush

@section('content')
<!-- Main Content -->
<main class="flex-grow account-container pt-8 lg:pt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">
        
        <!-- Page Header -->
        <div class="mb-8 lg:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">Profile Settings</h1>
            <p class="text-stone-600">Manage your account information and preferences</p>
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
                            <h2 class="text-xl font-bold text-stone-900">{{ $customer->name }}</h2>
                            <p class="text-stone-500">{{ $customer->email }}</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-semibold rounded-full">
                                Member
                            </span>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">₹{{ number_format($totalSpent, 2) }}</div>
                            <div class="text-sm text-stone-500">Total Spent</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $ordersCount }}</div>
                            <div class="text-sm text-stone-500">Total Orders</div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="space-y-2">
                        <a href="{{ route('customer.account.orders') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="package" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">My Orders</span>
                        </a>
                        
                        <a href="{{ route('customer.account.profile') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-cyan-600 flex items-center gap-3">
                            <i data-lucide="user" class="w-5 h-5 text-cyan-600"></i>
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

            <!-- Right Content Area - Profile Settings -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <h2 class="text-2xl font-bold text-stone-900 mb-6">Profile Information</h2>
                    
                    <form class="space-y-6" action="{{ route('customer.account.profile.update') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">Name</label>
                                <input type="text" name="name" value="{{ $customer->name }}" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">Email Address</label>
                                <input type="email" name="email" value="{{ $customer->email }}" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" readonly>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Phone Number</label>
                            <input type="tel" name="mobile" value="{{ $customer->mobile }}" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" readonly>
                        </div>
                        
                        <div class="pt-6 border-t border-stone-100">
                            <button type="submit" class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer Note -->
<div class="bg-white border-t border-stone-200 py-4 px-4 mt-8">
    <div class="max-w-7xl mx-auto">
        <p class="text-center text-sm text-stone-500">
            Need help with your account? 
            <a href="{{ route('customer.page.contact') }}" class="text-cyan-600 hover:text-cyan-700 font-medium ml-1">Contact our support team</a>
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Skin type selection
    document.addEventListener('DOMContentLoaded', function() {
        // Skin type selection code preserved if needed, though hidden in current view
        const skinTypeRadios = document.querySelectorAll('input[name="skin-type"]');
        skinTypeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Update label styling
                const labels = document.querySelectorAll('label[for^="skin-type"]');
                labels.forEach(label => {
                    label.classList.remove('border-cyan-400', 'bg-cyan-50');
                });
                
                if (this.checked) {
                    this.closest('label').classList.add('border-cyan-400', 'bg-cyan-50');
                }
            });
        });
    });
</script>
@endpush