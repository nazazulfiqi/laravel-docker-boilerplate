@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Permission</h1>
            <p class="text-gray-600 mt-1 text-sm">Create a new permission</p>
        </div>
        <a href="{{ route('permissions') }}"
            class="inline-flex items-center justify-center px-4 py-2 bg-linear-to-r from-gray-700 to-black text-white font-semibold rounded-lg
                  hover:from-gray-800 hover:to-black transition">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>

            <span>Back</span>
        </a>
    </div>



    <!-- Form -->
    <!-- Form -->
    <form method="POST" action="{{ route('permissions.save') }}"
        class="bg-white rounded-xl border border-gray-200 p-6 space-y-5">

        @csrf

        <!-- Input -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Permission Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="mt-2 w-full px-4 py-2 border rounded-lg text-sm
           @error('name') border-red-500 @enderror"
                placeholder="Enter permission name" />

            @error('name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror

        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 transition">
            Create Permission
        </button>

    </form>


</div>
@endsection