    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Dashboard' }} - DAM</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {!! ToastMagic::styles() !!}
    </head>

    <body class="bg-gray-50">
        <!-- Added sidebar toggle state management -->
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-50">

            <!-- Mobile sidebar overlay -->
            <div
                x-show="sidebarOpen"
                @click="sidebarOpen = false"
                class="fixed inset-0 bg-black/50 z-30 md:hidden"
                x-transition></div>

            <!-- Sidebar -->
            <aside
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
                class="fixed md:static left-0 top-0 h-screen w-64 bg-white border-r border-gray-200 flex flex-col z-40 transform transition-transform duration-300 ease-in-out">
                <!-- Logo -->
                <div class="px-6 py-6 border-b border-gray-200">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-linear-to-br from-blue-600 to-indigo-600 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-gray-900">DAM</h1>
                            <p class="text-xs text-gray-500">Platform</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
                    <!-- Main Menu -->
                    <div class="mb-6">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Menu</p>

                        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4h4"></path>
                            </svg>
                            <span class="text-sm font-medium">Dashboard</span>
                        </a>

                        <a href="#" class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                            <span class="text-sm font-medium">Products</span>
                        </a>

                        <a href="#" class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span class="text-sm font-medium">Analytics</span>
                        </a>
                    </div>

                    <!-- Master Data -->
                    <div class="mb-6">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Master Data</p>

                        <a href="{{ route('permissions') }}"
                            class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('permissions') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }} transition">

                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 7a3 3 0 11-6 0 3 3 0 016 0zm-6 3l-6 6 1.5 1.5 1.5-1.5 1.5 1.5L9 17.5l-1.5-1.5L9 14l-1.5-1.5z" />
                            </svg>

                            <span class="text-sm font-medium">Permissions</span>
                        </a>




                        <a href="{{ route('roles') }}"
                            class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('roles') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }} transition">

                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3l7 4v5c0 5.25-3.5 9.75-7 10-3.5-.25-7-4.75-7-10V7l7-4z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4" />
                            </svg>

                            <span class="text-sm font-medium">Roles</span>
                        </a>



                        <a href="{{ route('users') }}"
                            class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('users') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }} transition">

                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="1.8" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M23 20v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                            </svg>

                            <span class="text-sm font-medium">Users</span>
                        </a>




                    </div>

                    <!-- Settings -->
                    <div>
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">System</p>

                        <a href="#" class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Settings</span>
                        </a>
                    </div>
                </nav>

                <!-- User Profile Card -->
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center space-x-3 mb-3">

                        <div class="w-10 h-10 rounded-lg bg-linear-to-br from-blue-400 to-indigo-600 flex items-center justify-center shrink-0">
                            <span class="text-white font-bold text-sm">
                                {{ strtoupper(substr(session('auth_user.name', 'U'), 0, 1)) }}
                            </span>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ session('auth_user.name', 'User') }}
                            </p>
                            <p class="text-xs text-gray-500 truncate">
                                {{ session('auth_user.email', 'user@example.com') }}
                            </p>
                        </div>

                    </div>

                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="w-full px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition cursor-pointer">
                            Sign out
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col min-w-0">
                <!-- Added mobile hamburger menu -->
                <!-- Top Navbar -->
                <nav class="bg-white border-b border-gray-200 px-4 sm:px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Hamburger Menu for Mobile -->
                            <button
                                @click="sidebarOpen = !sidebarOpen"
                                class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>

                            <div>
                                <h2 class="text-lg sm:text-xl font-semibold text-gray-900">{{ $title ?? 'Dashboard' }}</h2>
                                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">{{ $subtitle ?? '' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2 sm:space-x-4">
                            <!-- Search - Hidden on mobile -->
                            <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="search" placeholder="Search..." class="bg-transparent ml-2 w-48 outline-none text-sm text-gray-700 placeholder-gray-500">
                            </div>

                            <!-- Notifications -->
                            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition relative">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>

                            <!-- User Menu -->
                            <div class="relative">
                                <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 transition">
                                    <div class="w-8 h-8 rounded-lg bg-linear-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                                        <span class="text-white font-bold text-sm">{{ strtoupper(substr(session('auth_user.name', 'U'), 0, 1)) }}</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto">
                    <div class="p-4 sm:p-6">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <!-- Alpine.js for interactivity -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        {!! ToastMagic::scripts() !!}
    </body>

    </html>