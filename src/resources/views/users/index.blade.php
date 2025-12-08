@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <!-- Made header responsive with flex-col on mobile -->
    <!-- Header with Create Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Users Management</h1>
            <p class="text-gray-600 mt-1 text-sm">Manage and organize all users in your system</p>
        </div>
        {{-- <a href="{{ route('users.create') }}" class="px-4 py-2 bg-linear-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-500 hover:to-indigo-500 transition text-center sm:text-left">
        + Add User
        </a> --}}
    </div>

    <!-- Improved filter layout for mobile -->
    <!-- Filters -->
    <div class="bg-white rounded-xl border border-gray-200 p-3 sm:p-4 flex flex-col sm:flex-row gap-3 sm:gap-4">
        <div class="flex-1">
            <input type="search" placeholder="Search users..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-sm">
        </div>
        <select class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-sm">
            <option>All Status</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
    </div>

    <!-- Added responsive table with card view on mobile -->
    <!-- Users Table - Card view on mobile, table on desktop -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <!-- Mobile Card View -->
        <div class="md:hidden divide-y divide-gray-200">
            <div class="p-4 hover:bg-gray-50 transition">
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-lg bg-linear-to-br from-blue-400 to-indigo-600 flex items-center justify-center shrink-0">
                            <span class="text-white font-bold text-sm">JD</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                            <p class="text-xs text-gray-500">john@example.com</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                </div>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <p class="text-xs text-gray-500">Role</p>
                        <p class="text-sm font-medium text-gray-900">Admin</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Joined</p>
                        <p class="text-sm font-medium text-gray-900">Jan 15, 2025</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 pt-3 border-t border-gray-200">
                    {{-- <a href="{{ route('users.edit', 1) }}" class="flex-1 px-3 py-2 hover:bg-blue-50 text-blue-600 rounded-lg transition text-sm font-medium text-center">
                    Edit
                    </a> --}}
                    <button class="flex-1 px-3 py-2 hover:bg-red-50 text-red-600 rounded-lg transition text-sm font-medium text-center">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-lg bg-linear-to-br from-blue-400 to-indigo-600 flex items-center justify-center shrink-0">
                                    <span class="text-white font-bold text-xs"> {{ strtoupper(substr($user['name'], 0, 2)) }}</span>
                                </div>
                                <p class="text-sm font-medium text-gray-900">{{ $user['name'] }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ count($user['roles']) ? implode(', ', $user['roles']) : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ count($user['permissions']) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} "> {{ count($user['permissions']) ? 'Active' : 'Inactive' }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"> {{ \Carbon\Carbon::parse($user['created_at'])->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                {{-- <a href="{{ route('users.edit', 1) }}" class="p-2 hover:bg-blue-50 text-blue-600 rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                </a> --}}
                                <button class="p-2 hover:bg-red-50 text-red-600 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Made pagination responsive -->
    <!-- Pagination -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <p class="text-sm text-gray-600">Showing 1 to 10 of 45 results</p>
        <div class="flex items-center space-x-1 sm:space-x-2 flex-wrap">
            <button class="px-2 sm:px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition text-sm">Previous</button>
            <button class="px-2 sm:px-3 py-2 bg-blue-600 text-white rounded-lg text-sm">1</button>
            <button class="px-2 sm:px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition text-sm">2</button>
            <button class="px-2 sm:px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition text-sm">Next</button>
        </div>
    </div>
</div>
@endsection