<!-- FILE: resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="mb-8 text-center">
    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-linear-to-br from-blue-500 to-indigo-600 mb-4">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
    </div>
    <h1 class="text-3xl font-bold text-white mb-2">Welcome back</h1>
    <p class="text-slate-400 text-sm">Sign in to your account to continue</p>
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
<form method="POST" action="/login" class="space-y-5">
    @csrf

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
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
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
                class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition text-white placeholder-slate-500"
                placeholder="••••••••"
                required>
        </div>
    </div>

    <!-- Remember Me -->
    <div class="flex items-center justify-between">
        <label class="flex items-center">
            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-slate-400">Remember me</span>
        </label>
        <a href="#" class="text-sm text-blue-400 hover:text-blue-300 transition">
            Forgot password?
        </a>
    </div>

    <!-- Submit Button -->
    <button
        type="submit"
        class="w-full py-2.5 px-4 bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-lg hover:shadow-blue-500/50">
        Sign in
    </button>
</form>

<!-- Divider -->
<div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-slate-700"></div>
    </div>
    <div class="relative flex justify-center text-sm">
        <span class="px-2 bg-slate-900/50 text-slate-500">Don't have an account?</span>
    </div>
</div>

<!-- Register Link -->
<a href="/register" class="block w-full py-2.5 px-4 border border-slate-700 hover:border-slate-600 text-slate-300 font-semibold rounded-lg transition text-center hover:bg-slate-800/50">
    Create account
</a>
@endsection