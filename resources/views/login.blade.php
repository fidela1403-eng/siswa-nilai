<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Heroicons CDN -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-indigo-600 text-center mb-6">Login Sistem Nilai</h2>

    <!-- Pesan error -->
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </span>
            <input type="email" name="email" placeholder="Email" required
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <!-- Password -->
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2 1.105 2 2 2 2-.895 2-2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v10m6-10v10M6 11v10" />
                </svg>
            </span>
            <input type="password" name="password" placeholder="Password" required
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-all font-semibold">
            Login
        </button>
    </form>

    <p class="text-center text-gray-500 mt-4 text-sm">Belum punya akun? <a href="#" class="text-indigo-600 hover:underline">Daftar</a></p>
</div>

<script>
    feather.replace()
</script>
</body>
</html>
