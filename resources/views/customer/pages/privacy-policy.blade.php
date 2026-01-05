@extends('customer.layouts.master')

@section('title', 'Privacy Policy | Dr. Kinjal Skincare')
@section('description', 'Learn how we collect, use, and protect your personal information. Your privacy and data security are our top priorities.')

@section('content')
<section class="py-12 md:py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12 md:mb-20 max-w-4xl mx-auto">
            <div class="inline-flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-teal-100 rounded-2xl mb-6">
                <i data-lucide="shield-check" class="w-8 h-8 md:w-10 md:h-10 text-teal-600"></i>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4 md:mb-6">
                Privacy Policy
            </h1>
            <p class="text-lg md:text-xl text-slate-600">
                We're committed to protecting your personal information and being transparent about our data practices.
            </p>
            <div class="mt-6 text-sm text-slate-500">
                Last Updated: {{ date('F d, Y') }}
            </div>
        </div>

        <!-- Table of Contents - Mobile Accordion / Desktop Sidebar -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Desktop Sidebar Navigation -->
            <div class="hidden lg:block lg:w-1/4">
                <div class="sticky top-24 bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                    <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i data-lucide="list-ordered" class="w-4 h-4"></i>
                        Policy Sections
                    </h3>
                    <nav class="space-y-2">
                        <a href="#introduction" class="flex items-center gap-3 p-3 rounded-xl hover:bg-teal-50 text-slate-700 hover:text-teal-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center">
                                <i data-lucide="info" class="w-4 h-4"></i>
                            </div>
                            <span>Introduction</span>
                        </a>
                        <a href="#data-collection" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                <i data-lucide="database" class="w-4 h-4"></i>
                            </div>
                            <span>Data Collection</span>
                        </a>
                        <a href="#data-usage" class="flex items-center gap-3 p-3 rounded-xl hover:bg-emerald-50 text-slate-700 hover:text-emerald-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <i data-lucide="settings" class="w-4 h-4"></i>
                            </div>
                            <span>Data Usage</span>
                        </a>
                        <a href="#data-sharing" class="flex items-center gap-3 p-3 rounded-xl hover:bg-orange-50 text-slate-700 hover:text-orange-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                                <i data-lucide="share-2" class="w-4 h-4"></i>
                            </div>
                            <span>Data Sharing</span>
                        </a>
                        <a href="#your-rights" class="flex items-center gap-3 p-3 rounded-xl hover:bg-teal-50 text-slate-700 hover:text-teal-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center">
                                <i data-lucide="user-check" class="w-4 h-4"></i>
                            </div>
                            <span>Your Rights</span>
                        </a>
                        <a href="#security" class="flex items-center gap-3 p-3 rounded-xl hover:bg-red-50 text-slate-700 hover:text-red-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center">
                                <i data-lucide="lock" class="w-4 h-4"></i>
                            </div>
                            <span>Security</span>
                        </a>
                        <a href="#contact" class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-50 text-slate-700 hover:text-indigo-700 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </div>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                    
                    <div class="mt-8 pt-6 border-t border-slate-200">
                        <p class="text-sm text-slate-600 mb-3">Download this policy:</p>
                        <button class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition-colors">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            Download PDF
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile TOC Accordion -->
            <div class="lg:hidden mb-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <button id="toc-toggle" class="w-full flex items-center justify-between p-4 text-left">
                        <span class="font-semibold text-slate-900">Jump to Section</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-slate-500 transition-transform"></i>
                    </button>
                    <div id="toc-content" class="hidden px-4 pb-4 space-y-2">
                        <a href="#introduction" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Introduction</a>
                        <a href="#data-collection" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Data Collection</a>
                        <a href="#data-usage" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Data Usage</a>
                        <a href="#data-sharing" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Data Sharing</a>
                        <a href="#your-rights" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Your Rights</a>
                        <a href="#security" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Security</a>
                        <a href="#contact" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:w-3/4">
                <!-- Introduction -->
                <div id="introduction" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-slate-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="info" class="w-6 h-6 md:w-7 md:h-7 text-slate-600"></i>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Introduction</h2>
                            <div class="prose prose-lg max-w-none text-slate-600">
                                <p class="mb-4">
                                    Welcome to the Dr. Kinjal website. The Dr. Kinjal website is an owned property of Dr. Kinjal / Dr. Kinjal Brand (Proprietorship / Private Practice). Dr. Kinjal offers users (collectively, "Users," "you," or "your") high-quality skincare, haircare, wellness and cosmetic products (the "Products") through our website (the "Site").
                                </p>
                                <p>
                                    This Privacy Policy explains what personal data we collect through the Site, how we use and share that data, and your choices concerning our data practices.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Collection -->
                <div id="data-collection" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-blue-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="database" class="w-6 h-6 md:w-7 md:h-7 text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-full">Data Collection</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Information We Receive From Your Use of the Site</h2>
                            <p class="text-slate-600 mb-6">
                                When you visit, use, or interact with the Site, we may receive certain information about your visit, use, or interactions.
                            </p>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-blue-50/50 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="server" class="w-5 h-5 text-blue-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Log Data</h3>
                                    </div>
                                    <ul class="space-y-2 text-slate-600">
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>IP address</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Browser type and settings</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Date and time of access</span>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="bg-blue-50/50 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="cookie" class="w-5 h-5 text-blue-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Cookies & Tracking</h3>
                                    </div>
                                    <p class="text-slate-600 mb-3">
                                        We use cookies for technical administration and analytics. We do not store personally identifiable information in cookies.
                                    </p>
                                </div>
                                
                                <div class="bg-blue-50/50 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="smartphone" class="w-5 h-5 text-blue-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Device Information</h3>
                                    </div>
                                    <ul class="space-y-2 text-slate-600">
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Device name</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Operating system</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Browser type</span>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="bg-blue-50/50 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="activity" class="w-5 h-5 text-blue-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Usage Information</h3>
                                    </div>
                                    <ul class="space-y-2 text-slate-600">
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Pages viewed</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Products browsed</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0"></i>
                                            <span>Time spent on site</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Usage -->
                <div id="data-usage" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="settings" class="w-6 h-6 md:w-7 md:h-7 text-emerald-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-full">Data Usage</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6">How We Use Your Information</h2>
                            
                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="package" class="w-5 h-5 text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-slate-800 mb-2">Order Processing</h3>
                                        <p class="text-slate-600">
                                            Payment processing, order confirmation, dispatch, and customer support.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="briefcase" class="w-5 h-5 text-amber-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-slate-800 mb-2">Business Operations</h3>
                                        <ul class="space-y-1 text-slate-600">
                                            <li>• Responding to inquiries and feedback</li>
                                            <li>• Customizing browsing experience</li>
                                            <li>• Improving Site functionality</li>
                                            <li>• Fraud prevention and security</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="mail" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-slate-800 mb-2">Marketing Communications</h3>
                                        <p class="text-slate-600 mb-2">
                                            We may contact you about products, offers, or services. You may opt-out anytime by:
                                        </p>
                                        <ul class="space-y-1 text-slate-600">
                                            <li>• Using the unsubscribe link in emails</li>
                                            <li>• Contacting DrKinjal.official@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Sharing -->
                <div id="data-sharing" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-orange-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="share-2" class="w-6 h-6 md:w-7 md:h-7 text-orange-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-orange-50 text-orange-700 text-sm font-medium rounded-full">Data Sharing</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6">Sharing and Disclosure</h2>
                            
                            <div class="space-y-6">
                                <div class="bg-orange-50/30 rounded-2xl p-5">
                                    <h3 class="font-semibold text-slate-800 mb-3 flex items-center gap-2">
                                        <i data-lucide="truck" class="w-5 h-5"></i>
                                        Vendors & Service Providers
                                    </h3>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div class="bg-white rounded-xl p-4">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                                <span class="font-medium">Hosting & IT</span>
                                            </div>
                                            <p class="text-sm text-slate-600">Secure infrastructure management</p>
                                        </div>
                                        <div class="bg-white rounded-xl p-4">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                                <span class="font-medium">Payment Gateways</span>
                                            </div>
                                            <p class="text-sm text-slate-600">Secure transaction processing</p>
                                        </div>
                                        <div class="bg-white rounded-xl p-4">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                                <span class="font-medium">Shipping Partners</span>
                                            </div>
                                            <p class="text-sm text-slate-600">Order fulfillment and delivery</p>
                                        </div>
                                        <div class="bg-white rounded-xl p-4">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                                <span class="font-medium">Analytics Platforms</span>
                                            </div>
                                            <p class="text-sm text-slate-600">Service improvement insights</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-red-50/30 rounded-2xl p-5">
                                    <h3 class="font-semibold text-slate-800 mb-2 flex items-center gap-2">
                                        <i data-lucide="scale" class="w-5 h-5"></i>
                                        Legal Requirements
                                    </h3>
                                    <p class="text-slate-600">
                                        When required by law or to protect rights and safety, prevent fraud, or comply with legal obligations.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div id="your-rights" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-teal-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="user-check" class="w-6 h-6 md:w-7 md:h-7 text-teal-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-teal-50 text-teal-700 text-sm font-medium rounded-full">Your Rights</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6">Your Privacy Rights</h2>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="bg-teal-50/30 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="clock" class="w-5 h-5 text-teal-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Data Retention</h3>
                                    </div>
                                    <p class="text-slate-600">
                                        We retain Personal Data as long as necessary for business purposes or as required by law.
                                    </p>
                                </div>
                                
                                <div class="bg-indigo-50/30 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="edit" class="w-5 h-5 text-indigo-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Update or Delete</h3>
                                    </div>
                                    <p class="text-slate-600">
                                        Request correction or deletion of your Personal Data by contacting us.
                                    </p>
                                </div>
                                
                                <div class="bg-green-50/30 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="users" class="w-5 h-5 text-green-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">Children's Privacy</h3>
                                    </div>
                                    <p class="text-slate-600">
                                        We do not knowingly collect Personal Data from children under 13 years.
                                    </p>
                                </div>
                                
                                <div class="bg-amber-50/30 rounded-2xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                                            <i data-lucide="globe" class="w-5 h-5 text-amber-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">International Users</h3>
                                    </div>
                                    <p class="text-slate-600">
                                        We ensure adequate protection of Personal Data across all regions.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-white border border-slate-200 rounded-2xl p-5">
                                <h3 class="font-semibold text-slate-800 mb-2">Exercise Your Rights</h3>
                                <p class="text-slate-600 mb-3">
                                    To exercise any of your privacy rights, please contact us at:
                                </p>
                                <div class="bg-teal-50 rounded-xl p-4">
                                    <p class="text-teal-800 font-medium flex items-center gap-2">
                                        <i data-lucide="mail" class="w-4 h-4"></i>
                                        DrKinjal.official@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div id="security" class="bg-white rounded-3xl p-6 md:p-8 mb-8 border border-slate-100 shadow-sm">
                    <div class="flex items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-red-50 rounded-2xl flex items-center justify-center">
                            <i data-lucide="lock" class="w-6 h-6 md:w-7 md:h-7 text-red-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-red-50 text-red-700 text-sm font-medium rounded-full">Security</span>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6">How We Protect Your Information</h2>
                            
                            <div class="mb-8">
                                <p class="text-slate-600 mb-6">
                                    We implement comprehensive security measures to protect your data:
                                </p>
                                
                                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                                    <div class="bg-red-50/30 rounded-2xl p-5 text-center">
                                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="shield" class="w-6 h-6 text-red-600"></i>
                                        </div>
                                        <h4 class="font-semibold text-slate-800 mb-1">SSL Encryption</h4>
                                        <p class="text-sm text-slate-600">Secure data transmission</p>
                                    </div>
                                    
                                    <div class="bg-red-50/30 rounded-2xl p-5 text-center">
                                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="server" class="w-6 h-6 text-red-600"></i>
                                        </div>
                                        <h4 class="font-semibold text-slate-800 mb-1">Secure Servers</h4>
                                        <p class="text-sm text-slate-600">Firewall protected infrastructure</p>
                                    </div>
                                    
                                    <div class="bg-red-50/30 rounded-2xl p-5 text-center">
                                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="key" class="w-6 h-6 text-red-600"></i>
                                        </div>
                                        <h4 class="font-semibold text-slate-800 mb-1">Restricted Access</h4>
                                        <p class="text-sm text-slate-600">Limited to authorized personnel</p>
                                    </div>
                                    
                                    <div class="bg-red-50/30 rounded-2xl p-5 text-center">
                                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                            <i data-lucide="scan" class="w-6 h-6 text-red-600"></i>
                                        </div>
                                        <h4 class="font-semibold text-slate-800 mb-1">Regular Scans</h4>
                                        <p class="text-sm text-slate-600">Continuous vulnerability checks</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-yellow-50/50 rounded-2xl p-5">
                                <div class="flex items-start gap-3">
                                    <i data-lucide="alert-triangle" class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0"></i>
                                    <div>
                                        <h4 class="font-semibold text-slate-800 mb-2">Important Notice</h4>
                                        <p class="text-slate-600">
                                            Despite our best efforts, no system is completely secure. Please notify us immediately if you suspect unauthorized account activity.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div id="contact" class="bg-gradient-to-br from-slate-900 to-teal-900 rounded-3xl p-8 md:p-12 text-white shadow-2xl">
                    <div class="max-w-3xl mx-auto text-center">
                        <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="shield-question" class="w-8 h-8"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold mb-4">Questions About Your Privacy?</h2>
                        <p class="text-lg mb-8 opacity-90">
                            We're committed to transparency and protecting your personal information.
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-white/10 rounded-2xl p-6">
                                <div class="flex items-center justify-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                        <i data-lucide="mail" class="w-5 h-5"></i>
                                    </div>
                                    <h3 class="font-semibold text-lg">Email</h3>
                                </div>
                                <p class="opacity-90">DrKinjal.official@gmail.com</p>
                            </div>
                            
                            <div class="bg-white/10 rounded-2xl p-6">
                                <div class="flex items-center justify-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                        <i data-lucide="phone" class="w-5 h-5"></i>
                                    </div>
                                    <h3 class="font-semibold text-lg">Phone</h3>
                                </div>
                                <div class="space-y-1 opacity-90">
                                    <p>9428289077</p>
                                    <p>6353283376</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white/10 rounded-2xl p-6">
                            <h3 class="font-semibold text-lg mb-3">Changes to This Policy</h3>
                            <p class="opacity-90">
                                We may update this Privacy Policy from time to time. Continued use of the Site after changes implies acceptance of the updated policy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Active link */
