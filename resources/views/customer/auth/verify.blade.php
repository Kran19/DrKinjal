@extends('customer.layouts.master')

@section('title', 'Verify Email - ' . config('app.name'))

@section('content')
<div class="bg-stone-50 text-stone-900 antialiased min-h-screen pt-6 md:pt-8 flex items-center justify-center">
    <div class="max-w-md w-full px-4 py-8">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-stone-900 mb-2">Verify Your Email</h1>
            <p class="text-stone-600">Enter the OTP sent to your email address</p>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-xl shadow-stone-200/50 border border-stone-100 animate-fade-in">
            
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-sky-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="mail-open" class="text-sky-600 w-8 h-8"></i>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-2 text-green-700">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 text-red-700 mb-2">
                        <i data-lucide="alert-circle" class="w-5 h-5"></i>
                        <span class="font-medium text-sm">Please fix the following:</span>
                    </div>
                    <ul class="text-sm text-red-600 list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-2 text-red-700">
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Demo OTPs for Development -->
            @if(session('email_otp'))
                <div class="mb-6 p-4 bg-amber-50 rounded-xl border border-amber-200">
                    <h3 class="font-semibold text-amber-800 mb-2 flex items-center gap-2 text-sm">
                        <i data-lucide="code" class="w-4 h-4"></i> Demo OTP (Dev Mode)
                    </h3>
                    <div>
                        <p class="text-xs text-amber-700">Email OTP:</p>
                        <p class="text-lg font-mono font-bold text-amber-800">{{ session('email_otp') }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('customer.verify.submit') }}" id="verifyForm" class="space-y-6">
                @csrf

                <!-- Hidden fields to preserve session data -->
                <input type="hidden" name="verification_key" value="{{ session('verification_key') }}">
                
                <!-- Email OTP -->
                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-2">
                        Email OTP
                    </label>
                    <div class="relative">
                        <input type="text"
                               name="email_otp"
                               maxlength="6"
                               required
                               value="{{ old('email_otp') }}"
                               class="w-full px-4 py-3 text-center text-2xl font-mono tracking-widest rounded-xl border {{ $errors->has('email_otp') ? 'border-red-500' : 'border-stone-200' }} focus:border-sky-500 focus:ring-2 focus:ring-sky-500/40 focus:outline-none transition-all"
                               placeholder="123456"
                               autocomplete="off"
                               id="emailOtpInput">
                    </div>
                    <div class="flex justify-between items-center mt-3">
                        <span class="text-xs text-stone-500">
                            @if(session('email'))
                                Sent to: <span class="font-semibold text-stone-700">{{ session('email') }}</span>
                            @endif
                        </span>
                        <button type="button" onclick="openChangeEmailModal()" class="text-xs text-sky-600 hover:text-sky-800 font-medium flex items-center gap-1 transition-colors">
                            <i data-lucide="edit-2" class="w-3 h-3"></i>Change Email
                        </button>
                    </div>
                    @if($errors->has('email_otp'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('email_otp') }}</p>
                    @endif
                </div>

                <!-- OTP Timer -->
                <div class="text-center bg-stone-50 py-2 rounded-lg">
                    <p class="text-sm text-stone-600 flex items-center justify-center gap-2">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        OTP expires in: <span id="otpTimer" class="font-bold text-amber-600 font-mono">05:00</span>
                    </p>
                </div>

                <!-- Resend OTP -->
                <div class="text-center">
                    <button type="button"
                            id="resendOtpBtn"
                            disabled
                            class="text-sm font-medium text-sky-600 hover:text-sky-800 disabled:text-stone-400 disabled:cursor-not-allowed transition-colors flex items-center justify-center gap-2 w-full">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        <span id="resendText">Resend OTP (60s)</span>
                    </button>
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 text-white font-semibold py-3.5 rounded-full shadow-lg shadow-sky-200 hover:shadow-sky-300 transition-all duration-300 active:scale-[0.98]">
                    Verify Account
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Change Email Modal -->
<div id="changeEmailModal" class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center opacity-0 transition-all duration-300 px-4">
    <div class="bg-white rounded-3xl shadow-2xl p-6 w-full max-w-sm transform scale-95 transition-all duration-300">
        <h3 class="text-lg font-bold text-stone-900 mb-2">Change Email Address</h3>
        <p class="text-sm text-stone-600 mb-4">Enter your new email address. We will send a new OTP to this address.</p>
        
        <form id="changeEmailForm" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">New Email Address</label>
                <input type="email" id="newEmailInput" required 
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-200 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/40 outline-none transition-all">
            </div>
            
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="closeChangeEmailModal()" class="px-4 py-2 text-stone-600 hover:bg-stone-100 rounded-lg transition-colors font-medium text-sm">Cancel</button>
                <button type="submit" class="px-5 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition-colors font-medium text-sm shadow-md shadow-sky-200">Update & Resend</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@push('scripts')
<script>
// OTP Input Handling
document.getElementById('emailOtpInput').addEventListener('input', function(e) {
    this.value = this.value.replace(/\D/g, '');
    this.classList.remove('border-red-500');
});

