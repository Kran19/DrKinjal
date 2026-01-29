@extends('customer.layouts.master')

@section('title', 'Saved Addresses | Dr. Kinjal')

@push('styles')
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
</style>
@endpush

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
                <div class="profile-card bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-100 to-teal-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-8 h-8 text-cyan-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-stone-900">{{ $customer->name }}</h2>
                            <p class="text-stone-500">{{ strtolower($customer->email) }}</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-semibold rounded-full">
                                Member
                            </span>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $addresses->count() }}</div>
                            <div class="text-sm text-stone-500">Saved Addresses</div>
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
                        
                        <a href="{{ route('customer.account.addresses') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-cyan-600 flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-cyan-600"></i>
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

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Addresses List -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($addresses as $address)
                        <div class="address-card bg-white rounded-3xl p-6 shadow-lg shadow-stone-200/30 border-2 {{ $address->is_default ? 'border-cyan-400' : 'border-stone-100' }} relative">
                            @if($address->is_default)
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-cyan-100 text-cyan-800 text-xs font-semibold rounded-full">
                                        Default
                                    </span>
                                </div>
                            @endif
                            <div class="mb-4">
                                <h3 class="font-bold text-stone-900 mb-2 flex items-center gap-2">
                                    @if(strtolower($address->type) == 'home')
                                        <i data-lucide="home" class="w-5 h-5 text-cyan-600"></i>
                                    @elseif(strtolower($address->type) == 'office')
                                        <i data-lucide="building" class="w-5 h-5 text-cyan-600"></i>
                                    @else
                                        <i data-lucide="map-pin" class="w-5 h-5 text-cyan-600"></i>
                                    @endif
                                    {{ ucfirst($address->type) }}
                                </h3>
                                <p class="text-stone-900 font-medium">{{ $address->name }}</p>
                                <p class="text-stone-600">{{ $address->address }}</p>
                                <p class="text-stone-600">{{ $address->city }}, {{ $address->state }} {{ $address->pincode }}</p>
                                <p class="text-stone-600">{{ $address->country }}</p>
                                <p class="text-stone-600 mt-2">Phone: {{ $address->mobile }}</p>
                            </div>
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-stone-100">
                                <button onclick="editAddress({{ json_encode($address) }})" class="flex-1 px-3 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 flex items-center justify-center gap-1">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                    Edit
                                </button>
                                
                                <form action="{{ route('customer.account.addresses.delete', $address->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-3 py-2 bg-stone-50 border border-stone-200 rounded-xl text-sm font-medium hover:bg-stone-100 text-red-600 flex items-center justify-center gap-1">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        Remove
                                    </button>
                                </form>

                                @if(!$address->is_default)
                                    <form action="{{ route('customer.account.addresses.set-default', $address->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full px-3 py-2 bg-cyan-50 border border-cyan-200 text-cyan-700 rounded-xl text-sm font-medium hover:bg-cyan-100 flex items-center justify-center gap-1">
                                            <i data-lucide="star" class="w-4 h-4"></i>
                                            Default
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 text-center py-12 bg-white rounded-3xl border border-stone-100">
                            <i data-lucide="map-pin-off" class="w-12 h-12 text-stone-300 mx-auto mb-4"></i>
                            <h3 class="text-lg font-bold text-stone-900 mb-2">No addresses saved</h3>
                            <p class="text-stone-500 mb-6">Add an address to make checkout faster.</p>
                            <button onclick="document.getElementById('add-address-btn').click()" class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
                                Add New Address
                            </button>
                        </div>
                    @endforelse
                </div>
                
                <!-- Add/Edit Address Form (Hidden by default) -->
                <div id="address-form-container" class="hidden mt-8 bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <h3 id="form-title" class="text-xl font-bold text-stone-900 mb-6">Add New Address</h3>
                    
                    <form id="address-form" action="{{ route('customer.account.addresses.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="country" value="IN"> <!-- Default to India -->

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Address Label</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="type" value="Home" class="mr-2" checked>
                                    <span>Home</span>
                                </label>
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="type" value="Office" class="mr-2">
                                    <span>Office</span>
                                </label>
                                <label class="flex items-center p-3 border border-stone-200 rounded-xl cursor-pointer hover:bg-stone-50">
                                    <input type="radio" name="type" value="Other" class="mr-2">
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">Full Name</label>
                                <input type="text" name="name" id="field-name" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="Enter Full Name" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">Phone Number</label>
                                <input type="tel" name="mobile" id="field-mobile" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="10-digit mobile number" required>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Street Address</label>
                            <input type="text" name="address" id="field-address" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="House/Flat No, Building, Street" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">City</label>
                                <input type="text" name="city" id="field-city" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="City" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">State</label>
                                <select name="state" id="field-state" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" required>
                                    <option value="">Select State</option>
                                    @php
                                        $states = [
                                            'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh', 'Goa', 'Gujarat', 
                                            'Haryana', 'Himachal Pradesh', 'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh', 
                                            'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 
                                            'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 
                                            'Uttarakhand', 'West Bengal', 'Delhi'
                                        ];
                                    @endphp
                                    @foreach($states as $state)
                                        <option value="{{ $state }}">{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">PIN Code</label>
                                <input type="text" name="pincode" id="field-pincode" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400" placeholder="PIN code" required>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="is_default" id="field-is_default" value="1" class="h-5 w-5 accent-cyan-600">
                            <label for="field-is_default" class="text-sm text-stone-700 cursor-pointer select-none">Set as default address</label>
                        </div>
                        
                        <div class="pt-6 border-t border-stone-100">
                            <button type="submit" class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors">
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

@push('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Store route for reset
    const storeRoute = "{{ route('customer.account.addresses.store') }}";

    function editAddress(address) {
        // Show form
        const formContainer = document.getElementById('address-form-container');
        formContainer.classList.remove('hidden');
        formContainer.scrollIntoView({ behavior: 'smooth' });
        
        // Update Title
        document.getElementById('form-title').innerText = 'Edit Address';
        
        // Populate fields
        document.getElementById('field-name').value = address.name;
        document.getElementById('field-mobile').value = address.mobile;
        document.getElementById('field-address').value = address.address;
        document.getElementById('field-city').value = address.city;
        document.getElementById('field-state').value = address.state;
        document.getElementById('field-pincode').value = address.pincode;
        
        // Radio button for type
        const radios = document.getElementsByName('type');
        radios.forEach(radio => {
            if (radio.value === address.type) {
                radio.checked = true;
            }
        });

        // Checkbox
        document.getElementById('field-is_default').checked = address.is_default == 1;
        
        // Update Form Action
        const form = document.getElementById('address-form');
        // Construct update URL: replace integer ID in route
        // Assuming route is '.../addresses/{id}'
        // We can construct it manually or use a JS variable base
        // Let's use a base URL approach
        const updateBaseUrl = "{{ url('customer/account/addresses') }}";
        form.action = updateBaseUrl + '/' + address.id;
        
        // Set Method to PUT
        document.getElementById('form-method').value = 'PUT';
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Add Address button
        const addAddressBtn = document.getElementById('add-address-btn');
        const formContainer = document.getElementById('address-form-container');
        const cancelAddAddressBtn = document.getElementById('cancel-add-address');
        const form = document.getElementById('address-form');
        
        if (addAddressBtn && formContainer) {
            addAddressBtn.addEventListener('click', function() {
                // Reset form
                form.reset();
                form.action = storeRoute;
                document.getElementById('form-method').value = 'POST';
                document.getElementById('form-title').innerText = 'Add New Address';
                
                formContainer.classList.remove('hidden');
                formContainer.scrollIntoView({ behavior: 'smooth' });
            });
        }
        
        if (cancelAddAddressBtn && formContainer) {
            cancelAddAddressBtn.addEventListener('click', function() {
                formContainer.classList.add('hidden');
            });
        }
    });
</script>
@endpush