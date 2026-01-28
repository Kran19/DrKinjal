@extends('customer.layouts.master')

@section('title', 'Cart | Dr. Kinjal Skincare')

@push('styles')
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

    .discount-pulse {
        animation: discount-pulse 2s infinite;
    }
    
    @keyframes discount-pulse {
        0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
        100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }

    .loader {
        border: 2px solid #f3f3f3;
        border-radius: 50%;
        border-top: 2px solid #0ea5e9;
        width: 16px;
        height: 16px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush

@section('content')
<!-- Main Cart Content -->
<main class="py-28 px-6 max-w-7xl mx-auto">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">
        
        <!-- Left Column: Cart Items -->
        <div class="lg:col-span-8 space-y-8 fade-in">
            <header class="flex items-baseline justify-between border-b border-gray-100 pb-6">
                <h1 class="text-3xl lg:text-4xl tracking-tight font-semibold text-gray-900">Your Cart</h1>
                <p class="text-gray-500 font-medium"><span id="item-count">{{ $cart['items_count'] ?? 0 }}</span> items</p>
            </header>
            
            <!-- Free Shipping Progress -->
             @php
                $freeShippingThreshold = 499;
                $currentSubtotal = $cart['subtotal'] ?? 0;
                $remaining = max(0, $freeShippingThreshold - $currentSubtotal);
                $progress = 100;
                if ($freeShippingThreshold > 0) {
                     $progress = min(100, ($currentSubtotal / $freeShippingThreshold) * 100);
                }
            @endphp
            <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border border-sky-50">
                <div class="flex justify-between items-end mb-3">
                    <span class="text-xs font-bold text-gray-900 uppercase tracking-wider">Free Shipping Status</span>
                    <span id="shipping-message" class="text-sm text-gray-500">
                        @if($remaining > 0)
                            Add <span class="font-bold text-[#0ea5e9]" id="remaining-amount">₹{{ number_format($remaining, 2) }}</span> to unlock free shipping
                        @else
                            <span class="font-semibold text-[#0ea5e9]">You've unlocked free shipping! 🎉</span>
                        @endif
                    </span>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div id="progress-bar" class="h-full bg-[#0ea5e9] rounded-full transition-all duration-1000 ease-out shadow-[0_0_10px_rgba(14,165,233,0.4)]" style="width: {{ $progress }}%"></div>
                </div>
            </div>

            <!-- Products Container -->
            <div id="cart-items" class="space-y-0">
                @if(empty($cart['items']))
                    <div class="py-16 text-center bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white mb-4 shadow-sm text-slate-300">
                            <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Your cart is feeling light</h3>
                        <p class="text-gray-500 text-sm mt-1 mb-6">Explore our best sellers and find your new favorites.</p>
                        <a href="{{ route('customer.products.list') }}" class="inline-flex items-center justify-center px-6 py-3 bg-[#0ea5e9] text-white rounded-full text-sm font-medium hover:bg-[#0284c7] transition-colors shadow-lg shadow-sky-200">
                            Shop Best Sellers
                        </a>
                    </div>
                @else
                    @foreach($cart['items'] as $item)
                        <div class="group flex gap-5 py-8 border-b border-gray-100 last:border-0" id="item-{{ $item['id'] }}">
                            <div class="h-32 w-28 shrink-0 overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 relative">
                                <img src="{{ $item['image'] ?? asset('assets/images/placeholder.jpg') }}" alt="{{ $item['name'] ?? $item['product_name'] ?? 'Product' }}" class="h-full w-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                                @if(isset($item['stock_quantity']) && $item['quantity'] >= $item['stock_quantity'])
                                    <div class="absolute top-2 left-2 bg-rose-500 text-white text-xs px-2 py-1 rounded-full">Low Stock</div>
                                @endif
                            </div>

                            <div class="flex flex-1 flex-col justify-between py-1">
                                <div class="flex justify-between items-start gap-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 leading-tight">
                                            <a href="{{ route('customer.products.details', ['slug' => $item['slug'] ?? \Illuminate\Support\Str::slug($item['product_name'] ?? 'product') ]) }}" class="hover:text-[#0ea5e9] transition-colors">{{ $item['name'] ?? $item['product_name'] ?? 'Product Item' }}</a>
                                        </h3>
                                        @if(isset($item['attributes_text']) && $item['attributes_text'])
                                            <p class="mt-1.5 text-xs font-medium text-gray-500 bg-slate-50 inline-block px-2 py-1 rounded-md">{{ $item['attributes_text'] }}</p>
                                        @endif
                                    </div>
                                    <p class="text-lg font-bold text-gray-900">₹{{ number_format($item['price'], 2) }}</p>
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center rounded-full border border-slate-200 bg-white shadow-sm h-9">
                                        <button onclick="updateQty('{{ $item['id'] }}', -1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors" {{ $item['quantity'] <= 1 ? 'disabled style="opacity:0.3;cursor:not-allowed"' : '' }}>
                                            <i data-lucide="minus" class="w-3 h-3"></i>
                                        </button>
                                        <span id="qty-{{ $item['id'] }}" class="w-6 text-center text-sm font-semibold text-gray-900 select-none">{{ $item['quantity'] }}</span>
                                        <button onclick="updateQty('{{ $item['id'] }}', 1)" class="w-8 h-full flex items-center justify-center text-slate-400 hover:text-slate-900 transition-colors">
                                            <i data-lucide="plus" class="w-3 h-3"></i>
                                        </button>
                                    </div>

                                    <button onclick="removeItem('{{ $item['id'] }}')" class="text-sm font-medium text-slate-400 hover:text-[#0ea5e9] transition-colors flex items-center gap-1.5 group/btn">
                                        <i data-lucide="trash-2" class="w-4 h-4 group-hover/btn:scale-110 transition-transform"></i>
                                        <span>Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Gift Option -->
            {{-- <div class="flex items-start gap-4 pt-8 pb-4">
                <div class="relative flex items-center">
                    <input type="checkbox" id="gift-wrap" class="peer h-6 w-6 cursor-pointer appearance-none rounded-md border-2 border-gray-300 transition-all checked:border-[#0ea5e9] checked:bg-[#0ea5e9] hover:border-gray-400">
                    <i data-lucide="gift" class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100 w-3.5 h-3.5"></i>
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
                            <span class="text-gray-900 font-semibold" id="summary-subtotal">₹{{ number_format($cart['subtotal'] ?? 0, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Shipping</span>
                            <span class="text-gray-900 font-semibold" id="summary-shipping">Calculated at checkout</span>
                        </div>
                            <span>Tax (Included)</span>
                             <!-- Tax Breakdown -->
                             @if(isset($cart['tax_breakdown']) && count($cart['tax_breakdown']) > 0)
                                <div class="flex flex-col gap-1 w-full text-right">
                                    <span class="text-gray-900 font-semibold" id="summary-tax">₹{{ number_format($cart['tax_total'] ?? 0, 2) }}</span>
                                    @foreach($cart['tax_breakdown'] as $tax)
                                        <span class="text-xs text-slate-400">{{ $tax['name'] }} ({{ $tax['rate'] }}%): ₹{{ number_format($tax['amount'], 2) }}</span>
                                    @endforeach
                                </div>
                             @else
                                <span class="text-gray-900 font-semibold" id="summary-tax">₹{{ number_format($cart['tax_total'] ?? 0, 2) }}</span>
                             @endif
                        </div>
                        
                        <!-- Discount Row -->
                        <div class="flex justify-between text-green-600 {{ ($cart['discount_total'] ?? 0) > 0 ? '' : 'hidden' }}" id="discount-row">
                            <span>Discount</span>
                            <span class="font-semibold">-₹<span id="discount-amount">{{ number_format($cart['discount_total'] ?? 0, 2) }}</span></span>
                        </div>
                    </div>

                    <div class="h-px bg-gray-100 my-6"></div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold tracking-tight text-gray-900" id="summary-total">₹{{ number_format($cart['grand_total'] ?? 0, 2) }}</span>
                    </div>

                    @if(!empty($cart['items']))
                    <a href="{{ route('customer.checkout.index') }}" class="block">
                        <button class="w-full bg-[#0f172a] text-white py-4 rounded-full text-base font-medium hover:bg-[#0ea5e9] hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 flex justify-center items-center gap-2 group shadow-lg shadow-sky-100">
                            <span>Checkout</span>
                            <i data-lucide="arrow-right" class="w-4.5 h-4.5 group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </a>
                    @else
                    <button disabled class="w-full bg-slate-200 text-gray-400 py-4 rounded-full text-base font-medium flex justify-center items-center gap-2 cursor-not-allowed">
                        <span>Checkout</span>
                    </button>
                    @endif
                    
                    <div class="mt-4 text-center">
                        <a href="{{ route('customer.products.list') }}" class="text-sm font-medium text-gray-500 hover:text-[#0ea5e9] underline decoration-slate-200 underline-offset-4">Continue Shopping</a>
                    </div>
                </div>

                <!-- Promo Code -->
                <div class="mt-6 px-2">
                    <details class="group">
                        <summary class="list-none flex cursor-pointer items-center justify-between text-sm font-semibold text-gray-700 hover:text-[#0ea5e9] transition-colors">
                            <span>Apply Promo Code</span>
                            <i data-lucide="plus" class="w-4 h-4 transition-transform group-open:rotate-45"></i>
                        </summary>
                        <div class="mt-4 flex gap-2">
                            <input type="text" id="coupon-code" placeholder="DISCOUNT20" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm outline-none focus:border-[#0ea5e9] focus:ring-1 focus:ring-[#0ea5e9] placeholder:text-gray-400 transition-all">
                            <button onclick="applyCoupon()" class="rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold hover:bg-slate-50 hover:border-slate-300 transition-colors text-gray-900 bg-white shadow-sm">Apply</button>
                        </div>
                        
                        <!-- Available Coupons List -->
                        @if(isset($availableCoupons) && $availableCoupons->count() > 0)
                            <div class="mt-4 space-y-2">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Available Offers</p>
                                @foreach($availableCoupons as $coupon)
                                    <div class="group/coupon p-3 border border-dashed border-gray-200 rounded-lg bg-gray-50 hover:bg-sky-50 hover:border-sky-300 transition-all cursor-pointer relative"
                                         onclick="document.getElementById('coupon-code').value = '{{ $coupon->code }}'">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <span class="font-bold text-[#0ea5e9] tracking-wide">{{ $coupon->code }}</span>
                                                <p class="text-xs text-gray-600 mt-1">{{ $coupon->name }}</p>
                                                @if($coupon->offer_type == 'percentage')
                                                    <span class="inline-block mt-2 text-[10px] bg-green-100 text-green-700 px-1.5 py-0.5 rounded font-bold">{{ $coupon->discount_value }}% OFF</span>
                                                @elseif($coupon->offer_type == 'fixed')
                                                    <span class="inline-block mt-2 text-[10px] bg-green-100 text-green-700 px-1.5 py-0.5 rounded font-bold">₹{{ $coupon->discount_value }} OFF</span>
                                                @endif
                                            </div>
                                            <div class="w-6 h-6 rounded-full bg-white border border-gray-200 flex items-center justify-center opacity-0 group-hover/coupon:opacity-100 transition-opacity">
                                                <i data-lucide="copy" class="w-3 h-3 text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </details>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });

    const FREE_SHIPPING_THRESHOLD = 499;

    function updateQty(itemId, change) {
        // Find current qty element
        const qtyEl = document.getElementById(`qty-${itemId}`);
        if (!qtyEl) return;
        
        // Find the minus button
        const row = document.getElementById(`item-${itemId}`);
        const minusBtn = row ? row.querySelector('button[onclick*="-1"]') : null;
        
        let currentQty = parseInt(qtyEl.innerText);
        let newQty = currentQty + change;
        
        if (newQty < 1) return;

        // Optimistic UI update
        qtyEl.innerText = newQty;
        
        // Update minus button state immediately
        if (minusBtn) {
            if (newQty <= 1) {
                minusBtn.disabled = true;
                minusBtn.style.opacity = '0.3';
                minusBtn.style.cursor = 'not-allowed';
            } else {
                minusBtn.disabled = false;
                minusBtn.style.opacity = '1';
                minusBtn.style.cursor = 'pointer';
            }
        }
        
        fetch(`/cart/update/${itemId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateCartUI(data.data.cart);
            } else {
                // Revert on failure
                qtyEl.innerText = currentQty;
                // Revert minus button state
                if (minusBtn) {
                    if (currentQty <= 1) {
                        minusBtn.disabled = true;
                        minusBtn.style.opacity = '0.3';
                        minusBtn.style.cursor = 'not-allowed';
                    } else {
                        minusBtn.disabled = false;
                        minusBtn.style.opacity = '1';
                        minusBtn.style.cursor = 'pointer';
                    }
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message || 'Failed to update quantity',
                    confirmButtonColor: '#0ea5e9'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            qtyEl.innerText = currentQty;
        });
    }

    function removeItem(itemId) {
        // Use SweetAlert for confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to remove this item from your cart?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ea5e9',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Animate removal
                const row = document.getElementById(`item-${itemId}`);
                if (row) {
                    row.style.opacity = '0.5';
                }

                fetch(`/cart/remove/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if(row) row.remove();
                        updateCartUI(data.data.cart);
                        
                        // Reload if cart is empty to show empty state
                    if (!data.data.cart.items || Object.keys(data.data.cart.items).length === 0) {
            window.location.reload();
        }
        
                    } else {
                        if(row) row.style.opacity = '1';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message || 'Failed to remove item',
                            confirmButtonColor: '#0ea5e9'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if(row) row.style.opacity = '1';
                });
            }
        });
    }

    function applyCoupon() {
        const code = document.getElementById('coupon-code').value;
        if (!code) return;

        fetch('{{ route("customer.cart.coupon.apply") }}', {
            method: 'POST',
             headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ coupon_code: code })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Applied!',
                    text: 'Coupon applied successfully!',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Coupon',
                    text: data.message || 'Failed to apply coupon',
                    confirmButtonColor: '#0ea5e9'
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateCartUI(cart) {
        // Update counts
        const count = cart.items_count || 0;
        document.getElementById('item-count').innerText = count;
        
        // Update header cart count if exists
        const headerCount = document.getElementById('cartCount');
        if (headerCount) {
             headerCount.innerText = count;
             if (count > 0) {
                 headerCount.classList.remove('hidden');
             } else {
                 headerCount.classList.add('hidden');
             }
        }

        // Update Summary
        document.getElementById('summary-subtotal').innerText = '₹' + parseFloat(cart.subtotal).toFixed(2);
        document.getElementById('summary-tax').innerText = '₹' + parseFloat(cart.tax_total).toFixed(2);
        // Use grand_total as backend returns grand_total
        document.getElementById('summary-total').innerText = '₹' + parseFloat(cart.grand_total).toFixed(2);

        // Update Discount
        const discountRow = document.getElementById('discount-row');
        if (cart.discount_total > 0) {
            discountRow.classList.remove('hidden');
            document.getElementById('discount-amount').innerText = parseFloat(cart.discount_total).toFixed(2);
        } else {
            discountRow.classList.add('hidden');
        }

        // Update Free Shipping Bar
        updateFreeShippingProgress(cart.subtotal);
    }

    function updateFreeShippingProgress(subtotal) {
        subtotal = parseFloat(subtotal);
        const progressBar = document.getElementById('progress-bar');
        const shippingMsg = document.getElementById('shipping-message');

        const remaining = Math.max(0, FREE_SHIPPING_THRESHOLD - subtotal);
        let progress = 100;
        if (FREE_SHIPPING_THRESHOLD > 0) {
             progress = Math.min(100, (subtotal / FREE_SHIPPING_THRESHOLD) * 100);
        }

        progressBar.style.width = `${progress}%`;

        if (remaining <= 0) {
            shippingMsg.innerHTML = `<span class="font-semibold text-[#0ea5e9]">You've unlocked free shipping! 🎉</span>`;
        } else {
            shippingMsg.innerHTML = `Add <span class="font-bold text-[#0ea5e9]">₹${remaining.toFixed(2)}</span> to unlock free shipping`;
        }
    }
</script>
@endpush