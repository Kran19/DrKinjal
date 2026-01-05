<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Kinjal - Login</title>
    <meta name="description" content="Sign in to your Dr. Kinjal account to access personalized skincare routines and exclusive offers.">
    <meta name="keywords" content="login, sign in, skincare, beauty, account">
    
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
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .login-container {
                padding: 0 1rem;
            }
            .form-card {
                padding: 1.5rem !important;
            }
            .social-buttons {
                grid-template-columns: 1fr !important;
            }
        }
        
        /* Better touch targets for mobile */
        @media (max-width: 768px) {
            button, 
            a[href], 
            input[type="submit"] {
                min-height: 44px;
                min-width: 44px;
            }
            
            input[type="email"],
            input[type="password"] {
                font-size: 16px !important; /* Prevents iOS zoom */
            }
        }
        
        /* Loading animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
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
    <main class="flex-grow login-container pt-8 lg:pt-12 bg-stone-50">
        <div class="max-w-6xl mx-auto px-4 py-8 md:py-12 lg:py-16">
            
            <!-- Hero Section for Mobile -->
            <div class="lg:hidden mt-6 mb-8 text-center">
                <div class="max-w-6xl mx-auto px-4 py-0 md:py-12 lg:py-16">
                    <h1 class="text-3xl font-bold text-stone-900 mb-2">Welcome Back</h1>
                    <p class="text-stone-600">Sign in to continue your skincare journey</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                
                <!-- Login Form Card -->
                <div class="form-card bg-white rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl shadow-stone-200/50 border border-stone-100 animate-fade-in">
                    <!-- Tabs for mobile/desktop -->
                    <div class="flex p-1 bg-stone-100 rounded-xl mb-6 md:mb-8">
                        <button class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg bg-sky-600 text-white shadow-sm transition-all">
                            Log In
                        </button>
                        <a href="/register"
                           class="flex-1 py-3 md:py-2.5 text-sm font-medium rounded-lg text-stone-500 hover:text-stone-900 transition-all text-center flex items-center justify-center">
                            Sign Up
                        </a>
                    </div>

                    <form class="space-y-5 md:space-y-6" id="loginForm">
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
                                    id="emailInput"
                                >
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <label class="text-sm font-medium text-stone-700">Password</label>
                                <a href="#" class="text-sm font-medium text-sky-600 hover:text-sky-700" onclick="showForgotPassword()">Forgot Password?</a>
                            </div>
                            <div class="relative">
                                <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    class="w-full pl-12 pr-4 py-3.5 md:py-3 bg-stone-50 border border-stone-200 rounded-xl text-base md:text-sm text-stone-900
                                           focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400
                                           transition-all placeholder:text-stone-400"
                                    required
                                    autocomplete="current-password"
                                    id="passwordInput"
                                >
                                <!-- Show/Hide password toggle -->
                                <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-stone-400 hover:text-stone-600" id="togglePassword">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="button"
                            onclick="handleLogin()"
                            class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white font-semibold py-3.5 md:py-3 rounded-full
                                   shadow-lg shadow-sky-200 hover:shadow-sky-300 transition-all duration-300
                                   active:scale-[0.98]"
                            id="loginButton"
                        >
                            <span id="buttonText">Sign In</span>
                        </button>

                        <!-- Sign Up Link -->
                        <p class="text-center text-sm md:text-base text-stone-500 pt-2">
                            Don't have an account?
                            <a href="/register" class="text-sky-600 hover:text-sky-700 font-medium ml-1">Create account</a>
                        </p>

                        <!-- Divider -->
                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-stone-200"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="bg-white px-4 text-sm text-stone-400">
                                    Or continue with
                                </span>
                            </div>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="social-buttons grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            <button
                                type="button"
                                onclick="showSocialLogin('google')"
                                class="flex items-center justify-center gap-3 py-3 md:py-2.5 border border-stone-200 rounded-xl
                                       bg-white hover:bg-stone-50 transition-colors hover:border-stone-300
                                       active:scale-[0.98]"
                            >
                                <svg class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                                <span class="text-sm font-medium text-stone-700">Continue with Google</span>
                            </button>

                            <button
                                type="button"
                                onclick="showSocialLogin('apple')"
                                class="flex items-center justify-center gap-3 py-3 md:py-2.5 border border-stone-200 rounded-xl
                                       bg-white hover:bg-stone-50 transition-colors hover:border-stone-300
                                       active:scale-[0.98]"
                            >
                                <svg class="w-5 h-5 text-stone-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.05 20.28c-.98.95-2.05.88-3.08.35-1.09-.56-2.09-.48-3.08 0-.93.45-2.1.53-3.17-.53C4.18 16.5 4.3 8.65 9.42 8.4c1.3.06 2.47.88 3.23.88.75 0 2.17-1.07 3.65-.92 2.51.25 3.73 2.07 3.79 2.15-3.03 1.83-2.5 5.56.55 6.78-.26.87-.64 1.74-1.15 2.47-.56.8-1.5 2.37-2.44 2.52zM13 5.3c.67-1.47 2.13-2.29 3.66-2.3-.13 1.68-1.09 3.23-2.34 3.92-1.34.78-2.9 1.12-3.66-.41-.1-.19-.13-.39-.13-.59 0-1.02.4-1.92.47-2.62z"/>
                                </svg>
                                <span class="text-sm font-medium text-stone-700">Continue with Apple</span>
                            </button>
                        </div>

                        <!-- Trust Badges for Mobile -->
                        <div class="pt-6 border-t border-stone-200 lg:hidden">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center gap-2">
                                    <div class="rounded-full bg-emerald-100 p-1.5">
                                        <i data-lucide="check" class="w-3 h-3 text-emerald-600"></i>
                                    </div>
                                    <span class="text-xs text-stone-600">Dermatologist Tested</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="rounded-full bg-emerald-100 p-1.5">
                                        <i data-lucide="check" class="w-3 h-3 text-emerald-600"></i>
                                    </div>
                                    <span class="text-xs text-stone-600">Clean Ingredients</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right Side - Marketing Section -->
                <div class="hidden lg:flex flex-col gap-6">
                    <!-- Main Marketing Card -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl shadow-stone-200/50 border border-stone-100 relative overflow-hidden">
                        <span class="inline-block px-3 py-1 bg-sky-100 text-sky-700 text-xs font-semibold tracking-wide rounded-full mb-4">
                            EXCLUSIVE ACCESS
                        </span>
                        <h2 class="text-2xl font-bold text-stone-900 mb-2">Unlock Calmer, Glowing Skin</h2>
                        <p class="text-stone-600 mb-6">
                            Join the Dr. Kinjal community to get dermatologist-led routines, early access to new launches and clinic-inspired tips.
                        </p>
                        
                        <!-- Product Preview -->
                        <div class="bg-stone-50/50 p-4 rounded-2xl mb-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-amber-200 to-orange-300 flex items-center justify-center">
                                    <i data-lucide="droplets" class="w-8 h-8 text-amber-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-stone-900">C-Glow Serum</h3>
                                    <p class="text-sm text-stone-500">Brightening & Anti-Pigmentation</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-sky-600 font-bold">₹24</span>
                                        <div class="flex gap-1">
                                            <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                                            <div class="w-2 h-2 rounded-full bg-orange-400"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="text-xl font-bold text-sky-600">2k+</div>
                                <div class="text-xs text-stone-500">Happy Customers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-sky-600">94%</div>
                                <div class="text-xs text-stone-500">Visible Results</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-sky-600">100%</div>
                                <div class="text-xs text-stone-500">Vegan & Clean</div>
                            </div>
                        </div>
                    </div>

                    <!-- Mini Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-stone-900">Face Wash</h3>
                                    <p class="text-xs text-stone-600 mt-1">Gentle & Hydrating</p>
                                </div>
                                <div class="bg-white p-2 rounded-full">
                                    <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-2xl p-6 border border-rose-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-stone-900">Lip Balm</h3>
                                    <p class="text-xs text-stone-600 mt-1">Barrier-Friendly</p>
                                </div>
                                <div class="bg-white p-2 rounded-full">
                                    <i data-lucide="arrow-right" class="w-4 h-4 text-stone-900"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Marketing Section -->
                <div class="lg:hidden mt-8">
                    <div class="bg-white rounded-3xl p-6 shadow-xl shadow-stone-200/50 border border-stone-100">
                        <h3 class="font-bold text-lg text-stone-900 mb-3">Why Join Dr. Kinjal?</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                    <i data-lucide="star" class="w-4 h-4 text-sky-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-stone-900">Personalized Routines</h4>
                                    <p class="text-sm text-stone-600">Get skincare advice tailored to your skin type</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                    <i data-lucide="shield" class="w-4 h-4 text-sky-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-stone-900">Dermatologist Approved</h4>
                                    <p class="text-sm text-stone-600">All products are clinically tested and approved</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="rounded-full bg-sky-100 p-2 mt-0.5">
                                    <i data-lucide="leaf" class="w-4 h-4 text-sky-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-stone-900">Clean & Sustainable</h4>
                                    <p class="text-sm text-stone-600">100% vegan, cruelty-free formulas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Note -->
    <div class="bg-white border-t border-stone-200 py-4 px-4">
        <div class="max-w-6xl mx-auto">
            <p class="text-center text-sm text-stone-500">
                By continuing, you agree to our 
                <a href="#" class="text-sky-600 hover:text-sky-700">Terms of Service</a> 
                and 
                <a href="#" class="text-sky-600 hover:text-sky-700">Privacy Policy</a>
            </p>
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
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            
            // Password toggle functionality
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('passwordInput');
            
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
            
            // Prevent form submission on enter key for social buttons
            const socialButtons = document.querySelectorAll('.social-buttons button');
            socialButtons.forEach(button => {
                button.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        this.click();
                    }
                });
            });
            
            // Focus management for better mobile experience
            const inputs = document.querySelectorAll('input');
            inputs.forEach((input, index) => {
                input.addEventListener('focus', function() {
                    if (window.innerWidth < 768) {
                        setTimeout(() => {
                            this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }, 100);
                    }
                });
            });
            
            // Auto-focus email input on page load
            const emailInput = document.getElementById('emailInput');
            if (emailInput) {
                setTimeout(() => {
                    emailInput.focus();
                }, 300);
            }
        });
        
        // Handle login (static version - just shows success message)
        function handleLogin() {
            const emailInput = document.getElementById('emailInput');
            const passwordInput = document.getElementById('passwordInput');
            const loginButton = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            
            // Basic validation
            if (!emailInput.value || !emailInput.value.includes('@')) {
                showMessage('Please enter a valid email address', 'error');
                emailInput.focus();
                emailInput.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                return;
            } else {
                emailInput.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            }
            
            if (!passwordInput.value || passwordInput.value.length < 6) {
                showMessage('Please enter your password', 'error');
                passwordInput.focus();
                passwordInput.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                return;
            } else {
                passwordInput.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            }
            
            // Show loading state
            buttonText.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin mr-2"></i> Signing In...';
            lucide.createIcons();
            loginButton.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                showMessage('Login successful! Redirecting to your dashboard...', 'success');
                lucide.createIcons();
                
                // Redirect to home page after 2 seconds
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            }, 1500);
        }
        
        // Show social login message
        function showSocialLogin(provider) {
            const providerName = provider === 'google' ? 'Google' : 'Apple';
            showMessage(`${providerName} login would be implemented in a real application`, 'info');
        }
        
        // Show forgot password message
        function showForgotPassword() {
            showMessage('Password reset would be implemented in a real application', 'info');
        }
        
        // Show message function
        function showMessage(message, type) {
            // Remove any existing messages
            const existingMessages = document.querySelectorAll('.custom-message');
            existingMessages.forEach(msg => msg.remove());
            
            // Create message element
            const messageDiv = document.createElement('div');
            messageDiv.className = `custom-message mt-4 p-4 rounded-xl border ${
                type === 'error' ? 'bg-red-50 border-red-200 text-red-700' :
                type === 'success' ? 'bg-green-50 border-green-200 text-green-700' :
                'bg-blue-50 border-blue-200 text-blue-700'
            }`;
            
            messageDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <i data-lucide="${
                        type === 'error' ? 'alert-circle' :
                        type === 'success' ? 'check-circle' : 'info'
                    }" class="w-5 h-5"></i>
                    <span class="font-medium">${message}</span>
                </div>
            `;
            
            // Insert after form
            const formCard = document.querySelector('.form-card');
            formCard.insertBefore(messageDiv, formCard.querySelector('form'));
            
            lucide.createIcons();
            
            // Auto-remove after 5 seconds
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }
        
        // Handle viewport height on mobile
        function setViewportHeight() {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        }
        
        window.addEventListener('resize', setViewportHeight);
        setViewportHeight();
    </script>
</body>
</html>