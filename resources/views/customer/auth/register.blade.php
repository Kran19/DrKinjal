@extends('customer.layouts.master')

@section('title', 'Sign Up - Dr Kinjal')

@section('description', 'Join Dr Kinjal for personalized skincare recommendations, exclusive rewards, and member-only benefits.')

@section('content')
<div class="bg-stone-50 text-stone-900 antialiased min-h-screen pt-6 md:pt-8">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">
        
        <!-- Hero Section for Mobile -->
        <div class="lg:hidden mt-6 mb-8 text-center">
            <h1 class="text-3xl font-bold text-stone-900 mb-2">Join Our Community</h1>
            <p class="text-stone-600">Start your personalized skincare journey today</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            
            <!-- Sign Up Form Card -->
            <div class="bg-white rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl shadow-stone-200/50 border border-stone-100 animate-fade-in">
                <!-- Tabs -->
                <div class="flex p-1 bg-stone-100 rounded-xl mb-6 md:mb-8">
                    <a href="{{ route('customer.login') }}" 
                       class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg text-stone-500 hover:text-stone-900 transition-all text-center flex items-center justify-center">
                        Log In
                    </a>
                    <button class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg bg-sky-600 text-white shadow-sm transition-all">
                        Sign Up
                    </button>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex items-center gap-2 text-red-700 mb-2">
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="font-medium">Please fix the following errors:</span>
                        </div>
                        <ul class="text-sm text-red-600 list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center gap-2 text-green-700">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('customer.register.submit') }}" method="POST" class="space-y-5 md:space-y-6" id="signupForm">
                    @csrf
                    
                    <!-- Name Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">First Name</label>
                            <div class="relative">
                                <i data-lucide="user" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                                <input
                                    type="text"
                                    name="first_name"
                                    id="firstName"
                                    placeholder="John"
                                    value="{{ old('first_name') }}"
                                    class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                           focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                           transition-all placeholder:text-stone-400"
                                    required
                                    autocomplete="given-name"
                                >
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Last Name</label>
                            <div class="relative">
                                <i data-lucide="user" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                                <input
                                    type="text"
                                    name="last_name"
                                    id="lastName"
                                    placeholder="Doe"
                                    value="{{ old('last_name') }}"
                                    class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                           focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                           transition-all placeholder:text-stone-400"
                                    required
                                    autocomplete="family-name"
                                >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hidden Name Field for Backend -->
                    <input type="hidden" name="name" id="fullName">

                    <!-- Mobile Field -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-stone-700">Mobile Number</label>
                        <div class="relative">
                            <i data-lucide="phone" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input
                                type="tel"
                                name="mobile"
                                placeholder="9876543210"
                                value="{{ old('mobile') }}"
                                class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                       focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                       transition-all placeholder:text-stone-400"
                                required
                                autocomplete="tel"
                                pattern="[0-9]{10,15}"
                            >
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-stone-700">Email Address</label>
                        <div class="relative">
                            <i data-lucide="mail" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input
                                type="email"
                                name="email"
                                placeholder="hello@drkinjal.com"
                                value="{{ old('email') }}"
                                class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                       focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                       transition-all placeholder:text-stone-400"
                                required
                                autocomplete="email"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-stone-700">Password</label>
                        <div class="relative">
                            <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input
                                type="password"
                                name="password"
                                placeholder="Create a strong password"
                                class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                       focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                       transition-all placeholder:text-stone-400"
                                required
                                autocomplete="new-password"
                                id="password"
                            >
                            <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-stone-600" id="togglePassword">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </button>
                        </div>
                        <p class="text-xs text-stone-500 ml-1">Minimum 8 characters with letters and numbers</p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-stone-700">Confirm Password</label>
                        <div class="relative">
                            <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                       focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                       transition-all placeholder:text-stone-400"
                                required
                                autocomplete="new-password"
                                id="confirmPassword"
                            >
                            <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-stone-600" id="toggleConfirmPassword">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start gap-3 pt-2">
                        <input 
                            type="checkbox" 
                            name="terms" 
                            id="terms" 
                            class="mt-1 w-4 h-4 text-sky-600 border-stone-300 rounded focus:ring-sky-500/20"
                            required
                            {{ old('terms') ? 'checked' : '' }}
                        >
                        <label for="terms" class="text-xs md:text-sm text-stone-600">
                            I agree to the Terms of Service and 
                            Privacy Policy
                            I also agree to receive skincare tips and offers via email.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 text-white font-semibold py-3.5 md:py-3 rounded-full
                               shadow-lg shadow-sky-200 hover:shadow-sky-300 transition-all duration-300
                               active:scale-[0.98] mt-2 flex items-center justify-center"
                        id="submitButton"
                    >
                        <span id="buttonText">Create Account</span>
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-sm md:text-base text-stone-500 pt-2">
                        Already have an account?
                        <a href="{{ route('customer.login') }}" class="text-sky-600 hover:text-sky-700 font-medium ml-1">Log in</a>
                    </p>
                </form>
            </div>

            <!-- Right Side - Benefits Section -->
            <div class="hidden lg:flex flex-col gap-6">
                <!-- Main Benefits Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl shadow-stone-200/50 border border-stone-100 relative overflow-hidden">
                    <span class="inline-block px-3 py-1 bg-sky-100 text-sky-700 text-xs font-semibold tracking-wide rounded-full mb-4">
                        MEMBER BENEFITS
                    </span>
                    <h2 class="text-2xl font-bold text-stone-900 mb-2">Why Join Dr. Kinjal?</h2>
                    <p class="text-stone-600 mb-6">
                        Become part of our community and unlock exclusive skincare benefits tailored just for you.
                    </p>
                    
                    <!-- Benefits List -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="star" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-stone-900">Personalized Routines</h3>
                                <p class="text-sm text-stone-600">Get skincare recommendations tailored to your skin type and concerns.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="gift" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-stone-900">Exclusive Rewards</h3>
                                <p class="text-sm text-stone-600">Earn points on every purchase and get access to member-only sales.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="clock" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-stone-900">Early Access</h3>
                                <p class="text-sm text-stone-600">Be the first to try new products before they launch to the public.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Community Stats -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-gradient-to-br from-sky-400 to-cyan-400 flex items-center justify-center text-white font-bold">DK</div>
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-gradient-to-br from-rose-400 to-pink-400 flex items-center justify-center text-white font-bold">MB</div>
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-stone-100 flex items-center justify-center text-xs font-semibold text-stone-600">+5k</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-stone-900">2.5k+</div>
                                <div class="text-xs text-stone-600">Happy Members</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-2xl p-6 border border-rose-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex gap-1 mb-2">
                                    <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                                </div>
                                <p class="text-xs text-stone-600 italic">"The personalized routine changed my skin completely!"</p>
                                <p class="text-xs text-stone-500 mt-2 font-medium">- Sarah M.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Benefits Section -->
            <div class="lg:hidden mt-8">
                <div class="bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <h3 class="font-bold text-lg text-stone-900 mb-3">Sign Up Benefits</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="star" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-stone-900">Personalized Skincare</h4>
                                <p class="text-sm text-stone-600">Routines tailored to your skin type</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="gift" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-stone-900">Exclusive Rewards</h4>
                                <p class="text-sm text-stone-600">Member-only sales & early access</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                <i data-lucide="shield-check" class="w-4 h-4 text-sky-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-stone-900">Dermatologist Approved</h4>
                                <p class="text-sm text-stone-600">Clinically tested products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Animation for form entry */
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Custom gradient for signup */
    .signup-gradient {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
    }
    
    .signup-gradient:hover {
        background: linear-gradient(135deg, #0284c7 0%, #0891b2 100%);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const signupForm = document.getElementById('signupForm');
        
        // Toggle main password visibility
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle icon
                const icon = this.querySelector('i');
                if (type === 'text') {
                    icon.setAttribute('data-lucide', 'eye-off');
                } else {
                    icon.setAttribute('data-lucide', 'eye');
                }
                lucide.createIcons();
            });
        }
        
        // Toggle confirm password visibility
        if (toggleConfirmPassword && confirmPasswordInput) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                
                // Toggle icon
                const icon = this.querySelector('i');
                if (type === 'text') {
                    icon.setAttribute('data-lucide', 'eye-off');
                } else {
                    icon.setAttribute('data-lucide', 'eye');
                }
                lucide.createIcons();
            });
        }
        
        // Form validation
        if (signupForm) {
            signupForm.addEventListener('submit', function(e) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('confirmPassword');
                const terms = document.getElementById('terms');
                const submitButton = document.getElementById('submitButton');
                const buttonText = document.getElementById('buttonText');
                
                // Concatenate names
                const firstName = document.getElementById('firstName').value;
                const lastName = document.getElementById('lastName').value;
                document.getElementById('fullName').value = firstName + ' ' + lastName;
                
                // Check password match
                if (password.value !== confirmPassword.value) {
                    e.preventDefault();
                    
                    // Show error message
                    if (!document.getElementById('passwordMatchError')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'passwordMatchError';
                        errorDiv.className = 'mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                        errorDiv.innerHTML = `
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="text-sm">Passwords do not match!</span>
                        `;
                        confirmPassword.parentElement.parentElement.appendChild(errorDiv);
                        lucide.createIcons();
                    }
                    
                    confirmPassword.focus();
                    confirmPassword.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                    return false;
                } else {
                    confirmPassword.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = document.getElementById('passwordMatchError');
                    if (errorDiv) errorDiv.remove();
                }
                
                // Check password length
                if (password.value.length < 8) {
                    e.preventDefault();
                    
                    if (!document.getElementById('passwordLengthError')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'passwordLengthError';
                        errorDiv.className = 'mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                        errorDiv.innerHTML = `
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="text-sm">Password must be at least 8 characters long!</span>
                        `;
                        password.parentElement.parentElement.appendChild(errorDiv);
                        lucide.createIcons();
                    }
                    
                    password.focus();
                    password.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                    return false;
                } else {
                    password.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = document.getElementById('passwordLengthError');
                    if (errorDiv) errorDiv.remove();
                }
                
                // Check terms
                if (!terms.checked) {
                    e.preventDefault();
                    
                    if (!document.getElementById('termsError')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'termsError';
                        errorDiv.className = 'mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                        errorDiv.innerHTML = `
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="text-sm">Please agree to the terms and conditions!</span>
                        `;
                        terms.parentElement.parentElement.appendChild(errorDiv);
                        lucide.createIcons();
                    }
                    
                    terms.focus();
                    return false;
                } else {
                    const errorDiv = document.getElementById('termsError');
                    if (errorDiv) errorDiv.remove();
                }
                
                // Show loading state
                buttonText.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin mr-2"></i> Creating Account...';
                lucide.createIcons();
                submitButton.disabled = true;
                
                return true;
            });
        }
        
        // Real-time password validation
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        
        if (password && confirmPassword) {
            confirmPassword.addEventListener('input', function() {
                if (password.value !== this.value && this.value.length > 0) {
                    this.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                } else {
                    this.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = document.getElementById('passwordMatchError');
                    if (errorDiv) errorDiv.remove();
                }
            });
            
            password.addEventListener('input', function() {
                if (this.value.length < 8 && this.value.length > 0) {
                    this.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                } else {
                    this.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = document.getElementById('passwordLengthError');
                    if (errorDiv) errorDiv.remove();
                }
            });
        }
        
        // Focus management for better mobile experience
        const inputs = document.querySelectorAll('input');
        inputs.forEach((input) => {
            input.addEventListener('focus', function() {
                if (window.innerWidth < 768) {
                    setTimeout(() => {
                        this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            });
        });
    });
</script>
@endpush