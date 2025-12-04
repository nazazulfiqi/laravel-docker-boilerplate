@extends('layouts.app')

@section('content')
<div class="p-6 space-y-4">

    <h1 class="text-2xl font-bold">Dashboard</h1>

    <p>Selamat datang, <b>{{ $user['name'] }}</b>!</p>
    <p>Email: {{ $user['email'] }}</p>
    <p>Dibuat pada: {{ $user['created_at'] }}</p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold">Roles</h2>
    <ul class="list-disc ml-6">
        @foreach ($roles as $role)
        <li>{{ $role }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl font-semibold mt-4">Permissions</h2>
    <ul class="list-disc ml-6">
        @foreach ($permissions as $permission)
        <li>{{ $permission }}</li>
        @endforeach
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="mt-6 ">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 cursor-pointer rounded">
            Logout
        </button>
    </form>

</div>
@endsection