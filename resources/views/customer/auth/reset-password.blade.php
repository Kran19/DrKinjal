@extends('customer.layouts.master')

@section('title', 'Reset Password - ' . config('app.name'))

@section('content')
<div class="bg-stone-50 text-stone-900 antialiased min-h-screen pt-6 md:pt-8 flex items-center justify-center">
    <div class="max-w-md w-full px-4 py-8">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-stone-900 mb-2">Create New Password</h1>
            <p class="text-stone-600">Please enter your new password below</p>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-xl shadow-stone-200/50 border border-stone-100 animate-fade-in">
            
            <form method="POST" action="{{ route('customer.password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-2">Email Address</label>
                    <div class="relative">
                        <i data-lucide="mail" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                        <input type="email" name="email" required 
                               value="{{ $email ?? old('email') }}" readonly
                               class="w-full pl-12 pr-4 py-3 bg-stone-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-stone-200' }} rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400 transition-all placeholder:text-stone-400"
                               placeholder="hello@drkinjal.com">
                    </div>
                    @if($errors->has('email'))
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-2">New Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                        <input type="password" name="password" required 
                               class="w-full pl-12 pr-4 py-3 bg-stone-50 border {{ $errors->has('password') ? 'border-red-500' : 'border-stone-200' }} rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400 transition-all placeholder:text-stone-400"
                               placeholder="••••••••">
                    </div>
                    @if($errors->has('password'))
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-2">Confirm New Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                        <input type="password" name="password_confirmation" required 
                               class="w-full pl-12 pr-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 focus:outline-none focus:ring-2 focus:ring-sky-500/40 focus:border-sky-400 transition-all placeholder:text-stone-400"
                               placeholder="••••••••">
                    </div>
                </div>
                
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 text-white font-semibold py-3.5 rounded-full shadow-lg shadow-sky-200 hover:shadow-sky-300 transition-all duration-300 active:scale-[0.98]">
                    Reset Password
                </button>
            </form>
            
            <div class="mt-8 pt-6 border-t border-stone-100">
                <div class="text-center space-y-3">
                    <p class="text-sm text-stone-600">
                        <a href="{{ route('customer.login') }}" class="text-sky-600 hover:text-sky-800 font-medium inline-flex items-center gap-1 transition-colors">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Back to Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
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
