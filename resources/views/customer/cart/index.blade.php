@extends('customer.layouts.master')

@section('title', 'Cart | Dr. KINJAL')

@section('styles')
<style>
    body {
        font-family: 'DM Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    /* Hide number input spinners */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
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
</style>
@endsection

@section('content')
<!-- Main Cart Content -->
<main class="py-28 px-6 max-w-7xl mx-auto">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">
        
        <!-- Left Column: Cart Items -->
        <div class="lg:col-span-8 space-y-8 fade-in">
            <header class="flex items-baseline justify-between border-b border-gray-100 pb-6">
                <h1 class="text-3xl lg:text-4xl tracking-tight font-semibold text-gray-900">Your Cart</h1>
                <p class="text-gray-500 font-medium"><span id="item-count">0</span> items</p>
            </header>
            
            <!-- Free Shipping Progress -->
            <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-sky-50">
                <div class="flex justify-between items-end mb-3">
                    <span class="text-xs font-bold text-gray-900 uppercase tracking-wider">Free Shipping Status</span>
                    <span id="shipping-message" class="text-sm text-gray-500">
                        Add <span class="font-bold text-[#0ea5e9]" id="remaining-amount">₹499.00</span> to unlock free shipping
                    </span>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div id="progress-bar" class="h-full bg-[#0ea5e9] w-0 rounded-full transition-all duration-1000 ease-out shadow-[0_0_10px_rgba(14,165,233,0.4)]"></div>
                </div>
            </div>

            <!-- Products Container -->
            <div id="cart-items" class="space-y-0">
                <!-- Product 1: Brightening Face Wash -->
                <div class="group flex gap-5 py-8 border-b border-gray-100">
                    <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 relative">
                        <img src="{{ asset('storage/assets/images/16.png') }}" alt="Brightening Face Wash" class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                    </div>

                    <div class="flex flex-1 flex-col justify-between py-1">
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                                    <a href="#" class="hover:text-[#0ea5e9] transition-colors">Brightening Face Wash</a>
                                </h3>
                                <p class="mt-1.5 text-xs font-medium text-gray-500 bg-slate-50 inline-block px-2 py-1 rounded-md">For Glowing Skin</p>
                                <p class="mt-2 text-xs text-gray-400">Stock: 12 available</p>
                            </div>
                            <p class="text-lg font-bold text-gray-900">₹399.00</p>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center rounded-full border border-slate-200 bg-white shadow-sm h-9">
                                <button onclick="updateQty(1, -1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:minus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                                <span id="qty-1" class="w-6 text-center text-sm font-semibold text-gray-900 select-none">1</span>
                                <button onclick="updateQty(1, 1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:plus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                            </div>

                            <button onclick="removeItem(1)" class="text-sm font-medium text-slate-400 hover:text-[#0ea5e9] transition-colors flex items-center gap-1.5 group/btn">
                                <iconify-icon icon="lucide:trash-2" width="16" class="group-hover/btn:scale-110 transition-transform"></iconify-icon>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Conditioner -->
                <div class="group flex gap-5 py-8 border-b border-gray-100">
                    <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 relative">
                        <img src="{{ asset('storage/assets/images/49.png') }}" alt="Conditioner" class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                    </div>

                    <div class="flex flex-1 flex-col justify-between py-1">
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                                    <a href="#" class="hover:text-[#0ea5e9] transition-colors">Conditioner</a>
                                </h3>
                                <p class="mt-1.5 text-xs font-medium text-gray-500 bg-slate-50 inline-block px-2 py-1 rounded-md">For Smooth & Shiny Hair</p>
                                <p class="mt-2 text-xs text-gray-400">Stock: 8 available</p>
                            </div>
                            <p class="text-lg font-bold text-gray-900">₹330.00</p>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center rounded-full border border-slate-200 bg-white shadow-sm h-9">
                                <button onclick="updateQty(2, -1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:minus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                                <span id="qty-2" class="w-6 text-center text-sm font-semibold text-gray-900 select-none">1</span>
                                <button onclick="updateQty(2, 1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:plus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                            </div>

                            <button onclick="removeItem(2)" class="text-sm font-medium text-slate-400 hover:text-[#0ea5e9] transition-colors flex items-center gap-1.5 group/btn">
                                <iconify-icon icon="lucide:trash-2" width="16" class="group-hover/btn:scale-110 transition-transform"></iconify-icon>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Face Serum -->
                <div class="group flex gap-5 py-8 border-b border-gray-100 last:border-0">
                    <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 relative">
                        <img src="{{ asset('storage/assets/images/36.png') }}" alt="Face Serum" class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                    </div>

                    <div class="flex flex-1 flex-col justify-between py-1">
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                                    <a href="#" class="hover:text-[#0ea5e9] transition-colors">Face Serum</a>
                                </h3>
                                <p class="mt-1.5 text-xs font-medium text-gray-500 bg-slate-50 inline-block px-2 py-1 rounded-md">Anti-Aging & Hydration</p>
                                <p class="mt-2 text-xs text-gray-400">Stock: 15 available</p>
                            </div>
                            <p class="text-lg font-bold text-gray-900">₹480.00</p>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center rounded-full border border-slate-200 bg-white shadow-sm h-9">
                                <button onclick="updateQty(3, -1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:minus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                                <span id="qty-3" class="w-6 text-center text-sm font-semibold text-gray-900 select-none">1</span>
                                <button onclick="updateQty(3, 1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                    <iconify-icon icon="lucide:plus" width="12" stroke-width="3"></iconify-icon>
                                </button>
                            </div>

                            <button onclick="removeItem(3)" class="text-sm font-medium text-slate-400 hover:text-[#0ea5e9] transition-colors flex items-center gap-1.5 group/btn">
                                <iconify-icon icon="lucide:trash-2" width="16" class="group-hover/btn:scale-110 transition-transform"></iconify-icon>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gift Option -->
            {{-- <div class="flex items-start gap-4 pt-8 pb-4">
                <div class="relative flex items-center">
                    <input type="checkbox" id="gift-wrap" class="peer h-6 w-6 cursor-pointer appearance-none rounded-md border-2 border-gray-300 transition-all checked:border-[#0ea5e9] checked:bg-[#0ea5e9] hover:border-gray-400">
                    <iconify-icon icon="lucide:gift" class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100" width="14"></iconify-icon>
                </div>
                <div>
                    <label for="gift-wrap" class="text-base font-semibold text-gray-900 cursor-pointer select-none">Add Gift Wrapping</label>
                    <p class="text-sm text-gray-500 mt-0.5">Premium eco-friendly packaging with a personalized note. (+₹5.00)</p>
                </div>
            </div> --}}

        </div>

        <!-- Right Column: Order Summary -->
        <div class="lg:col-span-4 fade-in">
            <div class="sticky top-32">
                <div class="bg-white rounded-3xl p-8 border border-sky-50 shadow-[0_8px_30px_rgb(15,23,42,0.06)]">
                    <h2 class="text-xl font-semibold tracking-tight mb-8">Order Summary</h2>

                    <div class="space-y-4 text-sm font-medium">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span class="text-gray-900 font-semibold" id="summary-subtotal">₹0.00</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Shipping</span>
                            <span class="text-gray-900 font-semibold" id="summary-shipping">Calculated at checkout</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Tax (est.)</span>
                            <span class="text-gray-900 font-semibold" id="summary-tax">₹0.00</span>
                        </div>
                        
                        <!-- Discount Row -->
                        <div class="flex justify-between text-green-600 hidden" id="discount-row">
                            <span>Discount (5% Off)</span>
                            <span class="font-semibold">-₹<span id="discount-amount">0.00</span></span>
                        </div>
                        
                        <!-- Gift Row (Initially hidden) -->
                        {{-- <div class="flex justify-between text-[#0ea5e9] hidden" id="gift-row">
                            <span>Gift Wrapping</span>
                            <span class="font-semibold">+₹5.00</span>
                        </div> --}}
                    </div>

                    <div class="h-px bg-gray-100 my-6"></div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold tracking-tight text-gray-900" id="summary-total">₹0.00</span>
                    </div>

                    <a href="{{ route('customer.checkout') }}" class="block">
                        <button class="w-full bg-[#0f172a] text-white py-4 rounded-full text-base font-medium hover:bg-[#0ea5e9] active:scale-[0.98] transition-all duration-200 flex justify-center items-center gap-2 group shadow-lg shadow-sky-100">
                            <span>Checkout</span>
                            <iconify-icon icon="lucide:arrow-right" width="18" class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </button>
                    </a>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ route('customer.products.list') }}" class="text-sm font-medium text-gray-500 hover:text-[#0ea5e9] underline decoration-slate-200 underline-offset-4">Continue Shopping</a>
                    </div>
                </div>

                <!-- Promo Code -->
                <div class="mt-6 px-2">
                    <details class="group">
                        <summary class="list-none flex cursor-pointer items-center justify-between text-sm font-semibold text-gray-700 hover:text-[#0ea5e9] transition-colors">
                            <span>Apply Promo Code</span>
                            <iconify-icon icon="lucide:plus" class="transition-transform group-open:rotate-45" width="16"></iconify-icon>
                        </summary>
                        <div class="mt-4 flex gap-2">
                            <input type="text" placeholder="DISCOUNT20" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                            <button class="rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold hover:bg-slate-50 hover:border-slate-300 transition-colors text-gray-900 bg-white shadow-sm">Apply</button>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<!-- Iconify Script -->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    // Data Structure - Updated with new products
    const products = [
        { 
            id: 1, 
            name: "Brightening Face Wash", 
            variant: "For Glowing Skin", 
            price: 399.00, 
            quantity: 1, 
            image: "storage/assets/images/16.png", 
            stock: 12 
        },
        { 
            id: 2, 
            name: "Conditioner", 
            variant: "For Smooth & Shiny Hair", 
            price: 330.00, 
            quantity: 1, 
            image: "storage/assets/images/49.png", 
            stock: 8 
        },
        { 
            id: 3, 
            name: "Face Serum", 
            variant: "Anti-Aging & Hydration", 
            price: 480.00, 
            quantity: 1, 
            image: "storage/assets/images/36.png", 
            stock: 15 
        }
    ];

    // State
    let cart = [...products];
    const FREE_SHIPPING_THRESHOLD = 499;
    const DISCOUNT_THRESHOLD = 999; // 5% discount when order is above ₹1000
    const DISCOUNT_PERCENTAGE = 0.05; // 5% discount
    const TAX_RATE = 0.08;
    let isGift = false;

    // Initial Render - Updated to handle empty cart on load
    function init() {
        // If you want to start with empty cart, uncomment this line:
        // cart = [];
        
        renderCartItems();
        updateSummary();
        updateFreeShippingProgress(); // Call this separately on init
        gsap.from(".fade-in", { y: 30, opacity: 0, duration: 1, stagger: 0.15, ease: "power3.out" });
    }

    function renderCartItems() {
        const container = document.getElementById('cart-items');
        container.innerHTML = '';
        const totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);
        document.getElementById('item-count').textContent = totalItems;

        if(cart.length === 0){
            container.innerHTML = `
                <div class="py-16 text-center bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white mb-4 shadow-sm text-slate-300">
                        <iconify-icon icon="lucide:shopping-bag" width="24"></iconify-icon>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Your cart is feeling light</h3>
                    <p class="text-gray-500 text-sm mt-1 mb-6">Explore our best sellers and find your new favorites.</p>
                    <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-[#0ea5e9] text-white rounded-full text-sm font-medium hover:bg-[#0284c7] transition-colors shadow-lg shadow-sky-200">
                        Shop Best Sellers
                    </a>
                </div>`;
            return;
        }

        cart.forEach((item) => {
            const itemEl = document.createElement('div');
            itemEl.className = "group flex gap-5 py-8 border-b border-gray-100 last:border-0";
            itemEl.id = `item-${item.id}`;
            
            itemEl.innerHTML = `
                <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 relative">
                    <img src="${item.image}" alt="${item.name}" class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                    ${item.quantity >= item.stock ? '<div class="absolute top-2 left-2 bg-rose-500 text-white text-xs px-2 py-1 rounded-full">Low Stock</div>' : ''}
                </div>

                <div class="flex flex-1 flex-col justify-between py-1">
                    <div class="flex justify-between items-start gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                                <a href="#" class="hover:text-[#0ea5e9] transition-colors">${item.name}</a>
                            </h3>
                            <p class="mt-1.5 text-xs font-medium text-gray-500 bg-slate-50 inline-block px-2 py-1 rounded-md">${item.variant}</p>
                            <p class="mt-2 text-xs text-gray-400">Stock: ${item.stock} available</p>
                        </div>
                        <p class="text-lg font-bold text-gray-900">₹${item.price.toFixed(2)}</p>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center rounded-full border border-slate-200 bg-white shadow-sm h-9">
                            <button onclick="updateQty(${item.id}, -1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors" ${item.quantity <= 1 ? 'disabled style="opacity:0.3;cursor:not-allowed"' : ''}>
                                <iconify-icon icon="lucide:minus" width="12" stroke-width="3"></iconify-icon>
                            </button>
                            <span class="w-6 text-center text-sm font-semibold text-gray-900 select-none">${item.quantity}</span>
                            <button onclick="updateQty(${item.id}, 1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors" ${item.quantity >= item.stock ? 'disabled style="opacity:0.3;cursor:not-allowed"' : ''}>
                                <iconify-icon icon="lucide:plus" width="12" stroke-width="3"></iconify-icon>
                            </button>
                        </div>

                        <button onclick="removeItem(${item.id})" class="text-sm font-medium text-slate-400 hover:text-[#0ea5e9] transition-colors flex items-center gap-1.5 group/btn">
                            <iconify-icon icon="lucide:trash-2" width="16" class="group-hover/btn:scale-110 transition-transform"></iconify-icon>
                            <span>Remove</span>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(itemEl);
        });
    }

    function updateQty(id, change) {
        const item = cart.find(p => p.id === id);
        if (!item) return;
        const newQty = item.quantity + change;
        if (newQty < 1) return;
        if (newQty > item.stock) return;
        item.quantity = newQty;
        renderCartItems();
        updateSummary();
        updateFreeShippingProgress();
    }

    function removeItem(id) {
        cart = cart.filter(p => p.id !== id);
        renderCartItems();
        updateSummary();
        updateFreeShippingProgress();
    }

    function updateFreeShippingProgress() {
        const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        const progressBar = document.getElementById('progress-bar');
        const remainingSpan = document.getElementById('remaining-amount');
        const shippingMsg = document.getElementById('shipping-message');

        if (subtotal >= FREE_SHIPPING_THRESHOLD) {
            progressBar.style.width = '100%';
            remainingSpan.textContent = '₹0';
            shippingMsg.innerHTML = `<span class="font-semibold text-[#0ea5e9]">You've unlocked free shipping! 🎉</span>`;
        } else {
            const remaining = FREE_SHIPPING_THRESHOLD - subtotal;
            const progress = (subtotal / FREE_SHIPPING_THRESHOLD) * 100;
            progressBar.style.width = `${progress}%`;
            remainingSpan.textContent = `₹${remaining.toFixed(2)}`;
            
            if (subtotal === 0) {
                shippingMsg.innerHTML = `Add <span class="font-bold text-[#0ea5e9]" id="remaining-amount">₹${FREE_SHIPPING_THRESHOLD.toFixed(2)}</span> to unlock free shipping`;
            } else {
                shippingMsg.innerHTML = `You're <span class="font-bold text-[#0ea5e9]" id="remaining-amount">₹${remaining.toFixed(2)}</span> away from free shipping`;
            }
        }
    }

    function updateSummary() {
        const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        
        // Calculate discount
        let discount = 0;
        let isDiscountApplied = false;
        if (subtotal > DISCOUNT_THRESHOLD) {
            discount = subtotal * DISCOUNT_PERCENTAGE;
            isDiscountApplied = true;
        }
        
        const tax = (subtotal - discount) * TAX_RATE;
        const giftFee = isGift ? 5 : 0;
        const total = subtotal - discount + tax + giftFee;

        // Update display
        document.getElementById('summary-subtotal').textContent = `₹${subtotal.toFixed(2)}`;
        document.getElementById('summary-tax').textContent = `₹${tax.toFixed(2)}`;
        document.getElementById('summary-total').textContent = `₹${total.toFixed(2)}`;

        // Gift row toggle
        // const giftRow = document.getElementById('gift-row');
        // if (isGift) {
        //     giftRow.classList.remove('hidden');
        // } else {
        //     giftRow.classList.add('hidden');
        // }

        // Discount row toggle
        const discountRowElement = document.getElementById('discount-row');
        const discountAmountElement = document.getElementById('discount-amount');
        
        if (isDiscountApplied) {
            discountRowElement.classList.remove('hidden');
            discountAmountElement.textContent = discount.toFixed(2);
            
            // Add animation class to discount row
            discountRowElement.classList.add('discount-pulse');
            
            // Show discount notification
            showDiscountNotification(discount);
        } else {
            discountRowElement.classList.add('hidden');
            discountRowElement.classList.remove('discount-pulse');
        }
    }

    function showDiscountNotification(discountAmount) {
        // Check if notification already exists
        let notification = document.getElementById('discount-notification');
        if (!notification) {
            notification = document.createElement('div');
            notification.id = 'discount-notification';
            notification.className = 'mt-4 p-4 bg-green-50 border border-green-100 rounded-xl text-green-700 text-sm font-medium flex items-center justify-between';
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <iconify-icon icon="lucide:badge-percent" width="18"></iconify-icon>
                    <span>🎉 You've saved <strong>₹${discountAmount.toFixed(2)}</strong> with 5% discount!</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                    <iconify-icon icon="lucide:x" width="16"></iconify-icon>
                </button>
            `;
            
            // Insert after the free shipping progress bar
            const progressContainer = document.querySelector('.bg-white\\/80');
            if (progressContainer && progressContainer.nextSibling) {
                progressContainer.parentNode.insertBefore(notification, progressContainer.nextSibling);
            }
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification && notification.parentNode) {
                    notification.remove();
                }
            }, 5000);
        }
    }

    // Gift Wrap Listener
    // document.getElementById('gift-wrap').addEventListener('change', (e) => {
    //     isGift = e.target.checked;
    //     updateSummary();
    // });

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        init();
    });
</script>
@endpush