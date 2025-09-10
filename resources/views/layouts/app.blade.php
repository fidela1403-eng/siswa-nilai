<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Nilai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- ✅ Header -->
    @include('partials.header')

    <!-- ✅ Main Content -->
    <main class="flex-grow container mx-auto px-6 py-6">
        @yield('content')
    </main>

    <!-- ✅ Footer -->
    @include('partials.footer')

</body>
</html>
