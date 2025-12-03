@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Register</h2>

@if ($errors->any())
<div class="text-red-600 mb-2">
    {{ $errors->first() }}
</div>
@endif

<form method="POST" action="/register">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="border w-full p-2" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="border w-full p-2" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="border w-full p-2" required>
    </div>

    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="border w-full p-2" required>
    </div>

    <button class="bg-green-600 text-white px-4 py-2">Register</button>

    <p class="mt-3">
        Sudah punya akun? <a href="/login" class="text-blue-600">Login</a>
    </p>
</form>
@endsection