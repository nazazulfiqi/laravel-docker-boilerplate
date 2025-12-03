@extends('layouts.app')

@section('content')
<h2 class="text-center text-3xl font-bold text-gray-800 mb-6">
    Create an Account ✨
</h2>

@if ($errors->any())
<div class="bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg mb-4">
    {{ $errors->first() }}
</div>
@endif

<form method="POST" action="/register" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium text-gray-700 mb-1">Name</label>
        <input type="text" name="name"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
            required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
            required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
            required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
            required>
    </div>

    <button
        class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-xl font-semibold transition">
        Register
    </button>

    <p class="text-center text-gray-600 text-sm mt-3">
        Sudah punya akun?
        <a href="/login" class="text-blue-600 font-medium hover:underline">Login</a>
    </p>
</form>
@endsection