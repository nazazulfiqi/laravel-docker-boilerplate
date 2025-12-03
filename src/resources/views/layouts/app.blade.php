<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center">
    <main class="w-full max-w-md px-6 py-8 bg-white shadow-xl rounded-2xl border border-gray-200">
        @yield('content')
    </main>
</body>

</html>