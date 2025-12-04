@extends('layouts.app')

@section('content')
<!-- updated header to match register page with purple accent -->
<div class="mb-8 text-center">
    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-linear-to-br from-indigo-500 to-indigo-600 mb-4 shadow-sm">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
    </div>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Create an account</h1>
    <p class="text-gray-600 text-sm">Join us to get started</p>
</div>

<!-- updated error alert for light theme -->
@if ($errors->any())
<div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
    <div class="flex items-start">
        <svg class="w-5 h-5 text-red-600 mt-0.5 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
        </svg>
        <span class="text-red-800 text-sm font-medium">{{ $errors->first() }}</span>
    </div>
</div>
@endif

<form method="POST" action="/register" class="space-y-5">
    @csrf

    <!-- updated all input fields to light theme -->
    <div>
        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
            Full name
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-gray-900 placeholder-gray-500"
                placeholder="John Doe"
                required
                value="{{ old('name') }}">
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
            Email address
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <input
                type="email"
                id="email"
                name="email"
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-gray-900 placeholder-gray-500"
                placeholder="you@example.com"
                required
                value="{{ old('email') }}">
        </div>
    </div>

    <div>
        <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">
            Password
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password"
                name="password"
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-gray-900 placeholder-gray-500"
                placeholder="••••••••"
                required>
        </div>
        <p class="mt-1 text-xs text-gray-600">Min. 8 characters with numbers and special characters</p>
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-2">
            Confirm password
        </label>
        <div class="relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-gray-900 placeholder-gray-500"
                placeholder="••••••••"
                required>
        </div>
    </div>

    <!-- updated terms checkbox styling -->
    <div class="flex items-start">
        <input type="checkbox" id="terms" name="terms" class="w-4 h-4 rounded border-gray-300 bg-gray-50 text-indigo-600 focus:ring-indigo-500 mt-0.5" required>
        <label for="terms" class="ml-2 text-sm text-gray-700">
            I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Privacy Policy</a>
        </label>
    </div>

    <!-- updated submit button to indigo gradient -->
    <button
        type="submit"
        class="w-full py-2.5 px-4 bg-linear-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-sm hover:shadow-md">
        Create account
    </button>
</form>

<!-- updated divider -->
<div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-gray-200"></div>
    </div>
    <div class="relative flex justify-center text-sm">
        <span class="px-2 bg-white text-gray-600">Already have an account?</span>
    </div>
</div>

<!-- updated secondary button for light theme -->
<a href="/login" class="block w-full py-2.5 px-4 border border-gray-300 hover:border-gray-400 text-gray-700 font-semibold rounded-lg transition text-center hover:bg-gray-50 bg-white">
    Sign in instead
</a>
@endsection