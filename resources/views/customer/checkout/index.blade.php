@extends('customer.layouts.master')

@section('title', 'Checkout | Dr. KINJAL')

@section('styles')
<style>
    body {
        font-family: 'DM Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Add to your existing styles */
    .discount-pulse {
        animation: discount-pulse 2s infinite;
    }
    
    @keyframes discount-pulse {
        0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
        100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }

    .step-complete {
        background-color: #10b981;
        color: white;
    }

    .step-active {
        background-color: #0ea5e9;
        color: white;
    }
</style>
@endsection

@section('content')
<!-- Checkout Progress -->
<div class="py-6 px-6 max-w-7xl mx-auto">
    <div class="flex justify-center">
        <div class="flex items-center gap-2">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full step-complete flex items-center justify-center">
                    <iconify-icon icon="lucide:check" width="16"></iconify-icon>
                </div>
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
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">
        
        <!-- Left Column: Shipping & Payment Forms -->
        <div class="lg:col-span-8 space-y-8 fade-in">
            
            <!-- Contact Information -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-2 flex items-center gap-2">
                    <iconify-icon icon="lucide:mail" width="20"></iconify-icon>
                    Contact Information
                </h2>
                <p class="text-gray-500 text-sm mb-6">We'll use this to send you order updates</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="John">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="Doe">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                        <input type="email" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="john@example.com">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="+91 98765 43210">
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-2 flex items-center gap-2">
                    <iconify-icon icon="lucide:map-pin" width="20"></iconify-icon>
                    Shipping Address
                </h2>
                <p class="text-gray-500 text-sm mb-6">Where should we deliver your order?</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Street Address *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="123 Main Street">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apartment, Suite, etc.</label>
                        <input type="text" 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="Apt 4B">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="Mumbai">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                        <select required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] transition-all">
                            <option value="">Select State</option>
                            <option value="MH">Maharashtra</option>
                            <option value="DL">Delhi</option>
                            <option value="KA">Karnataka</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="GJ">Gujarat</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="WB">West Bengal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">PIN Code *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               placeholder="400001">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                        <input type="text" required 
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all"
                               value="India" readonly>
                    </div>
                </div>

                <!-- Save Address Toggle -->
                <div class="flex items-center gap-3 mt-6 pt-6 border-t border-gray-100">
                    <div class="relative flex items-center">
                        <input type="checkbox" id="save-address" class="peer h-5 w-5 cursor-pointer appearance-none rounded-md border-2 border-gray-300 transition-all checked:border-[#0ea5e9] checked:bg-[#0ea5e9] hover:border-gray-400">
                        <iconify-icon icon="lucide:check" class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100" width="12"></iconify-icon>
                    </div>
                    <label for="save-address" class="text-sm text-gray-700 cursor-pointer select-none">Save this address for future orders</label>
                </div>
            </div>

            <!-- Shipping Method -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-6 flex items-center gap-2">
                    <iconify-icon icon="lucide:truck" width="20"></iconify-icon>
                    Shipping Method
                </h2>
                
                <div class="space-y-4">
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="shipping" value="standard" checked class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div>
                                <span class="font-medium text-gray-900">Standard Shipping</span>
                                <p class="text-sm text-gray-500 mt-1">5-7 business days</p>
                            </div>
                        </div>
                        <span class="font-bold text-gray-900">Free</span>
                    </label>
                    
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="shipping" value="express" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div>
                                <span class="font-medium text-gray-900">Express Shipping</span>
                                <p class="text-sm text-gray-500 mt-1">2-3 business days</p>
                            </div>
                        </div>
                        <span class="font-bold text-gray-900">₹99.00</span>
                    </label>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-6 flex items-center gap-2">
                    <iconify-icon icon="lucide:credit-card" width="20"></iconify-icon>
                    Payment Method
                </h2>
                
                <div class="space-y-4">
                    <!-- UPI -->
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment" value="upi" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-purple-100 rounded flex items-center justify-center">
                                    <iconify-icon icon="lucide:smartphone" class="text-purple-600"></iconify-icon>
                                </div>
                                <span class="font-medium text-gray-900">UPI</span>
                            </div>
                        </div>
                        <iconify-icon icon="lucide:chevron-right" width="20" class="text-gray-400"></iconify-icon>
                    </label>

                    <!-- Credit/Debit Card -->
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment" value="card" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <iconify-icon icon="lucide:credit-card" class="text-blue-600"></iconify-icon>
                                </div>
                                <span class="font-medium text-gray-900">Credit/Debit Card</span>
                            </div>
                        </div>
                        <iconify-icon icon="lucide:chevron-right" width="20" class="text-gray-400"></iconify-icon>
                    </label>

                    <!-- Net Banking -->
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment" value="netbanking" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-green-100 rounded flex items-center justify-center">
                                    <iconify-icon icon="lucide:building" class="text-green-600"></iconify-icon>
                                </div>
                                <span class="font-medium text-gray-900">Net Banking</span>
                            </div>
                        </div>
                        <iconify-icon icon="lucide:chevron-right" width="20" class="text-gray-400"></iconify-icon>
                    </label>

                    <!-- Cash on Delivery -->
                    <label class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-[#0ea5e9] cursor-pointer transition-all">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="radio" name="payment" value="cod" class="h-5 w-5 border-2 border-gray-300 text-[#0ea5e9] focus:ring-[#0ea5e9]">
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-6 bg-yellow-100 rounded flex items-center justify-center">
                                    <iconify-icon icon="lucide:package" class="text-yellow-600"></iconify-icon>
                                </div>
                                <span class="font-medium text-gray-900">Cash on Delivery</span>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">Available</span>
                    </label>
                </div>
            </div>

            <!-- Order Notes -->
            <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                <h2 class="text-xl font-semibold tracking-tight mb-4 flex items-center gap-2">
                    <iconify-icon icon="lucide:file-text" width="20"></iconify-icon>
                    Order Notes (Optional)
                </h2>
                <textarea 
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all min-h-[120px]"
                    placeholder="Special instructions for your order..."
                ></textarea>
            </div>

        </div>

        <!-- Right Column: Order Summary -->
        <div class="lg:col-span-4 fade-in">
            <div class="sticky top-32">
                <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                    <h2 class="text-xl font-semibold tracking-tight mb-6">Order Summary</h2>

                    <!-- Order Items Preview -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden">
                                <img src="{{ asset('assets/images/36.png') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Vitamin C Serum</p>
                                <p class="text-xs text-gray-500">30ml × 1</p>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">₹45.00</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden">
                                <img src="{{ asset('assets/images/16.png') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Watermelon Gel</p>
                                <p class="text-xs text-gray-500">50ml × 1</p>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">₹32.00</span>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm font-medium">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span class="text-gray-900 font-semibold">₹101.00</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Shipping</span>
                            <span class="text-gray-900 font-semibold">Free</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Discount (5% Off)</span>
                            <span class="font-semibold">-₹5.05</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Tax (est.)</span>
                            <span class="text-gray-900 font-semibold">₹7.68</span>
                        </div>
                    </div>

                    <div class="h-px bg-gray-100 my-6"></div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold tracking-tight text-gray-900">₹103.63</span>
                    </div>

                    <div class="space-y-4">
                        <button id="place-order-btn" 
                                class="w-full bg-[#0f172a] text-white py-4 rounded-full text-base font-medium hover:bg-[#0ea5e9] active:scale-[0.98] transition-all duration-200 flex justify-center items-center gap-2 group shadow-lg shadow-sky-100">
                            <span>Place Order</span>
                            <iconify-icon icon="lucide:lock" width="18" class="group-hover:scale-110 transition-transform"></iconify-icon>
                        </button>
                        
                        <p class="text-xs text-gray-500 text-center">
                            By placing your order, you agree to our <a href="{{ route('customer.page.terms') }}" class="text-[#0ea5e9] underline">Terms of Service</a> and <a href="{{ route('customer.page.privacy') }}" class="text-[#0ea5e9] underline">Privacy Policy</a>
                        </p>
                    </div>
                </div>

                <!-- Security Badges -->
                <div class="mt-6 bg-white rounded-3xl p-6 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center gap-3 mb-3">
                            <iconify-icon icon="lucide:shield-check" width="24" class="text-green-500"></iconify-icon>
                            <span class="text-sm font-semibold text-gray-900">Secure Checkout</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4">Your payment information is encrypted and secure</p>
                        <div class="flex items-center justify-center gap-4">
                            <div class="w-10 h-6 bg-gray-100 rounded flex items-center justify-center">
                                <span class="text-xs font-bold text-gray-600">SSL</span>
                            </div>
                            <div class="w-10 h-6 bg-gray-100 rounded flex items-center justify-center">
                                <iconify-icon icon="lucide:lock" class="text-gray-600"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Need Help -->
                <div class="mt-4 text-center">
                    <a href="{{ route('customer.page.contact') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-[#0ea5e9] transition-colors group">
                        <iconify-icon icon="lucide:help-circle" width="16"></iconify-icon>
                        <span>Need help? Contact Support</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    // Initialize animations
    gsap.from(".fade-in", { 
        y: 30, 
        opacity: 0, 
        duration: 1, 
        stagger: 0.15, 
        ease: "power3.out" 
    });

    // Form validation and submission
    document.addEventListener('DOMContentLoaded', function() {
        const placeOrderBtn = document.getElementById('place-order-btn');
        const formInputs = document.querySelectorAll('input[required], select[required]');

        // Form validation
        function validateForm() {
            let isValid = true;
            
            formInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = '#ef4444';
                } else {
                    input.style.borderColor = '#e5e7eb';
                }
            });

            // Email validation
            const emailInput = document.querySelector('input[type="email"]');
            if (emailInput && emailInput.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    isValid = false;
                    emailInput.style.borderColor = '#ef4444';
                }
            }

            // Phone validation
            const phoneInput = document.querySelector('input[type="tel"]');
            if (phoneInput && phoneInput.value) {
                const phoneRegex = /^[\d\s\+\-\(\)]{10,}$/;
                if (!phoneRegex.test(phoneInput.value)) {
                    isValid = false;
                    phoneInput.style.borderColor = '#ef4444';
                }
            }

            return isValid;
        }

        // Place order button handler
        placeOrderBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                // Shake animation for invalid form
                gsap.to(placeOrderBtn, {
                    x: [-5, 5, -5, 5, 0],
                    duration: 0.5,
                    ease: "power2.out"
                });
                
                // Show error message
                let errorMsg = document.getElementById('form-error');
                if (!errorMsg) {
                    errorMsg = document.createElement('div');
                    errorMsg.id = 'form-error';
                    errorMsg.className = 'mt-4 p-4 bg-red-50 border border-red-100 rounded-xl text-red-700 text-sm font-medium text-center';
                    errorMsg.innerHTML = `
                        <div class="flex items-center justify-center gap-2">
                            <iconify-icon icon="lucide:alert-circle" width="18"></iconify-icon>
                            <span>Please fill in all required fields correctly.</span>
                        </div>
                    `;
                    placeOrderBtn.parentElement.insertBefore(errorMsg, placeOrderBtn.nextSibling);
                    
                    // Auto remove error after 5 seconds
                    setTimeout(() => {
                        if (errorMsg.parentNode) {
                            errorMsg.remove();
                        }
                    }, 5000);
                }
                return;
            }

            // If form is valid, proceed with order placement
            placeOrderBtn.innerHTML = `
                <iconify-icon icon="lucide:loader-circle" width="18" class="animate-spin"></iconify-icon>
                <span>Processing...</span>
            `;
            placeOrderBtn.disabled = true;

            // In a real application, you would submit the form data to your server here
            // For demonstration, we'll redirect to the payment page
            setTimeout(() => {
                window.location.href = "{{ route('customer.checkout.payment') }}";
            }, 2000);
        });

        // Real-time input validation
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.style.borderColor = '#0ea5e9';
                }
            });
            
            input.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.style.borderColor = '#ef4444';
                }
            });
        });

        // Shipping method selection effect
        const shippingLabels = document.querySelectorAll('label[for^="shipping"]');
        shippingLabels.forEach(label => {
            const radio = label.querySelector('input[type="radio"]');
            label.addEventListener('click', function() {
                shippingLabels.forEach(l => {
                    l.classList.remove('border-[#0ea5e9]', 'bg-sky-50');
                });
                this.classList.add('border-[#0ea5e9]', 'bg-sky-50');
            });
        });

        // Payment method selection effect
        const paymentLabels = document.querySelectorAll('label[for^="payment"]');
        paymentLabels.forEach(label => {
            const radio = label.querySelector('input[type="radio"]');
            label.addEventListener('click', function() {
                paymentLabels.forEach(l => {
                    l.classList.remove('border-[#0ea5e9]', 'bg-sky-50');
                });
                this.classList.add('border-[#0ea5e9]', 'bg-sky-50');
            });
        });
    });

    // PIN code lookup (example - would need actual API)
    function lookupPincode(pincode) {
        // This would typically make an API call to get city/state from PIN code
        console.log('Looking up PIN code:', pincode);
        
        // Example: Simulate API call with timeout
        setTimeout(() => {
            // In a real app, you would update city/state fields based on API response
            console.log('PIN code lookup complete for:', pincode);
        }, 500);
    }

    // Auto-fill city/state based on PIN code (example implementation)
    const pincodeInput = document.querySelector('input[placeholder="400001"]');
    if (pincodeInput) {
        pincodeInput.addEventListener('blur', function() {
            if (this.value.length >= 6) {
                lookupPincode(this.value);
            }
        });
    }
</script>
@endsection