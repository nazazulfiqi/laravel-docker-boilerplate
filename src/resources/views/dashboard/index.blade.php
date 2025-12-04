@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm font-medium text-gray-600">Total Users</p>
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-1">1,234</h3>
            <p class="text-xs text-green-600">+12% from last month</p>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm font-medium text-gray-600">Active Projects</p>
                <div class="p-2 bg-indigo-100 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-1">42</h3>
            <p class="text-xs text-green-600">All running smoothly</p>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-1">$12,345</h3>
            <p class="text-xs text-green-600">+8% from last month</p>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm font-medium text-gray-600">Pending Tasks</p>
                <div class="p-2 bg-orange-100 rounded-lg">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-1">23</h3>
            <p class="text-xs text-orange-600">Need attention</p>
        </div>
    </div>

    <!-- Recent Activity & Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Chart -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Trend</h3>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center text-gray-500">
                Chart will be displayed here
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full bg-blue-600 mt-1.5"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">New user joined</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full bg-green-600 mt-1.5"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Project completed</p>
                        <p class="text-xs text-gray-500">5 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full bg-orange-600 mt-1.5"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Payment received</p>
                        <p class="text-xs text-gray-500">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection