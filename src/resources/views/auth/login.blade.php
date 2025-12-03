@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Login</h2>

@if ($errors->any())
<div class="text-red-600 mb-2">
    {{ $errors->first() }}
</div>
@endif

<form method="POST" action="/login">
    @csrf

    <div class="mb-3">
        <label class="text-5xl">Email</label>
        <input type="email" name="email" class="border w-full p-2" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="border w-full p-2" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2">Login</button>

    <p class="mt-3">
        Belum punya akun? <a href="/register" class="text-blue-600">Register</a>
    </p>
</form>
@endsection