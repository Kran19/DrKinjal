@extends('customer.layouts.master')

@section('title', 'Saved Addresses | Dr. Kinjal')

@section('styles')
<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background-color: #fafafa;
        min-height: 100vh;
    }
    
    /* Address Card Hover */
    .address-card {
        transition: all 0.3s ease;
    }
    
    .address-card:hover {
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
        
        <!-- Page Header -->
        <div class="mb-8 lg:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">Saved Addresses</h1>
            <p class="text-stone-600">Manage your delivery addresses</p>
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
                            <div class="text-2xl font-bold text-stone-900">3</div>
                            <div class="text-sm text-stone-500">Saved Addresses</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">8</div>
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
                        
                        <a href="{{ route('customer.account.addresses') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-cyan-600 flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-cyan-600"></i>
                            <span class="font-medium">Saved Addresses</span>
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
                
                <!-- Address Tips -->
                <div class="bg-gradient-to-r from-cyan-500 to-teal-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4">Address Tips</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Always include apartment/floor number</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Keep your PIN code accurate</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Update address before placing new orders</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Content Area - Addresses -->
            <div class="lg:col-span-2">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-stone-900">Your Addresses</h2>
                    <button id="add-address-btn" class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors flex items-center gap-2">
                        <i data-lucide="plus" class="w-5 h-5"></i>
                        Add New Address
                    </button>
                </div>
                
                <!-- Addresses List -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Address 1 - Default -->
                    <div class="address-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border-2 border-cyan-400 relative">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-cyan-100 text-cyan-800 text-xs font-semibold rounded-full">
                                Default
                            </span>
                        </div>
                        <div class="mb-4">
                            <h3 class="font-bold text-stone-900 mb-2 flex items-center gap-2">
                                <i data-lucide="home" class="w-5 h-5 text-cyan-600"></i>
                                Home Address
                            </h3>
                            <p class="text-stone-900">Alex Johnson</p>
                            <p class="text-stone-600">123 Main Street, Apt 4B</p>
                            <p class="text-stone-600">Mumbai, Maharashtra 400001</p>
                            <p class="text-stone-600">India</p>
                            <p class="text-stone-600 mt-2">Phone: +91 98765 43210</p>
                        </div>
                        <div class="flex gap-3 pt-4 border-t border-stone-100">
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                                Edit
                            </button>
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                    
                    <!-- Address 2 - Office -->
                    <div class="address-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                        <div class="mb-4">
                            <h3 class="font-bold text-stone-900 mb-2 flex items-center gap-2">
                                <i data-lucide="building" class="w-5 h-5 text-stone-400"></i>
                                Office Address
                            </h3>
                            <p class="text-stone-900">Alex Johnson</p>
                            <p class="text-stone-600">456 Business Park, Floor 8</p>
                            <p class="text-stone-600">Andheri East, Mumbai, Maharashtra 400093</p>
                            <p class="text-stone-600">India</p>
                            <p class="text-stone-600 mt-2">Phone: +91 98765 43210</p>
                        </div>
                        <div class="flex gap-3 pt-4 border-t border-stone-100">
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                                Edit
                            </button>
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Remove
                            </button>
                            <button class="flex-1 px-4 py-2 bg-cyan-50 border border-cyan-200 text-cyan-700 rounded-xl text-sm font-medium hover:bg-cyan-100 flex items-center justify-center gap-2">
                                <i data-lucide="star" class="w-4 h-4"></i>
                                Set Default
                            </button>
                        </div>
                    </div>
                    
                    <!-- Address 3 - Parents -->
                    <div class="address-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border border-stone-100">
                        <div class="mb-4">
                            <h3 class="font-bold text-stone-900 mb-2 flex items-center gap-2">
                                <i data-lucide="users" class="w-5 h-5 text-stone-400"></i>
                                Parents' House
                            </h3>
                            <p class="text-stone-900">Alex Johnson</p>
                            <p class="text-stone-600">789 Green Valley, House No. 12</p>
                            <p class="text-stone-600">Pune, Maharashtra 411001</p>
                            <p class="text-stone-600">India</p>
                            <p class="text-stone-600 mt-2">Phone: +91 98765 43210</p>
                        </div>
                        <div class="flex gap-3 pt-4 border-t border-stone-100">
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                                Edit
                            </button>
                            <button class="flex-1 px-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-2">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Remove
                            </button>
                            <button class="flex-1 px-4 py-2 bg-cyan-50 border border-cyan-200 text-cyan-700 rounded-xl text-sm font-medium hover:bg-cyan-100 flex items-center justify-center gap-2">
                                <i data-lucide="star" class="w-4 h-4"></i>
                                Set Default
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Add Address Form (Hidden by default) -->
                <div id="add-address-form" class="hidden mt-8 bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <h3 class="text-xl font-bold text-stone-900 mb-6">Add New Address</h3>
                    
                    <form class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Address Label</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="address-label" class="mr-2" checked>
                                    <span>Home</span>
                                </label>
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="address-label" class="mr-2">
                                    <span>Office</span>
                                </label>
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="address-label" class="mr-2">
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">First Name</label>
                                <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="First name">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">Last Name</label>
                                <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="Last name">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Street Address</label>
                            <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="Street address, house number">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Apartment, Suite, etc. (Optional)</label>
                            <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="Apartment, suite, unit, etc.">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">City</label>
                                <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="City">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">State</label>
                                <select class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400">
                                    <option value="">Select State</option>
                                    <option value="MH">Maharashtra</option>
                                    <option value="DL">Delhi</option>
                                    <option value="KA">Karnataka</option>
                                    <option value="TN">Tamil Nadu</option>
                                    <option value="GJ">Gujarat</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">PIN Code</label>
                                <input type="text" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="PIN code">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Phone Number</label>
                            <input type="tel" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="Phone number">
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="set-default" class="h-5 w-5">
                            <label for="set-default" class="text-sm text-stone-700 cursor-pointer select-none">Set as default address</label>
                        </div>
                        
                        <div class="pt-6 border-t border-stone-100">
                            <button type="button" class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
                                Save Address
                            </button>
                            <button type="button" id="cancel-add-address" class="px-6 py-3 bg-white border border-stone-200 text-stone-700 font-semibold rounded-xl hover:bg-stone-50 transition-colors ml-3">
                                Cancel
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
            Need help with your addresses? 
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
        // Add Address button
        const addAddressBtn = document.getElementById('add-address-btn');
        const addAddressForm = document.getElementById('add-address-form');
        const cancelAddAddressBtn = document.getElementById('cancel-add-address');
        
        if (addAddressBtn && addAddressForm) {
            addAddressBtn.addEventListener('click', function() {
                addAddressForm.classList.remove('hidden');
                addAddressForm.scrollIntoView({ behavior: 'smooth' });
            });
        }
        
        if (cancelAddAddressBtn && addAddressForm) {
            cancelAddAddressBtn.addEventListener('click', function() {
                addAddressForm.classList.add('hidden');
            });
        }
        
        // Save Address button
        const saveAddressBtn = document.querySelector('button:contains("Save Address")');
        if (saveAddressBtn) {
            saveAddressBtn.addEventListener('click', function() {
                this.innerHTML = '<span>Saving...</span>';
                this.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    alert('Address saved successfully!');
                    this.innerHTML = '<span>Save Address</span>';
                    this.disabled = false;
                    addAddressForm.classList.add('hidden');
                }, 1500);
            });
        }
        
        // Edit and Remove buttons
        const editButtons = document.querySelectorAll('button:contains("Edit")');
        const removeButtons = document.querySelectorAll('button:contains("Remove")');
        const setDefaultButtons = document.querySelectorAll('button:contains("Set Default")');
        
        editButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Edit address form would open here. Backend integration pending.');
            });
        });
        
        removeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove this address?')) {
                    alert('Address removed. Backend integration pending.');
                }
            });
        });
        
        setDefaultButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Address set as default. Backend integration pending.');
            });
        });
    });
</script>
@endsection