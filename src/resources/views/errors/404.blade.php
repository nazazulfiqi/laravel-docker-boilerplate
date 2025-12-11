<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - 404</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-linear-to-br from-white via-blue-50/30 to-white flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-2xl">
        <div class="text-center">
            <!-- Animated 404 Illustration -->
            <div class="mb-8 relative">
                <div class="inline-block">
                    <!-- Big 404 Text with linear -->
                    <div class="relative">
                        <h1 class="text-9xl sm:text-[150px] font-black text-transparent bg-clip-text bg-linear-to-r from-blue-600 to-indigo-600 leading-none select-none">
                            404
                        </h1>
                        <!-- Decorative elements -->
                        <div class="absolute -top-8 -right-8 w-20 h-20 bg-blue-200 rounded-full opacity-20 blur-2xl"></div>
                        <div class="absolute -bottom-8 -left-8 w-16 h-16 bg-indigo-200 rounded-full opacity-20 blur-2xl"></div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-4 mb-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900">
                    Page not found
                </h2>
                <p class="text-lg text-slate-600 max-w-lg mx-auto">
                    Sorry, we couldn't find the page you're looking for. It might have been moved or deleted.
                </p>
            </div>



            <!-- Suggested Pages -->
            <div class="mb-8">
                <p class="text-sm text-slate-500 mb-4">Here's where you might want to go:</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <a href="{{ route('login') }}" class="group p-4 bg-white border border-slate-200 hover:border-blue-300 rounded-lg transition hover:shadow-md">
                        <svg class="w-6 h-6 text-blue-600 mx-auto mb-2 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-900">Home</span>
                        <p class="text-xs text-slate-500 mt-1">Back to home page</p>
                    </a>

                    <a href="{{ route('dashboard') }}" class="group p-4 bg-white border border-slate-200 hover:border-blue-300 rounded-lg transition hover:shadow-md">
                        <svg class="w-6 h-6 text-blue-600 mx-auto mb-2 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-900">Dashboard</span>
                        <p class="text-xs text-slate-500 mt-1">View your dashboard</p>
                    </a>

                    <a href="{{ route('users') }}" class="group p-4 bg-white border border-slate-200 hover:border-blue-300 rounded-lg transition hover:shadow-md">
                        <svg class="w-6 h-6 text-blue-600 mx-auto mb-2 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M12 4.354L9.172 9.354M15 19H9a6 6 0 016-6h.01"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-900">Users</span>
                        <p class="text-xs text-slate-500 mt-1">Manage users</p>
                    </a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button onclick="window.history.back()" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-900 font-semibold rounded-lg transition cursor-pointer hover:shadow-md">
                    Go Back
                </button>
                <a href="/" class="px-6 py-3 bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold rounded-lg transition transform hover:scale-105 shadow-lg hover:shadow-blue-500/30">
                    Back to Home
                </a>
            </div>

            <!-- Footer Info -->
            <div class="mt-12 pt-8 border-t border-slate-200">
                <p class="text-sm text-slate-500">
                    Need help? <a href="/contact" class="text-blue-600 hover:text-blue-700 font-medium">Contact support</a> or check our <a href="/help" class="text-blue-600 hover:text-blue-700 font-medium">help center</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Optional: Add some simple interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll top on page load
            window.scrollTo(0, 0);
        });
    </script>
</body>

</html>