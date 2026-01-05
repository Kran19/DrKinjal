<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Dr Kinjal Beauty</title>
    <meta name="description" content="Join Dr Kinjal Beauty for personalized skincare recommendations, exclusive rewards, and member-only benefits.">
    <meta name="keywords" content="sign up, register, skincare, beauty, account">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        'brand': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
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
</head>
<body class="bg-stone-50 text-stone-900 antialiased min-h-screen">
    <!-- Simple Static Header -->
    <header class="sticky top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-lg border-b border-sky-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">
                <span class="text-xl font-bold text-sky-600">Dr. Kinjal Beauty</span>
            </a>
            
            <!-- Back to Home -->
            <a href="/" class="text-stone-700 hover:text-sky-500 transition-colors flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back to Home
            </a>
        </div>
    </header>

    <!-- Main Content -->
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
                        <a href="/login" 
                           class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg text-stone-500 hover:text-stone-900 transition-all text-center flex items-center justify-center">
                            Log In
                        </a>
                        <button class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg bg-sky-600 text-white shadow-sm transition-all">
                            Sign Up
                        </button>
                    </div>

                    <form class="space-y-5 md:space-y-6" id="signupForm">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-stone-700">First Name</label>
                                <div class="relative">
                                    <i data-lucide="user" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                                    <input
                                        type="text"
                                        name="first_name"
                                        placeholder="John"
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
                                        placeholder="Doe"
                                        class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                               focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                               transition-all placeholder:text-stone-400"
                                        required
                                        autocomplete="family-name"
                                    >
                                </div>
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
                            >
                            <label for="terms" class="text-xs md:text-sm text-stone-600">
                                I agree to the <a href="#" class="text-sky-600 hover:text-sky-700 font-medium">Terms of Service</a> and 
                                <a href="#" class="text-sky-600 hover:text-sky-700 font-medium">Privacy Policy</a>. 
                                I also agree to receive skincare tips and offers via email.
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="button"
                            onclick="handleSignup()"
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
                            <a href="/login" class="text-sky-600 hover:text-sky-700 font-medium ml-1">Log in</a>
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

                        <!-- Welcome Offer Card -->
                        <div class="bg-gradient-to-br from-sky-500 to-cyan-500 rounded-2xl p-6 text-white relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="relative z-10">
                                <h3 class="text-lg font-semibold mb-2">Welcome Offer! 🎉</h3>
                                <p class="text-sm opacity-90 mb-4">Get 15% off your first purchase when you sign up today.</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-xs opacity-80">Use code:</span>
                                        <div class="text-lg font-bold tracking-wider mt-1 bg-white/20 px-3 py-1 rounded-lg inline-block">WELCOME15</div>
                                    </div>
                                    <div class="bg-white/20 p-3 rounded-full backdrop-blur-sm">
                                        <i data-lucide="tag" class="w-5 h-5"></i>
                                    </div>
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
                        
                        <!-- Welcome Offer Mobile -->
                        <div class="bg-gradient-to-br from-sky-500 to-cyan-500 rounded-2xl p-5 text-white mb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold mb-1">Welcome Offer! 🎉</h4>
                                    <p class="text-sm opacity-90">Get 15% off your first purchase</p>
                                    <div class="text-lg font-bold mt-2">WELCOME15</div>
                                </div>
                                <div class="bg-white/20 p-3 rounded-full">
                                    <i data-lucide="tag" class="w-5 h-5"></i>
                                </div>
                            </div>
                        </div>
                        
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

    <!-- Simple Static Footer -->
    <footer class="bg-stone-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <p class="text-stone-400 text-sm mb-6">clinically effective, result oriented products.</p>
                <p class="text-xs text-stone-500">&copy; 2024 Dr Kinjal Beauty. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        
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
        
        // Handle signup (static version - just shows success message)
        function handleSignup() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            const terms = document.getElementById('terms');
            const submitButton = document.getElementById('submitButton');
            const buttonText = document.getElementById('buttonText');
            
            // Remove previous errors
            document.querySelectorAll('.error-message').forEach(el => el.remove());
            
            // Check password match
            if (password.value !== confirmPassword.value) {
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                errorDiv.innerHTML = `
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    <span class="text-sm">Passwords do not match!</span>
                `;
                confirmPassword.parentElement.parentElement.appendChild(errorDiv);
                lucide.createIcons();
                confirmPassword.focus();
                confirmPassword.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                return false;
            } else {
                confirmPassword.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            }
            
            // Check password length
            if (password.value.length < 8) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                errorDiv.innerHTML = `
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    <span class="text-sm">Password must be at least 8 characters long!</span>
                `;
                password.parentElement.parentElement.appendChild(errorDiv);
                lucide.createIcons();
                password.focus();
                password.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                return false;
            } else {
                password.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            }
            
            // Check terms
            if (!terms.checked) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700';
                errorDiv.innerHTML = `
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    <span class="text-sm">Please agree to the terms and conditions!</span>
                `;
                terms.parentElement.parentElement.appendChild(errorDiv);
                lucide.createIcons();
                terms.focus();
                return false;
            }
            
            // Show loading state
            buttonText.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin mr-2"></i> Creating Account...';
            lucide.createIcons();
            submitButton.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                const successDiv = document.createElement('div');
                successDiv.className = 'mt-4 p-4 bg-green-50 border border-green-200 rounded-xl';
                successDiv.innerHTML = `
                    <div class="flex items-center gap-2 text-green-700 mb-2">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        <span class="font-medium">Account created successfully!</span>
                    </div>
                    <p class="text-sm text-green-600">Welcome to Dr. Kinjal Beauty! Redirecting to your dashboard...</p>
                `;
                
                const formCard = document.querySelector('.bg-white.rounded-3xl');
                formCard.insertBefore(successDiv, formCard.querySelector('form'));
                
                lucide.createIcons();
                
                // Redirect to home page after 2 seconds
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            }, 1500);
            
            return true;
        }
        
        // Real-time password validation
        if (passwordInput && confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', function() {
                if (passwordInput.value !== this.value && this.value.length > 0) {
                    this.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                } else {
                    this.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = this.parentElement.parentElement.querySelector('.error-message');
                    if (errorDiv) errorDiv.remove();
                }
            });
            
            passwordInput.addEventListener('input', function() {
                if (this.value.length < 8 && this.value.length > 0) {
                    this.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                } else {
                    this.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                    const errorDiv = this.parentElement.parentElement.querySelector('.error-message');
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
    </script>
</body>
</html>