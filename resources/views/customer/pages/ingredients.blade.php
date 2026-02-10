@extends('customer.layouts.master')

@section('title', 'Our Ingredients | Dr. Kinjal Skincare')
@section('description', 'Explore our science-backed ingredients carefully selected for effective, safe, and visible results.')

@push('styles')
<style>
    .ingredient-item {
        animation: fadeInUp 0.5s ease-out;
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }

    .ingredient-item img {
        transition: transform 0.5s ease;
    }

    .ingredient-item:hover img {
        transform: scale(1.05);
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

    .ingredient-filter.active {
        background-color: rgb(204 251 241) !important;
        color: rgb(19 78 74) !important;
        border-color: rgb(153 246 228) !important;
    }

    /* Fix for product category tags */
    .inline-flex.items-center.gap-2.mb-3 {
        flex-wrap: wrap;
        max-height: 60px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .inline-flex.items-center.gap-2.mb-3::-webkit-scrollbar {
        width: 4px;
    }

    .inline-flex.items-center.gap-2.mb-3::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .inline-flex.items-center.gap-2.mb-3::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    .inline-flex.items-center.gap-2.mb-3::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
@endpush

@section('content')
<section class="py-12 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="pt-2 text-center mb-16 max-w-4xl mx-auto">
            <h1 class="text-5xl font-bold text-slate-900 mb-6">
                Power of Pure Ingredients
            </h1>
            <p class="text-xl text-slate-600">
                Science-backed formulations combining natural extracts with clinically proven actives
            </p>
        </div>

        <!-- Product Navigation -->
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <button class="ingredient-filter px-5 py-2.5 bg-teal-100 text-teal-900 font-medium rounded-full hover:shadow-lg transition-all border border-teal-200 active flex items-center" data-category="all">
                <i data-lucide="layers" class="w-4 h-4 mr-2"></i> All Ingredients
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-rose-50 hover:text-rose-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="facewash">
                <i data-lucide="sparkles" class="w-4 h-4 mr-2"></i> Face Wash
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-sky-50 hover:text-sky-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="moisturizer">
                <i data-lucide="droplets" class="w-4 h-4 mr-2"></i> Moisturizer
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-emerald-50 hover:text-emerald-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="shampoo">
                <i data-lucide="wind" class="w-4 h-4 mr-2"></i> Shampoo
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="serum">
                <i data-lucide="flask-conical" class="w-4 h-4 mr-2"></i> Serum
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-teal-50 hover:text-teal-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="bodywash">
                <i data-lucide="shower-head" class="w-4 h-4 mr-2"></i> Body Wash
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-amber-50 hover:text-amber-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="conditioner">
                <i data-lucide="heart" class="w-4 h-4 mr-2"></i> Conditioner
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-yellow-50 hover:text-yellow-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="soap">
                <i data-lucide="soap" class="w-4 h-4 mr-2"></i> Soap
            </button>
            <button class="ingredient-filter px-5 py-2.5 bg-white text-slate-700 font-medium rounded-full hover:bg-orange-50 hover:text-orange-700 hover:shadow-lg transition-all border border-slate-200 flex items-center" data-category="sunscreen">
                <i data-lucide="sun" class="w-4 h-4 mr-2"></i> Sunscreen
            </button>
        </div>

        <!-- Ingredients Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="ingredients-container">

            <!-- Aloe Vera (8) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-green-100" data-category="facewash,moisturizer,shampoo,bodywash,soap,sunscreen">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-green-50 to-emerald-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1314139105/photo/organic-aloe-vera-fresh-leaf-isolated.jpg?s=612x612&w=0&k=20&c=mEwwxItAzUfMdUiwNJPl3i_g_amBSCp24VGpfuiRCQ4=" alt="Aloe Vera" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Aloe Vera
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Natural soothing agent that calms irritation and redness. Provides hydration, promotes healing, and maintains moisture balance across all skin and hair types.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full">Sunscreen</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-inflammatory</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Soothing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hydration</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Healing</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Allantoin (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-pink-100" data-category="bodywash,sunscreen">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-pink-50 to-rose-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1400455429/photo/the-common-comfrey-herb-with-jar-of-cosmetic-cream.webp?a=1&b=1&s=612x612&w=0&k=20&c=nWGMXrfw6uFdB9q7TvTtQVDxQWdMSzRmVqPo0Ip-HcI=" alt="Allantoin" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Allantoin
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Promotes cell regeneration and wound healing while reducing skin sensitivity. Gently exfoliates dead skin cells and soothes irritated skin for a smoother complexion.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full">Sunscreen</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Cell Regeneration</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Soothing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Gentle Exfoliation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Almond Oil (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-brown-100" data-category="conditioner">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-brown-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/Almond-oil.png') }}" alt="Almond Oil" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Almond Oil
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich in essential vitamins E and B, and fatty acids that deeply nourish hair. Repairs split ends, smooths rough strands, and enhances natural shine.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded-full">Conditioner</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Split End Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Shine Enhancement</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Deep Nourishment</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Argan Oil (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-yellow-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-yellow-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/155268256/photo/argan-oil-with-fruits.jpg?s=612x612&w=0&k=20&c=UaXrsONOC0gT21jIEpu7gjX-3WKrY3oburOg090Qt6o=" alt="Argan Oil" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Argan Oil
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich in vitamin E and fatty acids, nourishes hair, adds shine, and protects from environmental damage. Lightweight and non-greasy.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Nourishing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Shine Enhancement</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Protection</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arbutin (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-emerald-100" data-category="facewash,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/993601746/photo/homeopathy-a-homeopathy-concept-with-homeopathic-medicine.jpg?s=612x612&w=0&k=20&c=k44R2y3uUZAZ0VCEN0g_8yKClFWgL9rtmbVxvOXqHuI=" alt="Arbutin" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Arbutin
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Natural skin lightener derived from bearberry plants. Gently inhibits tyrosinase activity to reduce melanin formation, effectively treating hyperpigmentation without irritation.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Natural Lightening</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Even Tone</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Gentle Action</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biotin (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-rose-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-rose-50 to-pink-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1294691935/photo/open-capsule-with-biotin-from-which-the-vitamin-composition-is-pouring.jpg?s=612x612&w=0&k=20&c=lUiGwE9xTtbAZ4AHAWBdPjDmPYkFqkMhNuajrIXaL6A=" alt="Biotin" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Biotin (Vitamin B7)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Essential vitamin for healthy hair growth, strengthens hair strands, and reduces breakage. Improves overall hair health and thickness.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hair Growth</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Strengthening</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Breakage Reduction</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ceramides (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-100" data-category="moisturizer,shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/ceramides.png') }}" alt="Ceramides" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Ceramides
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Naturally occurring lipids that form the skin's protective barrier. Restore moisture, protect against environmental damage, and prevent moisture loss.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Barrier Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Moisture Lock</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Protection</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cocoa Butter (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-brown-100" data-category="soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-brown-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1224797793/photo/cacao-butter-and-beans-in-wooden-bowl-with-fresh-original-leaves.jpg?s=612x612&w=0&k=20&c=yr2W_Xl0Dlnl4aL3cp7ajCdSQ2LvqmTRU6yxkKmM5UA=" alt="Cocoa Butter" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Cocoa Butter
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich emollient that softens skin and improves elasticity. Provides deep moisturization and helps repair dry, damaged skin.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Softening</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Elasticity</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Moisturization</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- D-Panthenol / Pro-Vitamin B5 (3) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-100" data-category="bodywash,conditioner,facewash">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/874463956/photo/molecule.webp?a=1&b=1&s=612x612&w=0&k=20&c=G-XepxumOvKMA-N8CSpbSboxUmbDiZxLte9WR-OIcXI=" alt="D-Panthenol" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            D-Panthenol (Pro-Vitamin B5)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Provitamin B5 that deeply hydrates and strengthens skin/hair barriers. Converts to pantothenic acid, enhancing moisture retention and improving elasticity.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded-full">Conditioner</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Barrier Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Intense Hydration</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Strengthening</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Glycerin (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-sky-100" data-category="moisturizer,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-sky-50 to-cyan-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1163242867/photo/potato-face-mask-for-wrinkles-on-jute-bags-surface-i-e-potato-juice-well-mixed-with-glycerin.jpg?s=612x612&w=0&k=20&c=r1YWohBWS1W70Z9SVO3E-yZXabFHn8rNIfAWv1AD9vc=" alt="Glycerin" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Glycerin
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Superior humectant that draws moisture from the air into the skin. Maintains optimal hydration levels, keeps skin supple, and enhances product spreadability.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Humectant</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Moisture Binding</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Softening</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Glutathione (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-100" data-category="facewash,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-blue-50 to-cyan-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1614386394/photo/cosmetic-essence-liquid-bubbles-molecules-antioxidant-of-liquid-bubble-3d-rendering.jpg?s=612x612&w=0&k=20&c=lCGnT_I5y8QGDdjJaVFcNc1qg7tBWBa7dP7tv92IiVM=" alt="Glutathione" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Glutathione
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Master antioxidant that inhibits tyrosinase enzyme, reducing melanin production. Detoxifies skin, fights oxidative stress, and promotes radiant, even-toned complexion.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Antioxidant Power</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Detox</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Radiant Glow</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Glycolic Acid (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-purple-100" data-category="serum,facewash">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/glycolic-acid.png') }}" alt="Glycolic Acid" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Glycolic Acid (AHA)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Alpha hydroxy acid that exfoliates dead skin cells, improves skin texture, and enhances radiance. Promotes collagen production and helps fade dark spots.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-medium rounded-full">Serum</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Exfoliation</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Texture Improvement</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Brightening</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hyaluronic Acid (4) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-100" data-category="moisturizer,bodywash,soap,sunscreen">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center mb-4">
                            <img src="https://plus.unsplash.com/premium_photo-1681426676206-0f2c02b48aff?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8SHlhbHVyb25pYyUyMEFjaWR8ZW58MHx8MHx8fDA%3D" alt="Hyaluronic Acid" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Hyaluronic Acid
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Holds up to 1000 times its weight in water, providing intense hydration and plumping effect. Improves skin elasticity and reduces the appearance of fine lines.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full">Sunscreen</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Deep Hydration</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Plumping</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Elasticity Boost</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keratin (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/keratin.jpeg') }}" alt="Keratin" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Keratin
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Structural protein that repairs damaged hair, restores strength, and improves elasticity. Reduces frizz and enhances shine.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hair Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Strength Restoration</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Frizz Control</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kojic Acid (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-100" data-category="facewash,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-teal-50 to-emerald-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/Kojic-acid.jpeg') }}" alt="Kojic Acid" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Kojic Acid
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Naturally derived from fungi, inhibits melanin production to reduce hyperpigmentation and dark spots. Effective for treating melasma, age spots, and uneven skin tone.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Dark Spot Reduction</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Even Skin Tone</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-Pigmentation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lactic Acid (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-pink-100" data-category="facewash">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-pink-50 to-rose-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/Lactic-acid.png') }}" alt="Lactic Acid" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Lactic Acid
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Gentle AHA derived from milk that hydrates while exfoliating. Improves skin texture, enhances moisture retention, and is suitable for sensitive skin types.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hydrating Exfoliation</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Texture Refinement</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Sensitive Skin Friendly</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liposomal Caffeine (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-emerald-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-emerald-50 to-teal-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1306490274/photo/structural-chemical-formula-of-caffeine-molecule-with-roasted-coffee-beans.jpg?s=612x612&w=0&k=20&c=jouq-cZVHAhUahSvTL-QmVIRSvXe8bASW6UK-dA7u4Y=" alt="Caffeine" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Liposomal Caffeine
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Stimulates hair follicles, increases blood circulation to scalp, and reduces hair thinning. Liposomal delivery ensures better absorption.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Follicle Stimulation</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-thinning</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Scalp Circulation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mulberry Extract (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-purple-100" data-category="facewash,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-purple-50 to-fuchsia-50 flex items-center justify-center mb-4">
                            <img src="https://images.unsplash.com/photo-1705231956335-8987f9ba4e66?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fE11bGJlcnJ5JTIwRXh0cmFjdHxlbnwwfHwwfHx8MA%3D%3D" alt="Mulberry Extract" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Mulberry Extract
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich in antioxidants and arbutin, naturally brightens skin while fighting free radical damage. Improves skin clarity and provides gentle, natural skin lightening effects.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Natural Brightening</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Antioxidant Rich</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Clarity</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Niacinamide (3) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-purple-100" data-category="facewash,moisturizer,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 flex items-center justify-center mb-4">
                            <img src="https://images.unsplash.com/photo-1707135720210-eafd5343e093?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fE5pYWNpbmFtaWRlJTIwKFZpdGFtaW4lMjBCMyl8ZW58MHx8MHx8fDA%3D" alt="Niacinamide" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Niacinamide (Vitamin B3)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Multi-functional ingredient that improves skin barrier function, reduces redness, minimizes pores, and regulates oil production. Enhances skin's overall resilience and texture.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Barrier Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Pore Minimizing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Redness Reduction</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nasturtium Officinale Extract (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-red-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-red-50 to-rose-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/185255311/photo/herbs-mortal-and-pestle.jpg?s=612x612&w=0&k=20&c=PfWyKMPT2zvVw6K2Hx6jnky2jJOyr_7E75OCTa_wpes=" alt="Nasturtium" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Nasturtium Officinale Extract
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Supports hair growth, improves scalp health, and provides essential nutrients for strong, healthy hair.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hair Growth</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Scalp Nourishment</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Nutrient Rich</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Olive Oil (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-green-100" data-category="moisturizer">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-green-50 to-lime-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1206682746/photo/pouring-extra-virgin-olive-oil-in-a-glass-bowl.jpg?s=612x612&w=0&k=20&c=0b9ppVJN0BNyzpLodnhPV8MzNTGY7-9-kteOUIBPxq8=" alt="Olive Oil" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Olive Oil
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich in antioxidants and vitamin E, moisturizes while protecting skin. Improves smoothness and provides anti-aging benefits.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Antioxidant Rich</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Moisturizing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-aging</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Oatmeal Extract (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-brown-100" data-category="moisturizer">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-brown-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/682340278/photo/glass-jars-of-oatmeal-flaks-and-yellow-honey-white-bathroom-towel.jpg?s=612x612&w=0&k=20&c=Xw5MuYG4Embh6vzp3217bRwuc3wtQvQXnDOvy8Y_GhQ=" alt="Oatmeal Extract" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Oatmeal Extract
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Soothes sensitive skin, reduces dryness and irritation. Provides gentle cleansing while maintaining skin's natural moisture barrier.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Soothing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Sensitive Skin</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-irritation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Procapil (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-purple-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-purple-50 to-violet-50 flex items-center justify-center mb-4">
                            <img src="{{ asset('storage/assets/images/procapil.png') }}" alt="Procapil" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Procapil
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Patented complex that strengthens hair anchoring, prevents hair loss, and promotes thicker, healthier hair growth.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Hair Loss Prevention</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Strengthening</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Growth Support</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salicylic Acid (3) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-100" data-category="facewash,serum,bodywash">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-teal-50 to-cyan-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/2162663818/photo/fresh-green-broccoli-florets-close-up.jpg?s=612x612&w=0&k=20&c=HJOKxWCTLZOHFo51BD5MUDQ7KtnolWrbvK_7SrRU3tc=" alt="Salicylic Acid" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Salicylic Acid (BHA)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Oil-soluble beta hydroxy acid that penetrates deep into pores to dissolve sebum, unclog pores, and fight acne-causing bacteria. Reduces inflammation and prevents future breakouts.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-medium rounded-full">Serum</span>
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Pore Cleansing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Acne Treatment</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-inflammatory</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Saw Palmetto (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-green-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-green-50 to-emerald-50 flex items-center justify-center mb-4">
                            <img src="https://plus.unsplash.com/premium_photo-1706800282273-87f1102044e0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8U2F3JTIwUGFsbWV0dG98ZW58MHx8MHx8fDA%3D" alt="Saw Palmetto" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Saw Palmetto
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Natural DHT blocker that helps reduce hair thinning and promotes scalp health. Supports stronger, thicker hair growth.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">DHT Blocker</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Scalp Health</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Anti-thinning</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shea Butter (2) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-yellow-100" data-category="moisturizer,soap">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-yellow-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="https://images.unsplash.com/photo-1573812461383-e5f8b759d12e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8U2hlYSUyMEJ1dHRlcnxlbnwwfHwwfHx8MA%3D%3D" alt="Shea Butter" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Shea Butter
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Rich in fatty acids and vitamins, provides deep nourishment and barrier repair. Soothes dry, irritated skin and improves elasticity.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Deep Nourishment</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Barrier Repair</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Soothing</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sunflower Oil (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-yellow-100" data-category="conditioner">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-yellow-50 to-orange-50 flex items-center justify-center mb-4">
                            <img src="https://images.unsplash.com/photo-1539082929143-fddeb132545e?q=80&w=1026&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sunflower Oil" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Sunflower Oil
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Lightweight oil that effectively locks in moisture and protects hair from environmental dryness. Restores natural smoothness and adds luster.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-medium rounded-full">Conditioner</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Moisture Sealing</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Environmental Protection</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Luster Restoration</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tropaeolum Majus Extract (1) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-orange-100" data-category="shampoo">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-orange-50 to-red-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1328671235/photo/the-yellow-orange-nasturtium-flowers-with-vine-and-green-leaves-in-the-garden.jpg?s=612x612&w=0&k=20&c=vJFYwNAAGgs_Y5MUfm5FPKKxsM14_goTk94hWLcY7Y4=" alt="Tropaeolum" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Tropaeolum Majus Extract
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Strengthens hair follicles, improves scalp circulation, and promotes healthy hair growth. Rich in nutrients essential for hair vitality.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Shampoo</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Follicle Strength</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Scalp Circulation</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Growth Promotion</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vitamin C (3) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-orange-100" data-category="facewash,soap,sunscreen">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-orange-50 to-yellow-50 flex items-center justify-center mb-4">
                            <img src="https://media.istockphoto.com/id/1170453601/photo/citrus-fruits-fresh-citrus-fruits-sliced.jpg?s=612x612&w=0&k=20&c=7c7r977gK0F0a_jdoJL-3gmLoihCilf1gPHhzeg-Bds=" alt="Vitamin C" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Vitamin C (Ascorbic Acid)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Potent antioxidant that boosts collagen production, fades dark spots, and protects against UV damage. Brightens complexion and improves skin's natural defense system.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full">Sunscreen</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Collagen Boost</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">UV Protection</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Brightening</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vitamin E (5) -->
            <div class="ingredient-item bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-yellow-100" data-category="facewash,moisturizer,bodywash,soap,sunscreen">
                <div class="flex flex-col h-full">
                    <div class="mb-4">
                        <div class="h-48 rounded-xl overflow-hidden bg-gradient-to-br from-yellow-50 to-amber-50 flex items-center justify-center mb-4">
                            <img src="https://images.unsplash.com/photo-1627931754115-478ed65b4fef?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Vitamin E" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">
                            Vitamin E (Tocopherol)
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            Potent antioxidant that nourishes and protects skin from environmental damage. Enhances skin softness, improves texture, and supports natural healing processes.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Face Wash</span>
                            <span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-medium rounded-full">Moisturizer</span>
                            <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-medium rounded-full">Body Wash</span>
                            <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-medium rounded-full">Soap</span>
                            <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full">Sunscreen</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Antioxidant Protection</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Skin Nourishment</span>
                            <span class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs rounded-full">Texture Improvement</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Info Section -->
        <div class="mt-20 pt-10 border-t border-slate-200">
            <div class="max-w-3xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Our Ingredient Philosophy</h3>
                <p class="text-slate-600 mb-6">
                    Every ingredient in Dr. Kinjal products is carefully selected based on scientific research and clinical evidence. 
                    We combine the best of nature and science to create formulations that deliver visible, lasting results.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                    <div class="bg-slate-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i data-lucide="shield-check" class="w-6 h-6 text-teal-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Clinically Proven</h4>
                        <p class="text-sm text-slate-600">Ingredients backed by scientific research</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i data-lucide="leaf" class="w-6 h-6 text-green-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Natural & Safe</h4>
                        <p class="text-sm text-slate-600">Combining natural extracts with safe synthetics</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i data-lucide="flask-conical" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Optimal Concentrations</h4>
                        <p class="text-sm text-slate-600">Carefully balanced for maximum efficacy</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.ingredient-filter');
    const ingredientItems = document.querySelectorAll('.ingredient-item');
    
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
            
            // Show/hide ingredient items
            ingredientItems.forEach(item => {
                const itemCategories = item.dataset.category.split(',');
                
                if (category === 'all' || itemCategories.includes(category)) {
                    item.style.display = 'block';
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
        });
    });
    
    // Initialize all ingredient items as visible
    ingredientItems.forEach(item => {
        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        item.style.display = 'block';
        item.style.opacity = '1';
        item.style.transform = 'translateY(0)';
    });

    // Handle URL parameters for pre-filtering
    const urlParams = new URLSearchParams(window.location.search);
    let categoryParam = urlParams.get('category');
    
    if (categoryParam) {
        categoryParam = categoryParam.toLowerCase();
        
        // Simple mapping for plural/singular differences
        const categoryMapping = {
            'moisturizers': 'moisturizer',
            'serums': 'serum',
            'bodywashes': 'bodywash',
            'facewashes': 'facewash',
            'sunscreens': 'sunscreen'
        };
        
        const targetCategory = categoryMapping[categoryParam] || categoryParam;
        
        // Find and click the corresponding filter button
        const targetButton = Array.from(filterButtons).find(btn => btn.dataset.category === targetCategory);
        if (targetButton) {
            targetButton.click();
            // Scroll to container
            document.getElementById('ingredients-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
    
    // Initialize Lucide icons
    if (window.lucide) {
        lucide.createIcons();
    }
});
</script>
@endpush