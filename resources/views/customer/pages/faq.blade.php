@extends('customer.layouts.master')

@section('title', 'FAQs | Dr. Kinjal Skincare')
@section('description', 'Find answers to common questions about our products, ingredients, usage, and skin compatibility.')

@section('content')
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-20 max-w-3xl mx-auto">
            <h1 class="text-5xl font-bold text-slate-900 mb-6">
                Your Questions, Answered
            </h1>
            <p class="text-xl text-slate-600">
                Clear guidance on product usage, ingredients, and skin compatibility
            </p>
        </div>

        <!-- FAQ Navigation -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button
                class="faq-filter px-6 py-3 bg-teal-100 text-teal-900 font-medium rounded-full hover:shadow-lg transition-all border border-teal-200 active"
                data-category="all">
                <i data-lucide="help-circle" class="inline w-5 h-5 mr-2"></i> All FAQs
            </button>
            <button
                class="faq-filter px-6 py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-teal-50 hover:text-teal-700 hover:shadow-lg transition-all border border-slate-200"
                data-category="product">
                <i data-lucide="package" class="inline w-5 h-5 mr-2"></i> Product Info
            </button>
            <button
                class="faq-filter px-6 py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-sky-50 hover:text-sky-700 hover:shadow-lg transition-all border border-slate-200"
                data-category="usage">
                <i data-lucide="clock" class="inline w-5 h-5 mr-2"></i> Usage & Routine
            </button>
            <button
                class="faq-filter px-6 py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-cyan-50 hover:text-cyan-700 hover:shadow-lg transition-all border border-slate-200"
                data-category="skin">
                <i data-lucide="face-smile" class="inline w-5 h-5 mr-2"></i> Skin & Hair
            </button>
            <button
                class="faq-filter px-6 py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-rose-50 hover:text-rose-700 hover:shadow-lg transition-all border border-slate-200"
                data-category="safety">
                <i data-lucide="shield" class="inline w-5 h-5 mr-2"></i> Safety & Storage
            </button>
            <button
                class="faq-filter px-6 py-3 bg-white text-slate-700 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 hover:shadow-lg transition-all border border-slate-200"
                data-category="brand">
                <i data-lucide="star" class="inline w-5 h-5 mr-2"></i> Brand & Quality
            </button>
        </div>

        <!-- FAQ Grid -->
        <div class="space-y-6" id="faq-container">

            <!-- ==================== PRODUCT INFO CATEGORY ==================== -->

            <!-- FAQ 1 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="heart" class="w-7 h-7 text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products suitable for sensitive skin?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Most of our products are formulated to be gentle and suitable for sensitive skin. However,
                            we recommend doing a patch test before first use, especially if you have highly sensitive or
                            reactive skin.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="rabbit" class="w-7 h-7 text-amber-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products cruelty-free?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. We do not test our products on animals and follow cruelty-free practices.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="ban" class="w-7 h-7 text-red-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-red-50 text-red-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products free from harmful chemicals?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Many of our products are free from parabens, sulphates, mineral oil, and other harsh
                            chemicals commonly avoided in modern skincare. Please check individual product descriptions
                            for specific details.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="leaf" class="w-7 h-7 text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-green-50 text-green-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products vegan?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Many of our products are vegan. Please check individual product descriptions for specific
                            details.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="recycle" class="w-7 h-7 text-emerald-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span
                                class="px-3 py-1 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products eco-friendly?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            We strive to use recyclable packaging and follow environmentally responsible practices
                            wherever possible.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="product">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-lime-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="sprout" class="w-7 h-7 text-lime-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-lime-50 text-lime-700 text-sm font-medium rounded-full">Product
                                Info</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Do your products contain natural ingredients?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. We combine natural extracts with clinically proven actives for safe and effective
                            results.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ==================== USAGE & ROUTINE CATEGORY ==================== -->

            <!-- FAQ 7 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="usage">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-sky-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="calendar" class="w-7 h-7 text-sky-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-sm font-medium rounded-full">Usage &
                                Routine</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            How long does it take to see results?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Results vary depending on skin type and concern. Generally, visible improvement can be seen
                            within 2–4 weeks of consistent use.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="usage">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="layers" class="w-7 h-7 text-amber-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-sm font-medium rounded-full">Usage &
                                Routine</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can I use multiple products together?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes, but we recommend following a proper routine and avoiding mixing strong actives unless
                            advised by a professional.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="usage">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="sun" class="w-7 h-7 text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-full">Usage &
                                Routine</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can these products be used daily?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Most products are designed for daily use. Products with exfoliating or active ingredients
                            may have specific usage instructions mentioned on the label.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ==================== SKIN & HAIR CATEGORY ==================== -->

            <!-- FAQ 10 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-rose-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="zap" class="w-7 h-7 text-rose-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products suitable for acne-prone skin?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Many of our products are designed to help control acne, unclog pores, and calm inflamed
                            skin without being harsh.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 11 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-cyan-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="droplet" class="w-7 h-7 text-cyan-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can oily skin use moisturizers?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Absolutely. Oily skin also needs hydration. Our lightweight, non-comedogenic moisturizers
                            are suitable for oily and acne-prone skin.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 12 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="check-circle" class="w-7 h-7 text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products non-comedogenic?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Most of our formulations are non-comedogenic, meaning they do not clog pores and are
                            suitable for acne-prone skin.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 13 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="users" class="w-7 h-7 text-yellow-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-yellow-50 text-yellow-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can teenagers use these products?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Many of our gentle formulations are suitable for teenagers. However, products with
                            strong actives should be used under guidance.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 14 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="sparkles" class="w-7 h-7 text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Do your products help with pigmentation and dark spots?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. We use proven ingredients like niacinamide, alpha arbutin, vitamin C, and exfoliating
                            acids to help reduce pigmentation and improve skin tone.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 15 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="layers-2" class="w-7 h-7 text-indigo-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can I layer your serums?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes, but avoid layering multiple strong actives together unless advised. Always follow
                            product-specific instructions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 16 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-pink-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="venetian-mask" class="w-7 h-7 text-pink-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-pink-50 text-pink-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can both men and women use these hair products?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Our haircare products are designed for all genders.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 17 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="skin">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="hourglass" class="w-7 h-7 text-orange-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-sm font-medium rounded-full">Skin &
                                Hair</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            How long does it take to see hair results?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Visible improvements may be seen within 3–6 weeks of consistent use.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ==================== SAFETY & STORAGE CATEGORY ==================== -->

            <!-- FAQ 18 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="safety">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-rose-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="test-tube" class="w-7 h-7 text-rose-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-sm font-medium rounded-full">Safety &
                                Storage</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Is a patch test necessary?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. We always recommend a patch test before starting any new skincare or haircare product.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 19 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="safety">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-pink-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="baby" class="w-7 h-7 text-pink-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-pink-50 text-pink-700 text-sm font-medium rounded-full">Safety &
                                Storage</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can pregnant or breastfeeding women use these products?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Some products may not be suitable during pregnancy or breastfeeding. Please consult your
                            doctor before use.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 20 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="safety">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="package" class="w-7 h-7 text-slate-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-slate-50 text-slate-700 text-sm font-medium rounded-full">Safety &
                                Storage</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            How should the products be stored?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Store in a cool, dry place away from direct sunlight and heat.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 21 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="safety">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="alert-circle" class="w-7 h-7 text-red-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-red-50 text-red-700 text-sm font-medium rounded-full">Safety &
                                Storage</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            What should I do if irritation occurs?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Discontinue use immediately and consult a dermatologist if irritation persists.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 22 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="safety">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="globe" class="w-7 h-7 text-amber-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-sm font-medium rounded-full">Safety &
                                Storage</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products suitable for Indian skin?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Our products are developed keeping Indian skin, hair, climate, and concerns in mind.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ==================== BRAND & QUALITY CATEGORY ==================== -->

            <!-- FAQ 23 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="badge-check" class="w-7 h-7 text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-sm font-medium rounded-full">Brand
                                & Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are these products doctor-recommended?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Our formulations are developed keeping dermatological science and clinical experience in
                            mind and are commonly recommended by professionals.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 24 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="message-circle" class="w-7 h-7 text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-full">Brand &
                                Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Can I consult before choosing a product?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. We encourage consultation to help you select the right products according to your skin
                            or hair concern.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 25 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="stethoscope" class="w-7 h-7 text-indigo-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-sm font-medium rounded-full">Brand
                                & Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are these products doctor-formulated?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Our products are developed with dermatological knowledge and clinical experience.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 26 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="user-check" class="w-7 h-7 text-teal-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-sm font-medium rounded-full">Brand &
                                Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Do you offer personalized recommendations?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Personalized guidance is available to help you choose the right products.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 27 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="factory" class="w-7 h-7 text-gray-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-gray-50 text-gray-700 text-sm font-medium rounded-full">Brand &
                                Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Where are your products manufactured?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Our products are manufactured in GMP-certified facilities following strict quality
                            standards.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ 28 -->
            <div class="faq-item bg-white rounded-3xl p-8 hover:shadow-xl transition-shadow border border-slate-100"
                data-category="brand">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-7 h-7 text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="inline-flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-green-50 text-green-700 text-sm font-medium rounded-full">Brand &
                                Quality</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">
                            Are your products quality tested?
                        </h3>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Yes. Every batch undergoes quality and safety testing before release.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Consultation CTA -->
        <div
            class="mt-24 bg-gradient-to-br from-slate-900 to-teal-900 rounded-3xl p-12 text-center text-white shadow-2xl shadow-teal-900/20">
            <h2 class="text-3xl font-bold mb-4">Still Have Questions?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto opacity-90">
                Get personalized guidance from our skincare experts. We're here to help you find your perfect routine.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button id="chatExpertBtn"
                    class="px-8 py-4 bg-white text-slate-900 font-semibold rounded-full hover:scale-105 transition-transform">
                    <i data-lucide="message-circle" class="inline w-5 h-5 mr-2"></i>
                    Chat with Expert
                </button>

                <button
                    class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white/10 transition-colors">
                    <i data-lucide="phone" class="inline w-5 h-5 mr-2"></i> Schedule Consultation
                </button>
            </div>
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>
    .faq-item {
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

    .faq-filter.active {
        background-color: rgb(204 251 241) !important;
        color: rgb(19 78 74) !important;
        border-color: rgb(153 246 228) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Chat with Expert button functionality
        const chatExpertBtn = document.getElementById('chatExpertBtn');
        if (chatExpertBtn) {
            chatExpertBtn.addEventListener('click', function() {
                // You can change this to your actual phone number
                window.location.href = 'tel:+919876543210';
            });
        }

        // FAQ filter functionality
        const filterButtons = document.querySelectorAll('.faq-filter');
        const faqItems = document.querySelectorAll('.faq-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active state from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');
                    btn.classList.add('bg-white', 'text-slate-700');
                });

                // Add active state to clicked button
                button.classList.remove('bg-white', 'text-slate-700');
                button.classList.add('bg-teal-100', 'text-teal-900', 'border-teal-200', 'active');

                const category = button.dataset.category;

                // Show/hide FAQ items
                faqItems.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = 'flex';
                        // Force reflow for animation
                        item.offsetHeight;
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
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
            });
        });

        // Initialize all FAQ items as visible
        faqItems.forEach(item => {
            item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            item.style.display = 'flex';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    });
</script>
@endpush