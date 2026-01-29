@extends('customer.layouts.master')

@section('title', 'Checkout | Dr. Kinjal Skincare')

@push('styles')
<style>
    body {
        font-family: 'DM Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .step-complete { background-color: #10b981; color: white; }
    .step-active { background-color: #0ea5e9; color: white; }
</style>
@endpush

@section('content')
<!-- Checkout Progress -->
<div class="py-6 px-6 max-w-7xl mx-auto">
    <div class="flex justify-center">
        <div class="flex items-center gap-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('customer.cart') }}" class="w-8 h-8 rounded-full step-complete flex items-center justify-center hover:opacity-80 transition-opacity">
                    <span class="sr-only">Cart</span>
                    <i data-lucide="check" class="w-4 h-4"></i>
                </a>
                <span class="text-sm font-medium text-gray-900">Cart</span>
            </div>
            <div class="w-12 h-0.5 bg-green-500"></div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full step-active flex items-center justify-center">
                    <span>2</span>
                </div>
                <span class="text-sm font-medium text-gray-900">Information</span>
            </div>
            <div class="w-12 h-0.5 bg-gray-200"></div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                    <span>3</span>
                </div>
                <span class="text-sm font-medium text-gray-400">Payment</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Checkout Content -->
<main class="py-8 px-6 max-w-7xl mx-auto">
    @if(session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center gap-2">
            <i data-lucide="alert-circle" class="w-5 h-5"></i>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <form id="checkout-form" action="{{ route('customer.checkout.process') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">
        @csrf
        
        <!-- Left Column: Forms -->
        <div class="lg:col-span-8 space-y-8 fade-in">
            
            <!-- Contact Information -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-2 flex items-center gap-2">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                    Contact Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                        <input type="text" name="first_name" required value="{{ old('first_name', Auth::guard('customer')->user()->first_name ?? '') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                        @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                        <input type="text" name="last_name" required value="{{ old('last_name', Auth::guard('customer')->user()->last_name ?? '') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                         @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                         <!-- Combine Full Name for Controller Validation if needed, or keeping separate -->
                         <input type="hidden" name="full_name" id="full_name" value="{{ old('full_name', (Auth::guard('customer')->user()->first_name ?? '') . ' ' . (Auth::guard('customer')->user()->last_name ?? '')) }}">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" name="email" required value="{{ old('email', Auth::guard('customer')->user()->email ?? '') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" name="phone" required value="{{ old('phone', Auth::guard('customer')->user()->mobile ?? '') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Saved Addresses (if any) -->
             @if($addresses && $addresses->count() > 0)
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                 <h2 class="text-xl font-semibold tracking-tight mb-4 flex items-center gap-2">
                    <i data-lucide="bookmark" class="w-5 h-5"></i>
                    Saved Addresses
                </h2>
                <div class="grid gap-4">
                    @foreach($addresses as $addr)
                    <label class="flex items-start gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-[#0ea5e9] transition-colors relative">
                        <input type="radio" name="selected_address" value="{{ $addr->id }}" class="mt-1 text-[#0ea5e9] focus:ring-[#0ea5e9]" onclick="fillAddress({{ json_encode($addr) }})">
                        <div>
                            <span class="block font-medium text-gray-900">{{ $addr->type }}</span>
                            <span class="block text-sm text-gray-600">{{ $addr->address_line1 }}, {{ $addr->address_line2 }}</span>
                            <span class="block text-sm text-gray-600">{{ $addr->city }}, {{ $addr->state }} - {{ $addr->pincode }}</span>
                        </div>
                    </label>
                    @endforeach
                     <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-[#0ea5e9] transition-colors">
                        <input type="radio" name="selected_address" value="new" class="text-[#0ea5e9] focus:ring-[#0ea5e9]" checked onclick="clearAddress()">
                        <span class="font-medium text-gray-900">Use a new address</span>
                    </label>
                </div>
            </div>
            @endif

            <!-- Shipping Address -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-2 flex items-center gap-2">
                    <i data-lucide="map-pin" class="w-5 h-5"></i>
                    Shipping Address
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Street Address *</label>
                        <input type="text" name="address" id="address" required value="{{ old('address') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="123 Main Street">
                        @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apartment, Suite, etc.</label>
                        <input type="text" name="address2" id="address2" value="{{ old('address2') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                        <input type="text" name="city" id="city" required value="{{ old('city') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                    </div>
                    <div>
                         <label class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                        <input type="text" name="state" id="state" required value="{{ old('state') }}"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">PIN Code *</label>
                        <input type="text" name="pincode" id="pincode" required value="{{ old('pincode') }}" maxlength="6"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                         <p id="pincode-msg" class="text-xs mt-1 hidden"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                        <input type="text" name="country" required value="India" readonly
                               class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm outline-none text-gray-500 cursor-not-allowed">
                    </div>
                </div>

                @if(Auth::guard('customer')->check())
                <div class="flex items-center gap-3 mt-6 pt-6 border-t border-gray-100">
                    <div class="relative flex items-center">
                        <input type="checkbox" name="save_address" id="save-address" value="1" class="peer h-5 w-5 cursor-pointer appearance-none rounded-md border-2 border-gray-300 transition-all checked:border-[#0ea5e9] checked:bg-[#0ea5e9] hover:border-gray-400">
                        <i data-lucide="check" class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100 w-3 h-3"></i>
                    </div>
                    <label for="save-address" class="text-sm text-gray-700 cursor-pointer select-none">Save this address for future orders</label>
                </div>
                @endif
            </div>

            <!-- Shipping Method (Shiprocket Integrated) -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]" id="shipping-section">
                <h2 class="text-xl font-semibold tracking-tight mb-6 flex items-center gap-2">
                    <i data-lucide="truck" class="w-5 h-5"></i>
                    Shipping Method
                </h2>
                
                <div id="shipping-options" class="space-y-4">
                    <div class="p-4 bg-gray-50 rounded-xl text-center text-gray-500 text-sm">
                        Please enter your PIN code to see available shipping options.
                    </div>
                </div>
                <input type="hidden" name="shipping_cost" id="shipping_cost" value="0">
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-6 flex items-center gap-2">
                    <i data-lucide="credit-card" class="w-5 h-5"></i>
                    Payment Method
                </h2>
                
                <div class="space-y-4">
                    <!-- Online Payment -->
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment_method" value="online" checked class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <i data-lucide="credit-card" class="text-blue-600 w-4 h-4"></i>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-900 block">Pay Online</span>
                                    <span class="text-xs text-gray-500">Credit/Debit Card, UPI, NetBanking</span>
                                </div>
                            </div>
                        </div>
                    </label>

                    <!-- COD -->
                    @if($codAvailable)
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment_method" value="cod" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-yellow-100 rounded flex items-center justify-center">
                                    <i data-lucide="package" class="text-yellow-600 w-4 h-4"></i>
                                </div>
                                <span class="font-medium text-gray-900">Cash on Delivery</span>
                            </div>
                        </div>
                    </label>
                    @endif
                </div>
            </div>

            <!-- Order Notes -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-4 flex items-center gap-2">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                    Order Notes (Optional)
                </h2>
                <textarea name="notes"
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all min-h-[120px]"
                    placeholder="Special instructions for your order..."></textarea>
            </div>
        </div>

        <!-- Right Column: Order Summary -->
        <div class="lg:col-span-4 fade-in">
            <div class="sticky top-32">
                <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                    <h2 class="text-xl font-semibold tracking-tight mb-6">Order Summary</h2>

                    <!-- Order Items Preview -->
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto no-scrollbar">
                        @foreach($cart['items'] as $item)
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden shrink-0">
                                <img src="{{ $item['image'] ?? asset('storage/assets/images/placeholder.jpg') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $item['name'] }}</p>
                                <p class="text-xs text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="space-y-3 text-sm font-medium">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span class="text-gray-900 font-semibold" data-subtotal="{{ $cart['subtotal'] }}">₹{{ number_format($cart['subtotal'], 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Shipping</span>
                            <span class="text-gray-900 font-semibold" id="shipping-display">Calculated ...</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                             <span>Tax</span>
                             @if(isset($cart['tax_breakdown']) && count($cart['tax_breakdown']) > 0)
                                <div class="flex flex-col gap-1 w-full text-right">
                                    <span class="text-gray-900 font-semibold">₹{{ number_format($cart['tax_total'] ?? 0, 2) }}</span>
                                    @foreach($cart['tax_breakdown'] as $tax)
                                        <span class="text-xs text-slate-400">{{ $tax['name'] }} ({{ $tax['rate'] }}%): ₹{{ number_format($tax['amount'], 2) }}</span>
                                    @endforeach
                                </div>
                             @else
                                <span class="text-gray-900 font-semibold">₹{{ number_format($cart['tax_total'] ?? 0, 2) }}</span>
                             @endif
                        </div>
                        @if(($cart['discount_total'] ?? 0) > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Discount</span>
                            <span class="font-semibold">-₹{{ number_format($cart['discount_total'], 2) }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="h-px bg-gray-100 my-6"></div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold tracking-tight text-gray-900" id="grand-total">₹{{ number_format($cart['grand_total'] ?? 0, 2) }}</span>
                        <input type="hidden" id="raw-total" value="{{ $cart['grand_total'] ?? 0 }}">
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="mb-4 flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="terms" name="terms_agree" type="checkbox" required class="h-4 w-4 rounded border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-[#0ea5e9] hover:underline">Terms and Conditions</a></label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button type="submit" id="place-order-btn" class="w-full bg-[#0f172a] text-white py-4 rounded-full text-base font-medium hover:bg-[#0ea5e9] active:scale-[0.98] transition-all duration-200 flex justify-center items-center gap-2 group shadow-lg shadow-sky-100" disabled>
                            <span>Place Order</span>
                            <i data-lucide="lock" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        // Update Full Name hidden field on input
        const fName = document.querySelector('input[name="first_name"]');
        const lName = document.querySelector('input[name="last_name"]');
        const fullName = document.getElementById('full_name');

        function updateFullName() {
            fullName.value = (fName.value + ' ' + lName.value).trim();
        }

        fName.addEventListener('input', updateFullName);
        lName.addEventListener('input', updateFullName);

        // Pincode Logic
        const pincodeInput = document.getElementById('pincode');
        let shippingTimeout;

        pincodeInput.addEventListener('input', function() {
            const pin = this.value;
            if (pin.length === 6) {
                clearTimeout(shippingTimeout);
                shippingTimeout = setTimeout(() => checkShipping(pin), 500);
            }
        });

        // Trigger check if pre-filled
        if (pincodeInput.value.length === 6) {
            checkShipping(pincodeInput.value);
        }
    });

    function checkShipping(pincode) {
        const msgEl = document.getElementById('pincode-msg');
        const optionsEl = document.getElementById('shipping-options');
        const displayEl = document.getElementById('shipping-display');
        const costInput = document.getElementById('shipping_cost');
        const btn = document.getElementById('place-order-btn');

        msgEl.classList.remove('hidden', 'text-red-500', 'text-green-500');
        msgEl.classList.add('text-gray-500');
        msgEl.innerText = 'Checking availability...';
        btn.disabled = true;
        btn.classList.add('opacity-50', 'cursor-not-allowed');

        fetch('{{ route("customer.checkout.check-shipping") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ pincode: pincode })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                msgEl.classList.add('text-green-500');
                msgEl.innerText = 'Delivery available!';
                
                // Show options logic - simplified for "Flat Rate" or "Free" based on business logic
                // Or dynamic from shiprocket. For now, let's assume standard logic:
                // If cart > 499, Free. Else 99. Or use Rate from API?
                // The implementation plan says "Integrate Shiprocket (Pincode Check, EDD, Flat Rate 99)"
                // So we stick to Flat Rate 99 logic, but validate serviceability.

                const cartTotal = parseFloat(document.getElementById('raw-total').value);
                // We need subtotal actually for logic, but let's assume cartTotal logic from Cart page (Subtotal based)
                const subtotal = parseFloat(document.querySelector('[data-subtotal]').getAttribute('data-subtotal'));
                
                let cost = 99;
                let method = "Standard Shipping";
                if (subtotal >= 499) {
                    cost = 0;
                    method = "Free Standard Shipping";
                }

                optionsEl.innerHTML = `
                    <label class="flex items-center justify-between p-4 border-2 border-[#0ea5e9] bg-sky-50 rounded-xl cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="shipping" value="standard" checked class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div>
                                <span class="font-medium text-gray-900">${method}</span>
                                <p class="text-sm text-gray-500 mt-1">Estimated: ${data.estimated_delivery || '5-7'} days</p>
                            </div>
                        </div>
                        <span class="font-bold text-gray-900">₹${cost}</span>
                    </label>
                `;

                costInput.value = cost;
                displayEl.innerText = cost === 0 ? 'Free' : '₹' + cost.toFixed(2);
                updateGrandTotal(cost);
                
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');

            } else {
                msgEl.classList.add('text-red-500');
                msgEl.innerText = data.message || 'Delivery not available to this pincode.';
                optionsEl.innerHTML = `<div class="p-4 bg-red-50 text-red-500 rounded-xl text-center text-sm">Delivery not available to ${pincode}</div>`;
                displayEl.innerText = '--';
                updateGrandTotal(0); // Reset shipping cost to 0 visually or block
            }
        })
        .catch(err => {
            console.error(err);
            msgEl.classList.add('text-red-500');
            msgEl.innerText = 'Error checking pincode.';
        });
    }

    function updateGrandTotal(shippingCost) {
        const rawTotal = parseFloat(document.getElementById('raw-total').value);
        // Note: raw-total in view includes tax/discount but NOT shipping initially (as it was 0)
        // If we want to be precise, we should re-sum: subtotal + tax + shipping - discount
        // But assuming raw-total is (subtotal + tax - discount), we just add shipping.
        
        const grandTotal = rawTotal + shippingCost;
        document.getElementById('grand-total').innerText = '₹' + grandTotal.toFixed(2);
    }

    window.fillAddress = function(addr) {
        document.getElementById('address').value = addr.address_line1;
        document.getElementById('address2').value = addr.address_line2 || '';
        document.getElementById('city').value = addr.city;
        document.getElementById('state').value = addr.state;
        document.getElementById('pincode').value = addr.pincode;
        
        // Trigger check
        checkShipping(addr.pincode);
    }

    window.clearAddress = function() {
        document.getElementById('address').value = '';
        document.getElementById('address2').value = '';
        document.getElementById('city').value = '';
        document.getElementById('state').value = '';
        document.getElementById('pincode').value = '';
        document.getElementById('pincode-msg').innerText = '';
        document.getElementById('shipping-options').innerHTML = '<div class="p-4 bg-gray-50 rounded-xl text-center text-gray-500 text-sm">Please enter your PIN code to see available shipping options.</div>';
        document.getElementById('shipping-display').innerText = 'Calculated...';
    }
</script>
@endpush