@extends('customer.layouts.master')

@section('title', 'Payment | Dr. Kinjal Skincare')

@section('content')
<div class="min-h-[60vh] flex flex-col items-center justify-center py-20 px-6">
    <div class="bg-white p-8 rounded-3xl border border-sky-50 shadow-xl max-w-md w-full text-center">
        <div class="w-16 h-16 bg-sky-50 rounded-full flex items-center justify-center mx-auto mb-6">
            <i data-lucide="shield-check" class="w-8 h-8 text-[#0ea5e9]"></i>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Secure Payment</h1>
        <p class="text-gray-500 mb-8">Completing your secure transaction with Razorpay.</p>

        <div class="flex justify-between items-center py-4 border-y border-gray-100 mb-8">
            <span class="font-medium text-gray-700">Total Amount</span>
            <span class="text-2xl font-bold text-gray-900">₹{{ number_format($amount, 2) }}</span>
        </div>

        <button id="rzp-button1" class="w-full bg-[#0f172a] text-white py-4 rounded-full text-base font-medium hover:bg-[#0ea5e9] active:scale-[0.98] transition-all duration-200 flex justify-center items-center gap-2 shadow-lg shadow-sky-100">
            <span>Pay Now</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </button>

        <p class="text-xs text-center text-gray-400 mt-6 flex items-center justify-center gap-1">
            <i data-lucide="lock" class="w-3 h-3"></i>
            128-bit Encrypted Connection
        </p>
    </div>
</div>

<form id="payment-form" action="{{ route('customer.checkout.payment.callback') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        var options = {
            "key": "{{ $keyId }}",
            "amount": "{{ $amount * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Dr. Kinjal Skincare",
            "description": "Order Payment",
            "image": "{{ asset('assets/images/logo.png') }}", // Ensure this path is correct
            "order_id": "{{ $orderId }}",
            "handler": function (response){
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.getElementById('payment-form').submit();
            },
            "prefill": {
                "name": "{{ $customer->name ?? '' }}",
                "email": "{{ $customer->email ?? '' }}",
                "contact": "{{ $customer->mobile ?? '' }}"
            },
            "notes": {
                "address": "Dr. Kinjal Skincare"
            },
            "theme": {
                "color": "#0ea5e9"
            }
        };

        var rzp1 = new Razorpay(options);
        
        rzp1.on('payment.failed', function (response){
            alert(response.error.description);
        });

        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }

        // Auto open on load for better UX
        // setTimeout(() => rzp1.open(), 1000); 
        // Can be annoying, let user click.
    });
</script>
@endpush
