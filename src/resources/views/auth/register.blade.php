<!-- FILE: resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="mb-8 text-center">
    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 mb-4">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
    </div>
    <h1 class="text-3xl font-bold text-white mb-2">Create an account</h1>
    <p class="text-slate-400 text-sm">Join us to get started</p>
</div>

<!-- Error Alert -->
@if ($errors->any())
<div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20">
    <div class="flex items-start">
        <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
        </svg>
        <span class="text-red-200 text-sm">{{ $errors->first() }}</span>
    </div>
</div>
@endif

<!-- Form -->
<form method="POST" action="/register" class="space-y-5">
    @csrf

    <!-- Full Name Field -->
    <div>
        <label for="name" class="block text-sm font-medium text-slate-300 mb-2">
            Full name
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
                placeholder="John Doe"
                required
                value="{{ old('name') }}">
        </div>
    </div>

    <!-- Email Field -->
    <div>
        <label for="email" class="block text-sm font-medium text-slate-300 mb-2">
            Email address
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <input
                type="email"
                id="email"
                name="email"
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
                placeholder="you@example.com"
                required
                value="{{ old('email') }}">
        </div>
    </div>

    <!-- Password Field -->
    <div>
        <label for="password" class="block text-sm font-medium text-slate-300 mb-2">
            Password
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password"
                name="password"
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
                placeholder="••••••••"
                required>
            <p class="mt-1 text-xs text-slate-500">Min. 8 characters with numbers and special characters</p>
        </div>
    </div>

    <!-- Confirm Password Field -->
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">
            Confirm password
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
                placeholder="••••••••"
                required>
        </div>
    </div>

    <!-- Terms & Conditions -->
    <div class="flex items-start">
        <input type="checkbox" id="terms" name="terms" class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-purple-600 focus:ring-purple-500 mt-0.5" required>
        <label for="terms" class="ml-2 text-sm text-slate-400">
            I agree to the <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a> and <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a>
        </label>
    </div>

    <!-- Submit Button -->
    <button
        type="submit"
        class="w-full py-2.5 px-4 bg-linear-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-lg hover:shadow-purple-500/50">
        Create account
    </button>
</form>

<!-- Divider -->
<div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-slate-700"></div>
    </div>
    <div class="relative flex justify-center text-sm">
        <span class="px-2 bg-slate-900/50 text-slate-500">Already have an account?</span>
    </div>
</div>

<!-- Login Link -->
<a href="/login" class="block w-full py-2.5 px-4 border border-slate-700 hover:border-slate-600 text-slate-300 font-semibold rounded-lg transition text-center hover:bg-slate-800/50">
    Sign in instead
</a>
@endsection