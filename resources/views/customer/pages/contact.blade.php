@extends('customer.layouts.master')

@section('title', 'Contact Us | Dr. Kinjal Skincare')
@section('description', 'Get in touch with Dr. Kinjal customer support. Find answers to FAQs about orders, products, payments, and collaborations.')

@section('content')
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        
        <!-- Header -->
        <div class="text-center mb-8 md:mb-12 lg:mb-16 max-w-3xl mx-auto">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">
                Contact Us – Dr. Kinjal
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-slate-600 leading-relaxed">
                We're here to help! Whether you have a query about your order, products, payments, or collaborations, 
                feel free to reach out to us through the details below.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Contact Card 1: Phone -->
            <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-sky-50 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="phone" class="w-8 h-8 text-sky-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Phone / WhatsApp</h3>
                    <p class="text-slate-600 mb-4">Speak directly with our customer support team</p>
                    <div class="space-y-3 w-full">
                        <a href="tel:9428289077" class="block py-3 px-4 bg-sky-50 text-sky-700 rounded-lg hover:bg-sky-100 transition-colors font-medium">
                            📞 Primary: 9428289077
                        </a>
                        <a href="tel:6353283376" class="block py-3 px-4 bg-sky-50 text-sky-700 rounded-lg hover:bg-sky-100 transition-colors font-medium">
                            📞 Alternate: 6353283376
                        </a>
                    </div>
                    <p class="text-sm text-slate-500 mt-4">
                        <i data-lucide="clock" class="w-4 h-4 inline mr-1"></i>
                        Mon-Fri: 10 AM - 7 PM
                    </p>
                </div>
            </div>

            <!-- Contact Card 2: Email -->
            <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="mail" class="w-8 h-8 text-emerald-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Email Support</h3>
                    <p class="text-slate-600 mb-4">Send us your queries or collaboration proposals</p>
                    <a href="mailto:DrKinjal.official@gmail.com" class="w-full py-3 px-4 bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 transition-colors font-medium truncate">
                        📧 DrKinjal.official@gmail.com
                    </a>
                    <p class="text-sm text-slate-500 mt-4">
                        <i data-lucide="clock" class="w-4 h-4 inline mr-1"></i>
                        Response within 24 hours
                    </p>
                </div>
            </div>

            <!-- Contact Card 3: Address -->
            <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="map-pin" class="w-8 h-8 text-amber-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Our Office</h3>
                    <p class="text-slate-600 mb-4">Visit our headquarters in Rajkot</p>
                    <div class="text-left text-slate-700 bg-amber-50 rounded-lg p-4 w-full">
                        <p class="font-medium">Golden Club A</p>
                        <p class="text-sm">401,402 Nirmala Rd, Nr.Hanuman Madhi</p>
                        <p class="text-sm">Rajkot, Gujarat, India</p>
                    </div>
                    <p class="text-sm text-slate-500 mt-4">
                        <i data-lucide="building" class="w-4 h-4 inline mr-1"></i>
                        Registered Office
                    </p>
                </div>
            </div>
        </div>

        <!-- Support Information Section -->
        <div class="mt-16 bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-slate-100">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-3">Customer Support Information</h2>
                <p class="text-slate-600 max-w-3xl mx-auto">Everything you need to know about getting help with your Dr. Kinjal experience</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Support Hours -->
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="clock" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Support Hours</h3>
                            <div class="space-y-2 text-slate-600">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-4 h-4 text-blue-500"></i>
                                    <span>Monday to Friday</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="clock" class="w-4 h-4 text-blue-500"></i>
                                    <span>10:00 AM – 7:00 PM IST</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar-off" class="w-4 h-4 text-blue-500"></i>
                                    <span>Closed on National Holidays</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Support -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="package" class="w-6 h-6 text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Order Support</h3>
                            <ul class="space-y-2 text-slate-600">
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 mt-1"></i>
                                    <span>Order confirmation within 15 minutes</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 mt-1"></i>
                                    <span>Tracking updates via SMS & Email</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 mt-1"></i>
                                    <span>4-5 business day delivery</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Payment & Policies -->
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="credit-card" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Payment Methods</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Credit/Debit Cards</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">UPI</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Net Banking</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Cash on Delivery</span>
                            </div>
                            <p class="text-sm text-slate-500 mt-2">*COD available for eligible locations</p>
                        </div>
                    </div>

                    <!-- Policies -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="file-text" class="w-6 h-6 text-rose-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">Important Policies</h3>
                            <div class="space-y-2">
                                <a href="#" class="block text-sky-600 hover:text-sky-700 hover:underline">
                                    • Shipping & Delivery Policy
                                </a>
                                <a href="#" class="block text-sky-600 hover:text-sky-700 hover:underline">
                                    • Refund & Return Policy
                                </a>
                                <a href="#" class="block text-sky-600 hover:text-sky-700 hover:underline">
                                    • Privacy Policy
                                </a>
                                <a href="#" class="block text-sky-600 hover:text-sky-700 hover:underline">
                                    • Terms of Service
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Common Questions -->
        <div class="mt-16">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-3">Frequently Asked Questions</h2>
                <p class="text-slate-600 max-w-3xl mx-auto">Quick answers to common questions about orders, products, and services</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Column 1 -->
                <div class="space-y-6">
                    <!-- Question 1 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                                <span class="text-blue-600 font-bold">Q1</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">How do I track my order?</h3>
                                <p class="text-slate-600">Once shipped, you'll receive tracking links via SMS and email. You can also check order status on our website.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                                <span class="text-green-600 font-bold">Q2</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">What is your delivery time?</h3>
                                <p class="text-slate-600">Orders ship within 2 business days. Delivery takes 4-5 business days depending on location.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                                <span class="text-purple-600 font-bold">Q3</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Do you ship outside India?</h3>
                                <p class="text-slate-600">Currently, we only ship within India. International shipping may be available in the future.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="space-y-6">
                    <!-- Question 4 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                                <span class="text-amber-600 font-bold">Q4</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Are your products natural?</h3>
                                <p class="text-slate-600">We use a blend of natural and clinically approved ingredients focused on safety and results.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-rose-50 rounded-lg flex items-center justify-center">
                                <span class="text-rose-600 font-bold">Q5</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">What if I receive damaged products?</h3>
                                <p class="text-slate-600">Contact us immediately with order details and photos. We'll resolve the issue promptly.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 6 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center">
                                <span class="text-indigo-600 font-bold">Q6</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Interested in collaboration?</h3>
                                <p class="text-slate-600">Email your proposal to DrKinjal.official@gmail.com with details about your collaboration idea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brand Promise -->
        <div class="mt-16 bg-gradient-to-r from-sky-50 to-blue-50 rounded-2xl p-8 md:p-12 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Our Commitment to You</h2>
                <p class="text-lg text-slate-700 mb-6">
                    At Dr. Kinjal, we're committed to providing exceptional customer service. 
                    Our team is dedicated to ensuring your skincare journey is smooth and satisfying.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <i data-lucide="shield-check" class="w-8 h-8 text-sky-600 mx-auto mb-2"></i>
                        <p class="text-sm font-medium text-slate-900">Secure Shopping</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <i data-lucide="truck" class="w-8 h-8 text-sky-600 mx-auto mb-2"></i>
                        <p class="text-sm font-medium text-slate-900">Fast Delivery</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <i data-lucide="headphones" class="w-8 h-8 text-sky-600 mx-auto mb-2"></i>
                        <p class="text-sm font-medium text-slate-900">Support 5 Days/Week</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <i data-lucide="heart" class="w-8 h-8 text-sky-600 mx-auto mb-2"></i>
                        <p class="text-sm font-medium text-slate-900">Satisfaction Guaranteed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Contact -->
        <div class="mt-16 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6">Still Have Questions?</h2>
            <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
                Don't hesitate to reach out. We're here to help with any questions about our products or your order.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:9428289077" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-sky-600 text-white font-semibold rounded-xl hover:bg-sky-700 transition-colors shadow-lg shadow-sky-100">
                    <i data-lucide="phone" class="w-5 h-5"></i>
                    Call Us Now
                </a>
                <a href="mailto:DrKinjal.official@gmail.com" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-slate-800 font-semibold rounded-xl border-2 border-sky-600 hover:bg-sky-50 transition-colors">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                    Send Email
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endpush