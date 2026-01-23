@extends('customer.layouts.master')

@section('title', 'Change Password | Dr. Kinjal')

@push('styles')
<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background-color: #fafafa;
        min-height: 100vh;
    }
    
    .password-input-container {
        position: relative;
    }
    
    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
    .password-strength-meter {
        height: 4px;
        background-color: #e5e7eb;
        border-radius: 2px;
        margin-top: 4px;
        overflow: hidden;
    }
    
    .password-strength-fill {
        height: 100%;
        width: 0%;
        border-radius: 2px;
        transition: width 0.3s ease, background-color 0.3s ease;
    }
    
    .password-strength-text {
        font-size: 0.75rem;
        margin-top: 4px;
        min-height: 1rem;
    }
    
    .requirement-list {
        padding-left: 1.5rem;
    }
    
    .requirement-item {
        position: relative;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        color: #64748b;
    }
    
    .requirement-item.met {
        color: #10b981;
    }
    
    .requirement-item::before {
        content: "○";
        position: absolute;
        left: -1.5rem;
    }
    
    .requirement-item.met::before {
        content: "✓";
    }

    .toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #64748b;
    cursor: pointer;
    padding: 4px;
    z-index: 20; /* Add this to ensure it's above other elements */
    }

    .toggle-password:hover {
    color: #0ea5e9;
    }

    .password-input-container {
    position: relative;
    z-index: 10;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .account-container {
            padding: 0 1rem;
        }
        .profile-card {
            padding: 1.5rem !important;
        }
    }
</style>
@endpush

