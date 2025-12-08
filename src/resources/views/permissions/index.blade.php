@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">

    <!-- Header with Create Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Permissions Management</h1>
            <p class="text-gray-600 mt-1 text-sm">Manage and organize all permissions in your system</p>
        </div>
        <a href="{{ route('permissions.create') }}"
            class="inline-flex items-center justify-center px-4 py-2 bg-linear-to-r from-blue-600 to-indigo-600 
          text-white font-semibold rounded-lg hover:from-blue-500 hover:to-indigo-500 
          transition text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Add Permission</span>
        </a>

    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-3 sm:p-4 flex flex-col sm:flex-row gap-3 sm:gap-4">
        <div class="flex-1">
            <input id="searchBox" type="search" placeholder="Search permissions..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-sm">
        </div>
        <select class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-sm">
            <option>All Status</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider
                        ">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider
                        ">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider
                        ">Updated</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider
                        ">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200"></tbody>
            </table>
        </div>

        <!-- Pagination -->

    </div>
    <div class="flex items-center justify-between mt-4">
        <p class="text-sm text-gray-600 pagination-info"></p>
        <div class="flex items-center space-x-2 pagination-buttons"></div>
    </div>


    {{-- Inject token ke JS --}}
    <script>
        window.APP_JWT_TOKEN = "{{ session('jwt_token') }}";
    </script>

    {{-- Load file JS halaman --}}
    @vite(['resources/js/pages/permissions/get.js'])

    @endsection