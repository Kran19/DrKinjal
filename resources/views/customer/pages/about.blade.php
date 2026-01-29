@extends('customer.layouts.master')

@section('title', 'Our Story - Dr Kinjal')
@section('description', 'From clinical expertise to trusted skincare solutions. Discover the journey behind Dr. Kinjal Products.')

@section('content')
<section class="pt-12 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Hero Section -->
        <div class="text-center mb-20">
            <h1 class="text-5xl lg:text-7xl font-bold text-slate-900 mb-6">OUR STORY</h1>
            <p class="text-xl text-slate-500 max-w-3xl mx-auto">
                From clinical expertise to trusted skincare solutions. Discover the journey behind Dr. Kinjal Products.
            </p>
        </div>

        <!-- Founder Section -->
        <div class="mb-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <div class="aspect-square rounded-2xl overflow-hidden mb-6">
                        <img src="{{ asset('storage/assets/images/img1.jpg') }}" class="w-full h-full object-contain" alt="Dr. Kinjal Bhayani Anadkat">
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Dr. KINJAL BHAYANI ANADKAT</h3>
                    <p class="text-teal-500 font-medium mb-4">B.H.M.S., C.S.D., F.M.C., D.D.N</p>
                    <p class="text-slate-600 mb-4">
                        Dr. Kinjal Bhayani Anadkat has been practicing in Rajkot since 2012, bringing over a decade of clinical expertise to the field of skin, hair, and aesthetic care. She is a highly experienced Homoeopathic physician and a skilled Cosmetologist, Trichologist, and Aesthetician, known for her patient-centric and results-driven approach.
                    </p>
                    <p class="text-slate-600 mb-6">
                        With extensive hands-on experience in treating a wide range of skin and hair concerns, Dr. Kinjal has developed a deep understanding of dermatological needs across diverse skin and hair types. Over the years, her clinical practice highlighted a growing need for safe, effective, and accessible skincare and haircare solutions that deliver visible results.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-slate-400 hover:text-teal-500"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                        <a href="#" class="text-slate-400 hover:text-teal-500"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-4xl font-bold text-slate-900 mb-6">Founder's Vision</h2>
                    <p class="text-slate-600 mb-6">
                        This insight led to the creation of the Dr. Kinjal product line, formulated with carefully selected, result-oriented ingredients grounded in clinical experience. Each product reflects her commitment to combining medical expertise with cosmetic science to deliver reliable, high-quality care for everyday skin and hair concerns.
                    </p>
                    
                    <div class="bg-teal-50 border border-teal-100 rounded-2xl p-6 mb-8">
                        <h3 class="text-2xl font-bold text-teal-900 mb-4">Clinical Expertise</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-lucide="check-circle" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-slate-700">Over 12 years of clinical practice</span>
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="check-circle" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-slate-700">Homoeopathic Physician & Cosmetologist</span>
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="check-circle" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-slate-700">Specialized in Trichology & Aesthetics</span>
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="check-circle" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-slate-700">Patient-centric, results-driven approach</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Our Products Section -->
        <div class="mb-20">
            <div class="bg-slate-900 text-white rounded-3xl p-12 mb-12">
                <h2 class="text-4xl font-bold text-center mb-8">ABOUT OUR PRODUCTS</h2>
                <p class="text-xl text-center text-slate-300 mb-12 max-w-4xl mx-auto">
                    Our product line, born from clinical insights, is manufactured to the highest standards, embodying the following core principles:
                </p>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-teal-500 flex items-center justify-center mx-auto mb-6 shadow-md shadow-teal-500/40">
                            <i data-lucide="shield-check" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Safety & Efficacy</h3>
                        <p class="text-slate-300">Formulated based on scientific formulas proven to be result-oriented yet gentle enough for daily use.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-cyan-500 flex items-center justify-center mx-auto mb-6 shadow-md shadow-cyan-500/40">
                            <i data-lucide="award" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Quality & Ethics</h3>
                        <p class="text-slate-300">Loved by doctors, our products are cruelty-free and developed with a focus on being safe and, where possible, chemical-free.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-sky-500 flex items-center justify-center mx-auto mb-6 shadow-md shadow-sky-500/40">
                            <i data-lucide="heart" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Accessibility</h3>
                        <p class="text-slate-300">We are committed to making these high-quality, clinical-grade solutions affordable.</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <h3 class="text-2xl font-bold mb-6">Our Aim</h3>
                    <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                        To provide scientifically formulated, medicated, daily use skincare and haircare solutions that are both effective and result oriented.
                    </p>
                </div>
            </div>
            
            <div class="text-center">
                <p class="text-slate-600 text-lg max-w-3xl mx-auto">
                    By overseeing both the clinical application and the manufacturing process, we ensure that every product delivers the trusted results and safety standards developed over more than a decade of practice.
                </p>
            </div>
        </div>

        <!-- Mr. Vijay Anadkat Section -->
        <div class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Role of Mr. Vijay Anadkat in Dr. Kinjal Products</h2>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Strategic Partner & Backbone</h3>
                    <p class="text-slate-600 mb-6">
                        Mr. Vijay Bharatbhai Anadkat is a corporate professional and Company Secretary based in Rajkot, Gujarat. As the Husband of Dr. Kinjal, he has played a pivotal and foundational role in the conceptualization, formation, and systematic growth of Dr. Kinjal Products.
                    </p>
                    <p class="text-slate-600 mb-6">
                        While Dr. Kinjal leads the brand with her medical expertise, formulation knowledge, and clinical experience, Mr. Vijay Anadkat provides strategic, legal, financial, and operational leadership, ensuring that the brand is built on a solid professional framework.
                    </p>
                </div>
                
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <div class="aspect-square rounded-2xl overflow-hidden mb-6">
<img src="{{ asset('storage/assets/images/img2.jpg') }}"
     class="w-full h-full object-contain"
     alt="Mr. Vijay Bharatbhai Anadkat">
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Mr. Vijay Bharatbhai Anadkat</h3>
                    <p class="text-teal-500 font-medium mb-4">Strategic Partner & Corporate Advisor</p>
                    <p class="text-slate-600 mb-4">
                        Associated with Vijay Anadkat & Associates & Anadkat Advisory LLP, a business services firm in Rajkot since 2017, where he serves as one of the Proprietor & Designated Partners.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-slate-400 hover:text-teal-500"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                        <a href="#" class="text-slate-400 hover:text-teal-500"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Key Contributions -->
            <div class="mt-12 grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
                    <h4 class="text-xl font-bold text-slate-900 mb-6">Key Contributions & Responsibilities</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i data-lucide="briefcase" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Strategic Guidance:</strong> Acts as a guiding force and constant support system for long-term vision planning</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="scale" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Legal & Compliance:</strong> Copyright, trademark protection, documentation, and statutory compliances</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="building" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>MSME & Business Registrations:</strong> Structured business identity and MSME certification</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="banknote" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Financial Management:</strong> Banking, financial planning, vendor payments, and cost optimization</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
                    <h4 class="text-xl font-bold text-slate-900 mb-6">Additional Responsibilities</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i data-lucide="globe" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Digital Assets:</strong> Domain selection, ownership structuring, and digital security</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="users" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Team Structuring:</strong> Staff selection, role allocation, and internal systems development</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="handshake" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Business Advisory:</strong> Professional governance and sustainable brand management</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="heart" class="w-5 h-5 text-teal-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span class="text-slate-700"><strong>Partner Support:</strong> Unwavering support allowing focus on innovation and patient care</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Team Acknowledgments -->
        <div class="mb-20">
            <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-3xl p-12 border border-teal-100">
                <h2 class="text-4xl font-bold text-center mb-8">Our Dedicated Team</h2>
                <p class="text-lg text-slate-700 text-center mb-10 max-w-3xl mx-auto">
                    I sincerely thank our dedicated team members whose commitment, teamwork, and consistent efforts have played an important role in shaping and strengthening Dr. Kinjal Products.
                </p>
                
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center bg-white rounded-2xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="camera" class="w-6 h-6 text-teal-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Mr. Vaibhav Rupala</h4>
                        <p class="text-sm text-slate-600">Photography & Visual Branding</p>
                    </div>
                    
                    <div class="text-center bg-white rounded-2xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-cyan-100 flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="shopping-cart" class="w-6 h-6 text-cyan-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Mr. Vivek Adhiya</h4>
                        <p class="text-sm text-slate-600">E-commerce & Logistics Management</p>
                    </div>
                    
                    <div class="text-center bg-white rounded-2xl p-6 shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="users" class="w-6 h-6 text-sky-600"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Support Team</h4>
                        <p class="text-sm text-slate-600">Dr. Jenisha Ranpara, Dr. Kausha Bhayani, Er. Vivek Bhayani, Mrs. Devangi Bhayani, Ms. Ashiya</p>
                    </div>
                </div>
                
                <div class="text-center mt-10 pt-8 border-t border-teal-200">
                    <p class="text-lg text-slate-700 mb-4">I am truly grateful for your support and collaboration.</p>
                    <p class="text-xl font-bold text-teal-900">Thanks & Regards,<br>Dr. Kinjal Bhayani</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mb-20 text-center">
            <div class="inline-block bg-gradient-to-r from-teal-500 to-cyan-500 rounded-3xl p-1 shadow-lg">
                <div class="bg-white rounded-2xl p-10">
                    <h2 class="text-4xl font-bold text-slate-900 mb-4">{{ \App\Helpers\SettingsHelper::get('store_name', 'Abha Multi Speciality Clinic') }}</h2>
                    <div class="space-y-3 text-lg text-slate-700 mb-8">
                        <p class="whitespace-pre-wrap">{{ \App\Helpers\SettingsHelper::get('store_address', "A-401, Hanuman Madhi, Golden Club,\n402, Nirmala Convent Rd, Opp. Chetna Medical Store,\nRajkot, Gujarat - 360007") }}</p>
                        <p class="font-bold whitespace-pre-wrap">{{ \App\Helpers\SettingsHelper::get('store_phone', 'Voice - 9428289077') }}</p>
                    </div>
                    <div class="inline-block px-6 py-3 bg-teal-500 text-white font-semibold rounded-full">
                        Our aim is to cure
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">Experience Clinical-Grade Care</h2>
            <p class="text-xl text-slate-500 mb-8 max-w-2xl mx-auto">
                Discover skincare and haircare solutions developed from over a decade of clinical practice.
            </p>
            <a href="{{ route('customer.products.list') }}"
               class="inline-block px-8 py-4 bg-teal-500 text-white font-semibold rounded-full 
                      hover:bg-teal-600 hover:scale-105 transition-all duration-300 
                      shadow-lg shadow-teal-200">
                Explore Our Products
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .aspect-square {
        aspect-ratio: 1/1;
    }
    
    .aspect-square img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize Lucide icons
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
@endpush