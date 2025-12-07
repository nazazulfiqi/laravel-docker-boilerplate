<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'DAM Platform' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {!! ToastMagic::styles() !!}
</head>

<body class="min-h-screen bg-linear-to-br from-gray-50 via-white to-gray-50 flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        <!-- updated to clean light background with subtle border -->
        <div class="relative group">
            <!-- Subtle shadow effect -->
            <div class="absolute -inset-0.5 bg-linear-to-r from-blue-100 to-indigo-100 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>

            <main class="relative bg-white border border-gray-200 rounded-2xl px-6 py-8 sm:px-8 sm:py-10 shadow-sm hover:shadow-md transition duration-300">
                @yield('content')
            </main>
        </div>

        <!-- updated footer text styling for light theme -->
        <div class="text-center mt-6 text-gray-500 text-xs">
            <p>© 2025 DAM Platform. All rights reserved.</p>
        </div>
    </div>
    {!! ToastMagic::scripts() !!}
</body>

</html>