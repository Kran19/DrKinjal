@extends('customer.layouts.master')

@section('title', 'Skin Concerns | Dr. Kinjal Skincare')

@section('description', 'Targeted solutions for your skin concerns. Find the right Dr. Kinjal products for your skin goals.')

@section('styles')
<style>
    /* Add some animation for the highlighted concern */
    #concern-dullness-dark-spots.ring-current { --tw-ring-color: #0d9488; }
    #concern-dryness-dehydration.ring-current { --tw-ring-color: #0284c7; }
    #concern-acne-breakouts.ring-current { --tw-ring-color: #0891b2; }
    #concern-hair-care.ring-current { --tw-ring-color: #7c3aed; }
</style>
@endsection

@section('content')
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-slate-900 mb-4">
                Find Your Skin Solution
            </h1>
            <p class="text-lg text-slate-500">
                Targeted dermatology-inspired solutions for your skin concerns
            </p>
        </div>

        <!-- Concerns Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Concern 1: Dullness and Dark Spots -->
            <div id="concern-dullness-dark-spots" class="bg-teal-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-teal-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="sun" class="w-8 h-8 text-teal-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Dullness & Dark Spots</h3>
                <p class="text-slate-600 mb-6">
                    Combat pigmentation and reveal brighter, even-toned skin with brightening formulas.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('customer.category.products', ['slug' => 'facewash']) }}" class="block font-medium text-teal-600 hover:text-teal-700">Skin Brightening Face Wash →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'combos']) }}" class="block font-medium text-teal-600 hover:text-teal-700">Skin Brightening Soap →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'sunscreen']) }}" class="block font-medium text-teal-600 hover:text-teal-700">Sunscreen →</a>
                </div>
            </div>

            <!-- Concern 2: Dryness and Dehydration -->
            <div id="concern-dryness-dehydration" class="bg-sky-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-sky-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="droplets" class="w-8 h-8 text-sky-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Dryness & Dehydration</h3>
                <p class="text-slate-600 mb-6">
                    Deep hydration boosters that lock moisture for long-lasting glow.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('customer.category.products', ['slug' => 'combos']) }}" class="block font-medium text-sky-600 hover:text-sky-700">Cleansing & Moisturizing Soap →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'moisturizer']) }}" class="block font-medium text-sky-600 hover:text-sky-700">Moisturizer →</a>
                </div>
            </div>

            <!-- Concern 3: Acne and Breakouts -->
            <div id="concern-acne-breakouts" class="bg-cyan-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-cyan-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="zap" class="w-8 h-8 text-cyan-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Acne & Breakouts</h3>
                <p class="text-slate-600 mb-6">
                    Clear pores and calm inflammation with effective formulas.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('customer.category.products', ['slug' => 'facewash']) }}" class="block font-medium text-cyan-600 hover:text-cyan-700">Facewash →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'serum']) }}" class="block font-medium text-cyan-600 hover:text-cyan-700">Face Serum →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'combos']) }}" class="block font-medium text-cyan-600 hover:text-cyan-700">Bodywash & Shower Gel →</a>
                </div>
            </div>

            <!-- Concern 4: Sun Protection -->
            <div id="concern-sun-protection" class="bg-amber-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-amber-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="cloud-sun" class="w-8 h-8 text-amber-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Sun Protection</h3>
                <p class="text-slate-600 mb-6">
                    Essential UV defense for daily protection against sun damage.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('customer.category.products', ['slug' => 'sunscreen']) }}" class="block font-medium text-amber-600 hover:text-amber-700">Sunscreen →</a>
                </div>
            </div>

            <!-- Concern 5: Hair Care -->
            <div id="concern-hair-care" class="bg-violet-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-violet-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="sparkles" class="w-8 h-8 text-violet-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Haircare</h3>
                <p class="text-slate-600 mb-6">
                    Complete hair care solutions for healthy, shiny hair.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('customer.products.list') }}" class="block font-medium text-violet-600 hover:text-violet-700">3-in-1 Shampoo →</a>
                    <a href="{{ route('customer.category.products', ['slug' => 'combos']) }}" class="block font-medium text-violet-600 hover:text-violet-700">Conditioner →</a>
                </div>
            </div>

            <!-- Concern 6: Lip Care -->
            <div id="concern-lip-care" class="bg-rose-50 rounded-3xl p-8 hover:shadow-xl hover:shadow-rose-200 transition">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow">
                    <i data-lucide="heart" class="w-8 h-8 text-rose-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Lip Care</h3>
                <p class="text-slate-600 mb-6">
                    Specialized care for soft, healthy lips.
                </p>
                <div class="space-y-3">
                    <span class="block font-medium text-rose-600">Coming Soon</span>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Get the URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const concernParam = urlParams.get('concern');
    
    if (concernParam) {
        // Map URL parameters to concern IDs
        const concernMap = {
            'dullness-dark-spots': 'concern-dullness-dark-spots',
            'dryness-dehydration': 'concern-dryness-dehydration', 
            'acne-breakouts': 'concern-acne-breakouts',
            'hair-care': 'concern-hair-care'
        };
        
        const concernId = concernMap[concernParam];
        
        if (concernId) {
            // Scroll to the specific concern after a short delay
            setTimeout(() => {
                const concernElement = document.getElementById(concernId);
                if (concernElement) {
                    // Add highlight effect
                    concernElement.classList.add('ring-4', 'ring-opacity-50', 'ring-current');
                    
                    // Scroll to the element
                    concernElement.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center'
                    });
                    
                    // Remove highlight after 3 seconds
                    setTimeout(() => {
                        concernElement.classList.remove('ring-4', 'ring-opacity-50', 'ring-current');
                    }, 3000);
                }
            }, 300);
        }
    }
});
</script>
@endsection