.active {
    background-color: rgb(204 251 241) !important;
    color: rgb(19 78 74) !important;
}

/* Scroll offset for sticky header */
div[id] {
    scroll-margin-top: 120px;
}

/* Typography on mobile */
@media (max-width: 768px) {
    .prose {
        font-size: 1rem;
        line-height: 1.6;
    }

    div[id] {
        scroll-margin-top: 100px;
    }
}

/* Card hover animation */
.bg-white {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.bg-white:hover {
    transform: translateY(-2px);
    box-shadow:
        0 10px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Background opacity utilities */
.bg-blue-50\/50 { background-color: rgba(239, 246, 255, 0.5); }
.bg-emerald-50\/30 { background-color: rgba(209, 250, 229, 0.3); }
.bg-orange-50\/30 { background-color: rgba(255, 247, 237, 0.3); }
.bg-red-50\/30 { background-color: rgba(254, 242, 242, 0.3); }
.bg-teal-50\/30 { background-color: rgba(204, 251, 241, 0.3); }
.bg-indigo-50\/30 { background-color: rgba(238, 242, 255, 0.3); }
.bg-green-50\/30 { background-color: rgba(220, 252, 231, 0.3); }
.bg-amber-50\/30 { background-color: rgba(254, 243, 199, 0.3); }
.bg-yellow-50\/50 { background-color: rgba(254, 252, 232, 0.5); }

/* Global overflow protection */
html, body {
    width: 100%;
    overflow-x: hidden;
}

/* Text overflow protection */
p, span, a {
    word-wrap: break-word;
    overflow-wrap: break-word;
    word-break: break-word;
}

/* Mobile layout fixes */
@media (max-width: 768px) {
    /* Allow wrapping except navbar */
    .flex:not(nav .flex) {
        flex-wrap: wrap;
    }

    div[id] {
        scroll-margin-top: 90px;
    }

    button, a {
        min-height: 44px;
    }
}

/* Force single column grid on small screens */
@media (max-width: 640px) {
    .grid {
        grid-template-columns: 1fr !important;
    }
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

        // Mobile TOC toggle
        const tocToggle = document.getElementById('toc-toggle');
        const tocContent = document.getElementById('toc-content');
        let chevron = null;
        
        if (tocToggle) {
            chevron = tocToggle.querySelector('i');
            tocToggle.addEventListener('click', () => {
                tocContent.classList.toggle('hidden');
                if (chevron) {
                    chevron.style.transform = tocContent.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
                }
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    
                    // Close mobile TOC if open
                    if (window.innerWidth < 1024 && tocContent && !tocContent.classList.contains('hidden')) {
                        tocContent.classList.add('hidden');
                        if (chevron) {
                            chevron.style.transform = 'rotate(0deg)';
                        }
                    }
                    
                    // Scroll to element
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Add active state to TOC items on scroll
        const sections = document.querySelectorAll('div[id]');
        const navLinks = document.querySelectorAll('nav a, #toc-content a');
        
        function highlightCurrentSection() {
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= (sectionTop - 150)) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('active');
                }
            });
        }
        
        window.addEventListener('scroll', highlightCurrentSection);
    });
</script>
@endpush