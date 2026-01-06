@extends('customer.layouts.master')

@section('title', 'Refund, Replacement & Cancellation Policy | Dr. Kinjal Skincare')
@section('description', 'Learn about our refund, replacement, and cancellation policies for Dr. Kinjal skincare products.')

@section('styles')
<style>
    .policy-item {
        animation: fadeInUp 0.5s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .policy-filter.active {
        background-color: rgb(204 251 241) !important;
        color: rgb(19 78 74) !important;
        border-color: rgb(153 246 228) !important;
    }

    /* Improve mobile touch targets */
    @media (max-width: 640px) {
        button, 
        a,
        .policy-filter {
            min-height: 44px;
        }
        
        select {
            min-height: 48px;
        }
    }

    /* Container responsive padding */
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    @media (min-width: 640px) {
        .container {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }

    @media (min-width: 1024px) {
        .container {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
</style>
@endsection

@section('content')
<section class="py-8 md:py-12 lg:py-16 xl:py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

        <!-- Header -->
        <div class="text-center mb-8 md:mb-12 lg:mb-16 max-w-3xl mx-auto px-2">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-4 md:mb-6">
                Refund, Replacement & Cancellation Policy
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-slate-600 leading-relaxed">
                Clear guidelines for returns, replacements, and order cancellations
            </p>
        </div>

        <!-- Mobile Policy Navigation -->
        <div class="mb-8 md:hidden">
            <select id="mobile-policy-filter" class="w-full px-4 py-3 bg-white text-slate-700 font-medium rounded-xl border border-slate-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none">
                <option value="all">All Policies</option>
                <option value="wrong-item">Wrong/Missing Item</option>
                <option value="damaged">Damaged Items</option>
                <option value="non-applicable">Non-Applicable Cases</option>
                <option value="cancellation">Cancellation Policy</option>
                <option value="pricing">Pricing & Shipping</option>
            </select>
        </div>

        <!-- Desktop Policy Navigation -->
        <div class="hidden md:flex flex-wrap justify-center gap-2 lg:gap-3 xl:gap-4 mb-8 md:mb-12 lg:mb-16 px-2">
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-teal-100 text-teal-900 font-medium rounded-full hover:shadow-lg transition-all border border-teal-200 active text-sm lg:text-base" data-section="all">
                <i data-lucide="file-text" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> All Policies
            </button>
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-teal-50 hover:text-teal-700 hover:shadow-lg transition-all border border-slate-200 text-sm lg:text-base" data-section="wrong-item">
                <i data-lucide="package-x" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> Wrong/Missing
            </button>
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-rose-50 hover:text-rose-700 hover:shadow-lg transition-all border border-slate-200 text-sm lg:text-base" data-section="damaged">
                <i data-lucide="package-minus" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> Damaged
            </button>
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-amber-50 hover:text-amber-700 hover:shadow-lg transition-all border border-slate-200 text-sm lg:text-base" data-section="non-applicable">
                <i data-lucide="ban" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> Non-Applicable
            </button>
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 hover:shadow-lg transition-all border border-slate-200 text-sm lg:text-base" data-section="cancellation">
                <i data-lucide="x-circle" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> Cancellation
            </button>
            <button class="policy-filter px-4 py-2 lg:px-5 lg:py-2.5 xl:px-6 xl:py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-blue-50 hover:text-blue-700 hover:shadow-lg transition-all border border-slate-200 text-sm lg:text-base" data-section="pricing">
                <i data-lucide="tag" class="inline w-4 h-4 lg:w-5 lg:h-5 mr-1.5 lg:mr-2"></i> Pricing & Shipping
            </button>
        </div>

        <!-- Policy Content -->
        <div class="space-y-4 sm:space-y-5 md:space-y-6 lg:space-y-8 px-2 sm:px-0" id="policy-container">

            <!-- Wrong/Missing/Expired/Empty Item Delivered -->
            <div class="policy-item bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 md:p-8 hover:shadow-lg lg:hover:shadow-xl transition-shadow border border-slate-100" data-section="wrong-item">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 lg:gap-6">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-teal-50 rounded-xl sm:rounded-2xl flex items-center justify-center">
                        <i data-lucide="package-x" class="w-6 h-6 sm:w-7 sm:h-7 text-teal-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 sm:px-3 sm:py-1 bg-teal-50 text-teal-700 text-xs sm:text-sm font-medium rounded-full">Wrong/Missing Item</span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-3 sm:mb-4">
                            Wrong / Missing / Expired / Empty Item Delivered
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-4 sm:mb-6">
                            In cases where you have received a package which seems without weight / empty in the first instance, please record a video of unboxing of the package by you.
                        </p>
                        
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 mb-4 sm:mb-6">
                            <h4 class="text-sm sm:text-base md:text-lg font-semibold text-slate-800 mb-3 sm:mb-4">If you receive an incorrect product, please follow these steps:</h4>
                            <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-teal-100 text-teal-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">1</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 1 – Raise a replacement request</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Within 3 days from the date of delivery by emailing us at <strong>DrKinjal.official@gmail.com</strong> or via WhatsApp at <strong>9428289077 / 6353283376</strong>, along with:</p>
                                        <ul class="mt-2 space-y-1 text-slate-600 text-sm sm:text-base">
                                            <li>• Clear pictures of the wrong item received</li>
                                            <li>• Your Order ID</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-teal-100 text-teal-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">2</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 2 – Review period</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Please allow us 48 working hours to review your request.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-teal-100 text-teal-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">3</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 3 – Reverse pickup</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Upon approval, our courier partner will arrange a reverse pickup of the incorrect product.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-teal-100 text-teal-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">4</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 4 – Alternative solution</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">If reverse pickup service is not available at your location, we will guide you with an alternative solution.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-teal-100 text-teal-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">5</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 5 – Replacement/Refund</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Once the wrong product is successfully picked up, we will dispatch the replacement product (subject to stock availability). If replacement is not available, a refund will be initiated.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item Damaged on Delivery -->
            <div class="policy-item bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 md:p-8 hover:shadow-lg lg:hover:shadow-xl transition-shadow border border-slate-100" data-section="damaged">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 lg:gap-6">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-rose-50 rounded-xl sm:rounded-2xl flex items-center justify-center">
                        <i data-lucide="package-minus" class="w-6 h-6 sm:w-7 sm:h-7 text-rose-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 sm:px-3 sm:py-1 bg-rose-50 text-rose-700 text-xs sm:text-sm font-medium rounded-full">Damaged Items</span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-3 sm:mb-4">
                            Item Damaged on Delivery
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-4 sm:mb-6">
                            In cases where you have received a package which seems without weight/broken in the first instance, please record a video of unboxing of the package by you.
                        </p>
                        
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6">
                            <h4 class="text-sm sm:text-base md:text-lg font-semibold text-slate-800 mb-3 sm:mb-4">If you receive a damaged product, please follow these steps:</h4>
                            <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-rose-100 text-rose-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">1</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 1 – Raise a replacement request</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Within 3 days from the date of delivery by emailing <strong>DrKinjal.official@gmail.com</strong> or WhatsApp <strong>9428289077 / 6353283376</strong>, with:</p>
                                        <ul class="mt-2 space-y-1 text-slate-600 text-sm sm:text-base">
                                            <li>• Clear pictures of the damaged product</li>
                                            <li>• Your Order ID</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-rose-100 text-rose-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">2</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 2 – Review period</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Allow us 48 working hours to review the request.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-rose-100 text-rose-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">3</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 3 – Product collection</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">After approval, our courier partner will collect the damaged product.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-rose-100 text-rose-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">4</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 4 – Alternate arrangement</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">If reverse pickup is unavailable in your area, we will assist with an alternate arrangement.</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <div class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 bg-rose-100 text-rose-900 font-bold rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base">5</div>
                                    <div class="min-w-0">
                                        <h5 class="font-medium text-slate-800 mb-1 text-sm sm:text-base">Step 5 – Replacement/Refund</h5>
                                        <p class="text-slate-600 text-sm sm:text-base">Once the damaged product is picked up, a replacement will be shipped (subject to availability) or a refund will be processed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cases Where Return/Replacement Is Not Applicable -->
            <div class="policy-item bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 md:p-8 hover:shadow-lg lg:hover:shadow-xl transition-shadow border border-slate-100" data-section="non-applicable">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 lg:gap-6">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-amber-50 rounded-xl sm:rounded-2xl flex items-center justify-center">
                        <i data-lucide="ban" class="w-6 h-6 sm:w-7 sm:h-7 text-amber-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 sm:px-3 sm:py-1 bg-amber-50 text-amber-700 text-xs sm:text-sm font-medium rounded-full">Non-Applicable Cases</span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-3 sm:mb-4">
                            Cases Where Return / Replacement Is Not Applicable
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-4 sm:mb-6">
                            We will not be able to accept returns or replacements in the following cases:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-4 sm:gap-5 lg:gap-6">
                            <div class="bg-amber-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                <ul class="space-y-3 sm:space-y-4">
                                    <li class="flex items-start gap-3">
                                        <i data-lucide="x" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <span class="text-slate-700 text-sm sm:text-base">Products that are opened, used, or altered</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i data-lucide="x" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <span class="text-slate-700 text-sm sm:text-base">Missing original packaging, including mono cartons, labels, or seals</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i data-lucide="x" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <span class="text-slate-700 text-sm sm:text-base">Return/replacement requests raised after 3 days from delivery</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-rose-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                <div class="flex items-start gap-3 mb-3 sm:mb-4">
                                    <i data-lucide="x" class="w-4 h-4 sm:w-5 sm:h-5 text-rose-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                    <span class="text-slate-700 font-semibold text-sm sm:text-base">Makeup products (non-returnable & non-refundable due to hygiene reasons)</span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-600 italic">For health and safety reasons, all makeup products are final sale and cannot be returned or exchanged.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Cancellation Policy -->
            <div class="policy-item bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 md:p-8 hover:shadow-lg lg:hover:shadow-xl transition-shadow border border-slate-100" data-section="cancellation">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 lg:gap-6">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-purple-50 rounded-xl sm:rounded-2xl flex items-center justify-center">
                        <i data-lucide="x-circle" class="w-6 h-6 sm:w-7 sm:h-7 text-purple-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 sm:px-3 sm:py-1 bg-purple-50 text-purple-700 text-xs sm:text-sm font-medium rounded-full">Cancellation Policy</span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-4 sm:mb-6">
                            Order Cancellation Policy
                        </h3>
                        
                        <div class="grid gap-4 sm:gap-5 lg:gap-6">
                            <div class="bg-purple-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                <div class="flex items-center gap-3 sm:gap-4 mb-3">
                                    <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="check" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-600"></i>
                                    </div>
                                    <h4 class="text-sm sm:text-base md:text-lg font-semibold text-slate-800">Orders can be cancelled</h4>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-base">Only before they are processed for shipping.</p>
                            </div>
                            
                            <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                <div class="flex items-center gap-3 sm:gap-4 mb-3">
                                    <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="x" class="w-4 h-4 sm:w-5 sm:h-5 text-slate-600"></i>
                                    </div>
                                    <h4 class="text-sm sm:text-base md:text-lg font-semibold text-slate-800">Cancellation not possible</h4>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-base">Once the order is processed or shipped, cancellation is not possible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing & Shipping Information -->
            <div class="policy-item bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 md:p-8 hover:shadow-lg lg:hover:shadow-xl transition-shadow border border-slate-100" data-section="pricing">
                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-5 lg:gap-6">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-blue-50 rounded-xl sm:rounded-2xl flex items-center justify-center">
                        <i data-lucide="tag" class="w-6 h-6 sm:w-7 sm:h-7 text-blue-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 sm:px-3 sm:py-1 bg-blue-50 text-blue-700 text-xs sm:text-sm font-medium rounded-full">Pricing & Shipping</span>
                        </div>
                        
                        <div class="space-y-6 sm:space-y-8">
                            <!-- Shipping Charges -->
                            <div>
                                <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-3 sm:mb-4">Shipping Charges</h3>
                                <div class="grid md:grid-cols-2 gap-4 sm:gap-5 lg:gap-6">
                                    <div class="bg-blue-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="truck" class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600"></i>
                                            <h4 class="font-semibold text-slate-800 text-sm sm:text-base md:text-base">FREE Shipping</h4>
                                        </div>
                                        <p class="text-slate-700 text-sm sm:text-base">Offered on orders above the minimum order value (as notified from time to time).</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6">
                                        <div class="flex items-center gap-3 mb-3">
                                            <i data-lucide="credit-card" class="w-5 h-5 sm:w-6 sm:h-6 text-slate-600"></i>
                                            <h4 class="font-semibold text-slate-800 text-sm sm:text-base md:text-base">Cash on Delivery (COD)</h4>
                                        </div>
                                        <p class="text-slate-700 text-sm sm:text-base">Option is available for your convenience.</p>
                                    </div>
                                </div>
                                <p class="mt-3 sm:mt-4 text-slate-600 italic text-xs sm:text-sm">Shipping charges (if applicable) shown at checkout are final and non-refundable.</p>
                            </div>
                            
                            <!-- Pricing Information -->
                            <div>
                                <h3 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-bold text-slate-900 mb-3 sm:mb-4">Pricing Information</h3>
                                <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6 space-y-3 sm:space-y-4">
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="info" class="w-4 h-4 sm:w-5 sm:h-5 text-slate-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">We strive to ensure accurate product and pricing details; however, errors may occur.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="check-circle" class="w-4 h-4 sm:w-5 sm:h-5 text-green-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">Product prices are confirmed only after order placement.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="alert-triangle" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">If a product is listed with incorrect pricing or information, Dr. Kinjal reserves the right to cancel or modify the order before dispatch.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="refresh-ccw" class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">If payment has already been processed and the order is cancelled, the full amount will be refunded to the original payment method.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="percent" class="w-4 h-4 sm:w-5 sm:h-5 text-purple-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">Promotional offers and discounts are category-specific and not applicable site-wide.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="tag" class="w-4 h-4 sm:w-5 sm:h-5 text-teal-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">Coupon codes may not apply to certain products or categories.</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <i data-lucide="bell" class="w-4 h-4 sm:w-5 sm:h-5 text-rose-600 flex-shrink-0 mt-0.5 sm:mt-1"></i>
                                        <p class="text-slate-700 text-sm sm:text-base">Prices and availability are subject to change without prior notice.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Contact CTA -->
        <div class="mt-8 sm:mt-12 md:mt-16 lg:mt-20 bg-gradient-to-br from-slate-900 to-teal-900 rounded-xl sm:rounded-2xl lg:rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 text-center text-white shadow-xl sm:shadow-2xl shadow-teal-900/20 mx-2 sm:mx-0">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Need Assistance with Your Order?</h2>
            <p class="text-sm sm:text-base md:text-lg mb-6 sm:mb-8 max-w-2xl mx-auto opacity-90 px-2 sm:px-0">
                Our customer support team is here to help you with refunds, replacements, cancellations, or any order-related queries.
            </p>
            
            <div class="grid md:grid-cols-2 gap-4 sm:gap-6 md:gap-8 max-w-2xl mx-auto mb-6 sm:mb-8 md:mb-10">
                <div class="bg-white/10 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 backdrop-blur-sm">
                    <i data-lucide="mail" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 text-teal-300 mb-3 sm:mb-4"></i>
                    <h4 class="font-semibold text-base sm:text-lg md:text-xl mb-1.5 sm:mb-2">Email Support</h4>
                    <a href="mailto:DrKinjal.official@gmail.com" class="text-teal-200 hover:text-white transition-colors text-sm sm:text-base break-all">
                        DrKinjal.official@gmail.com
                    </a>
                </div>
                <div class="bg-white/10 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 backdrop-blur-sm">
                    <i data-lucide="phone" class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 text-teal-300 mb-3 sm:mb-4"></i>
                    <h4 class="font-semibold text-base sm:text-lg md:text-xl mb-1.5 sm:mb-2">Phone & WhatsApp</h4>
                    <div class="space-y-1">
                        <a href="tel:9428289077" class="block text-teal-200 hover:text-white transition-colors text-sm sm:text-base">
                            9428289077
                        </a>
                        <a href="tel:6353283376" class="block text-teal-200 hover:text-white transition-colors text-sm sm:text-base">
                            6353283376
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <a href="mailto:DrKinjal.official@gmail.com" class="px-6 py-3 sm:px-7 sm:py-3.5 md:px-8 md:py-4 bg-white text-slate-900 font-semibold rounded-full hover:scale-105 transition-transform inline-flex items-center justify-center text-sm sm:text-base">
                    <i data-lucide="mail" class="inline w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2"></i> Email Us
                </a>
                <a href="tel:9428289077" class="px-6 py-3 sm:px-7 sm:py-3.5 md:px-8 md:py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white/10 transition-colors inline-flex items-center justify-center text-sm sm:text-base">
                    <i data-lucide="phone" class="inline w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2"></i> Call Support
                </a>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.policy-filter');
    const policyItems = document.querySelectorAll('.policy-item');
    const mobileFilter = document.getElementById('mobile-policy-filter');
    
    // Function to filter policy items
    function filterPolicyItems(section) {
        // Update active state for desktop buttons
        filterButtons.forEach(btn => {
            btn.classList.remove('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
            btn.classList.add('bg-white', 'text-slate-700');
            if (btn.dataset.section === section) {
                btn.classList.remove('bg-white', 'text-slate-700');
                btn.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
            }
        });
        
        // Show/hide policy items
        policyItems.forEach(item => {
            if (section === 'all' || item.dataset.section === section) {
                item.style.display = 'flex';
                // Force reflow for animation
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    if (item.style.opacity === '0') {
                        item.style.display = 'none';
                    }
                }, 300);
            }
        });
    }
    
    // Desktop filter button event listeners
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const section = button.dataset.section;
            filterPolicyItems(section);
            
            // Scroll to first visible policy item on mobile
            if (window.innerWidth < 768) {
                const firstVisible = document.querySelector('.policy-item[style*="display: flex"]');
                if (firstVisible) {
                    firstVisible.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
    
    // Mobile filter select event listener
    if (mobileFilter) {
        mobileFilter.addEventListener('change', (e) => {
            filterPolicyItems(e.target.value);
            
            // Scroll to first visible policy item
            const firstVisible = document.querySelector('.policy-item[style*="display: flex"]');
            if (firstVisible) {
                firstVisible.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
    
    // Initialize all policy items as visible
    policyItems.forEach(item => {
        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        item.style.display = 'flex';
        item.style.opacity = '1';
        item.style.transform = 'translateY(0)';
    });
    
    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Reinitialize display on resize
            policyItems.forEach(item => {
                const computedStyle = window.getComputedStyle(item);
                if (computedStyle.display !== 'none') {
                    item.style.display = 'flex';
                }
            });
        }, 250);
    });
});
</script>
@endpush