// Modal Handling
const modal = document.getElementById('changeEmailModal');
const modalContent = modal.querySelector('div');

function openChangeEmailModal() {
    modal.classList.remove('hidden');
    // Trigger reflow
    void modal.offsetWidth;
    modal.classList.remove('opacity-0');
    modalContent.classList.remove('scale-95');
    modalContent.classList.add('scale-100');
    document.getElementById('newEmailInput').value = '{{ session('email') }}';
    document.getElementById('newEmailInput').focus();
}

function closeChangeEmailModal() {
    modal.classList.add('opacity-0');
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Change Email Submit
document.getElementById('changeEmailForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('newEmailInput').value;
    const btn = this.querySelector('button[type="submit"]');
    const originalText = btn.textContent;
    
    btn.disabled = true;
    btn.textContent = 'Updating...';
    
    fetch('{{ route("customer.auth.change-email") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showSuccessToast('Email updated and OTP resent!');
            closeChangeEmailModal();
            // Update displayed email
            const emailSpan = document.querySelector('.text-stone-700');
            if(emailSpan) emailSpan.textContent = email;
            
            resendTimeLeft = 60;
            updateResendTimer();
            if(!resendTimerInterval) resendTimerInterval = setInterval(updateResendTimer, 1000);
            
        } else {
            alert(data.message || 'Failed to update email');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    })
    .finally(() => {
        btn.disabled = false;
        btn.textContent = originalText;
    });
});

// OTP Timer
let otpTimeLeft = 300; // 5 minutes in seconds
const otpTimer = document.getElementById('otpTimer');
let timerInterval;

function updateOTPTimer() {
    const minutes = Math.floor(otpTimeLeft / 60);
    const seconds = otpTimeLeft % 60;

    otpTimer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

    if (otpTimeLeft <= 0) {
        clearInterval(timerInterval);
        otpTimer.textContent = "Expired";
        otpTimer.classList.remove('text-amber-600');
        otpTimer.classList.add('text-red-600');
        document.getElementById('resendOtpBtn').disabled = false;
        document.getElementById('resendText').textContent = 'Resend OTP';
    } else {
        otpTimeLeft--;
    }
}

timerInterval = setInterval(updateOTPTimer, 1000);

// Resend OTP Functionality
let resendTimeLeft = 60;
const resendBtn = document.getElementById('resendOtpBtn');
const resendText = document.getElementById('resendText');
let resendTimerInterval;

function updateResendTimer() {
    if (resendTimeLeft > 0) {
        resendBtn.disabled = true;
        resendText.textContent = `Resend OTP (${resendTimeLeft}s)`;
        resendTimeLeft--;
    } else {
        resendBtn.disabled = false;
        resendText.textContent = 'Resend OTP';
        clearInterval(resendTimerInterval);
        resendTimerInterval = null;
    }
}

resendTimerInterval = setInterval(updateResendTimer, 1000);

resendBtn.addEventListener('click', function() {
    if (this.disabled) return;

    this.disabled = true;
    resendTimeLeft = 60;
    updateResendTimer();
    resendTimerInterval = setInterval(updateResendTimer, 1000);

    // AJAX request to resend OTP
    fetch('{{ route("customer.otp.resend") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update demo OTP if visible
            const demoDiv = document.querySelector('.bg-amber-50 .text-lg');
            if (demoDiv && data.email_otp) {
                demoDiv.textContent = data.email_otp;
            }

            // Reset main timer
            otpTimeLeft = 300;
            clearInterval(timerInterval);
            otpTimer.textContent = "05:00";
            otpTimer.classList.remove('text-red-600');
            otpTimer.classList.add('text-amber-600');
            timerInterval = setInterval(updateOTPTimer, 1000);

            showSuccessToast('OTP has been resent!');
        } else {
            showErrorToast(data.message || 'Failed to resend OTP');
            this.disabled = false;
            resendText.textContent = 'Resend OTP';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showErrorToast('An error occurred');
        this.disabled = false;
        resendText.textContent = 'Resend OTP';
    });
});

function showSuccessToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    toast.innerHTML = `<div class="flex items-center"><i data-lucide="check-circle" class="mr-2 w-5 h-5"></i><span>${message}</span></div>`;
    document.body.appendChild(toast);
    lucide.createIcons();
    setTimeout(() => toast.classList.remove('translate-x-full'), 10);
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => document.body.removeChild(toast), 300);
    }, 3000);
}

function showErrorToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 p-4 bg-red-100 text-red-800 border border-red-200 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    toast.innerHTML = `<div class="flex items-center"><i data-lucide="alert-circle" class="mr-2 w-5 h-5"></i><span>${message}</span></div>`;
    document.body.appendChild(toast);
    lucide.createIcons();
    setTimeout(() => toast.classList.remove('translate-x-full'), 10);
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => document.body.removeChild(toast), 300);
    }, 3000);
}
</script>
@endpush