@section('content')
<!-- Main Content -->
<main class="flex-grow account-container pt-8 lg:pt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-16">
        
        <!-- Page Header -->
        <div class="mb-8 lg:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-stone-900 mb-2">Change Password</h1>
            <p class="text-stone-600">Secure your account with a new password</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Sidebar - Navigation -->
            <div class="lg:col-span-1">
                <!-- Profile Card -->
                <div class="profile-card bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100 mb-6 animate-fade-in">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-100 to-teal-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-8 h-8 text-cyan-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-stone-900">{{ Auth::guard('customer')->user()->name }}</h2>
                            <p class="text-stone-500">{{ Auth::guard('customer')->user()->email }}</p>
                            <span class="inline-block mt-1 px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-semibold rounded-full">
                                Member
                            </span>
                        </div>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-grid grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">₹{{ number_format($totalSpent, 0) }}</div>
                            <div class="text-sm text-stone-500">Total Spent</div>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-stone-900">{{ $ordersCount }}</div>
                            <div class="text-sm text-stone-500">Total Orders</div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="space-y-2">
                        <a href="{{ route('customer.account.orders') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="package" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">My Orders</span>
                        </a>
                        
                        <a href="{{ route('customer.account.profile') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="user" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Profile Settings</span>
                        </a>
                        
                        <a href="{{ route('customer.account.addresses') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Saved Addresses</span>
                        </a>

                        <a href="{{ route('customer.wishlist.index') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 flex items-center gap-3">
                            <i data-lucide="heart" class="w-5 h-5 text-stone-400"></i>
                            <span class="font-medium">Wishlist</span>
                        </a>
                        
                        <a href="{{ route('customer.account.change-password') }}" class="block w-full text-left p-3 rounded-xl hover:bg-stone-50 active bg-white text-cyan-600 flex items-center gap-3">
                            <i data-lucide="lock" class="w-5 h-5 text-cyan-600"></i>
                            <span class="font-medium">Change Password</span>
                        </a>
                        
                        <form method="POST" action="{{ route('customer.logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left p-3 rounded-xl hover:bg-red-50 text-red-600 flex items-center gap-3 mt-4">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                                <span class="font-medium">Log Out</span>
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Security Tips -->
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 rounded-3xl p-6 text-white">
                    <h3 class="font-bold mb-4 flex items-center gap-2">
                        <i data-lucide="shield" class="w-5 h-5"></i>
                        Security Tips
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Use at least 8 characters</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Combine letters, numbers & symbols</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Avoid common words & personal info</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>Change password every 90 days</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Content Area - Change Password Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-stone-200/50 border border-stone-100">
                    <h2 class="text-2xl font-bold text-stone-900 mb-6">Update Your Password</h2>
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-xl flex items-center gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form id="changePasswordForm" action="{{ route('customer.account.change-password.update') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Current Password -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Current Password</label>
                            <div class="password-input-container">
                                <input 
                                    type="password" 
                                    id="currentPassword"
                                    name="current_password"
                                    class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400"
                                    placeholder="Enter your current password"
                                    required
                                >
                                <button type="button" class="toggle-password" data-target="currentPassword">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- New Password -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">New Password</label>
                            <div class="password-input-container">
                                <input 
                                    type="password" 
                                    id="newPassword"
                                    name="password"
                                    class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400"
                                    placeholder="Enter new password"
                                    required
                                >
                                <button type="button" class="toggle-password" data-target="newPassword">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                            </div>
                            
                            <!-- Password Strength Meter -->
                            <div class="password-strength-meter">
                                <div id="passwordStrengthFill" class="password-strength-fill"></div>
                            </div>
                            <div id="passwordStrengthText" class="password-strength-text text-sm"></div>
                            
                            <!-- Password Requirements -->
                            <div class="mt-4">
                                <p class="text-sm font-medium text-stone-700 mb-2">Password must contain:</p>
                                <ul class="requirement-list">
                                    <li id="reqLength" class="requirement-item">At least 8 characters</li>
                                    <li id="reqUppercase" class="requirement-item">One uppercase letter</li>
                                    <li id="reqLowercase" class="requirement-item">One lowercase letter</li>
                                    <li id="reqNumber" class="requirement-item">One number</li>
                                    <li id="reqSpecial" class="requirement-item">One special character</li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Confirm New Password -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-stone-700">Confirm New Password</label>
                            <div class="password-input-container">
                                <input 
                                    type="password" 
                                    id="confirmPassword"
                                    name="password_confirmation"
                                    class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 focus:border-cyan-400"
                                    placeholder="Confirm new password"
                                    required
                                >
                                <button type="button" class="toggle-password" data-target="confirmPassword">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                            </div>
                            <div id="passwordMatch" class="text-sm min-h-5"></div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-stone-100 flex flex-wrap gap-3">
                            <button 
                                type="submit" 
                                id="submitButton"
                                class="px-6 py-3 bg-cyan-600 text-white font-semibold rounded-xl hover:bg-cyan-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                Update Password
                            </button>
                            <a 
                                href="{{ route('customer.account.profile') }}" 
                                class="px-6 py-3 bg-white border border-stone-200 text-stone-700 font-semibold rounded-xl hover:bg-stone-50 transition-colors"
                            >
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer Note -->
<div class="bg-white border-t border-stone-200 py-4 px-4 mt-8">
    <div class="max-w-7xl mx-auto">
        <p class="text-center text-sm text-stone-500">
            Having trouble changing your password? 
            <a href="{{ route('customer.page.contact') }}" class="text-cyan-600 hover:text-cyan-700 font-medium ml-1">Contact support</a>
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Password visibility toggle functionality
    function setupPasswordToggles() {
        document.querySelectorAll('.toggle-password').forEach(button => {
            // Make sure the button has the event listener
            if (!button.hasAttribute('data-listener')) {
                button.setAttribute('data-listener', 'true');
                
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (passwordInput) {
                        // Toggle password visibility
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            // Update the icon to "eye-off"
                            if (icon) {
                                icon.setAttribute('data-lucide', 'eye-off');
                                lucide.createIcons();
                            }
                        } else {
                            passwordInput.type = 'password';
                            // Update the icon to "eye"
                            if (icon) {
                                icon.setAttribute('data-lucide', 'eye');
                                lucide.createIcons();
                            }
                        }
                    }
                });
            }
        });
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize password toggles immediately
        setupPasswordToggles();
        
        const form = document.getElementById('changePasswordForm');
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const submitButton = document.getElementById('submitButton');
        const passwordStrengthFill = document.getElementById('passwordStrengthFill');
        const passwordStrengthText = document.getElementById('passwordStrengthText');
        const passwordMatchText = document.getElementById('passwordMatch');
        
        // Check password strength
        function checkPasswordStrength(password) {
            let strength = 0;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };
            
            // Update requirement indicators
            Object.keys(requirements).forEach((req, index) => {
                const element = document.getElementById(`req${req.charAt(0).toUpperCase() + req.slice(1)}`);
                if (element) {
                    if (requirements[req]) {
                        element.classList.add('met');
                        strength += 20;
                    } else {
                        element.classList.remove('met');
                    }
                }
            });
            
            // Update strength meter
            if (passwordStrengthFill) {
                passwordStrengthFill.style.width = `${strength}%`;
                
                // Update strength text and color
                let strengthText = '';
                let strengthColor = '';
                
                if (strength < 40) {
                    strengthText = 'Weak';
                    strengthColor = '#ef4444'; // red
                } else if (strength < 70) {
                    strengthText = 'Fair';
                    strengthColor = '#f59e0b'; // amber
                } else if (strength < 90) {
                    strengthText = 'Good';
                    strengthColor = '#3b82f6'; // blue
                } else {
                    strengthText = 'Strong';
                    strengthColor = '#10b981'; // emerald
                }
                
                passwordStrengthFill.style.backgroundColor = strengthColor;
                
                if (passwordStrengthText) {
                    passwordStrengthText.textContent = strengthText;
                    passwordStrengthText.style.color = strengthColor;
                }
            }
            
            return strength >= 70; // Consider 70%+ as acceptable
        }
        
        // Check if passwords match
        function checkPasswordMatch() {
            const password = newPasswordInput ? newPasswordInput.value : '';
            const confirmPassword = confirmPasswordInput ? confirmPasswordInput.value : '';
            
            if (!password || !confirmPassword) {
                if (passwordMatchText) {
                    passwordMatchText.textContent = '';
                    passwordMatchText.className = 'text-sm min-h-5';
                }
                return false;
            }
            
            if (password === confirmPassword) {
                if (passwordMatchText) {
                    passwordMatchText.textContent = '✓ Passwords match';
                    passwordMatchText.className = 'text-sm min-h-5 text-emerald-600';
                }
                return true;
            } else {
                if (passwordMatchText) {
                    passwordMatchText.textContent = '✗ Passwords do not match';
                    passwordMatchText.className = 'text-sm min-h-5 text-red-600';
                }
                return false;
            }
        }
        
        // Validate form
        function validateForm() {
            const currentPassword = document.getElementById('currentPassword');
            const currentPasswordValue = currentPassword ? currentPassword.value : '';
            const isStrongPassword = newPasswordInput ? checkPasswordStrength(newPasswordInput.value) : false;
            const isMatching = checkPasswordMatch();
            
            const isValid = currentPasswordValue && isStrongPassword && isMatching;
            if (submitButton) {
                submitButton.disabled = !isValid;
            }
            
            return isValid;
        }
        
        // Event listeners for real-time validation
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
                checkPasswordMatch();
                validateForm();
            });
        }
        
        if (confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', function() {
                checkPasswordMatch();
                validateForm();
            });
        }
        
        const currentPasswordInput = document.getElementById('currentPassword');
        if (currentPasswordInput) {
            currentPasswordInput.addEventListener('input', validateForm);
        }
        
        // Form submission
        if (form) {
            form.addEventListener('submit', function(e) {
                // Client-side validation before submission
                if (!validateForm()) {
                    e.preventDefault(); // Prevent form submission if validation fails
                    // Optionally, scroll to the first error or show a general message
                    alert('Please ensure all password requirements are met and passwords match.');
                    return;
                }
                
                // Disable button and show loading state on submission
                if (submitButton) {
                    submitButton.innerHTML = '<span>Updating...</span>';
                    submitButton.disabled = true;
                }
                // The form will now submit normally to the server
            });
        }
        
        // Initialize form validation
        validateForm();
    });
</script>
@endpush