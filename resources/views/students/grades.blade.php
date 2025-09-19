<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- ✅ Header -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h1 class="text-xl font-bold">Sistem Nilai</h1>
            <nav class="flex items-center space-x-6">
                <span class="text-sm">Halo, {{ $student->name }}</span>
                <!-- Form Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- ✅ Main Content -->
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-4xl">
            <!-- Header konten -->
            <div class="flex items-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-8 w-8 text-blue-600 mr-3"
                     viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2L0 6l10 4 10-4-10-4zM0 8v6a2 2 0 002 2h4v-4H4v-2l6 2 6-2v2h-2v4h4a2 2 0 002-2V8l-10 4L0 8z" />
                </svg>
                <h1 class="text-2xl font-bold text-blue-700">
                    Nilai Saya ({{ $student->name }})
                </h1>
            </div>

            <!-- Tabel Nilai -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="py-3 px-4 text-left">Nama Mapel</th>
                            <th class="py-3 px-4 text-center">Tugas</th>
                            <th class="py-3 px-4 text-center">UTS</th>
                            <th class="py-3 px-4 text-center">UAS</th>
                            <th class="py-3 px-4 text-center">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($grades as $grade)
                            <tr class="border-b hover:bg-blue-50">
                                <td class="py-3 px-4 font-medium text-gray-700">
                                    {{ $grade->subject->subject_name }}
                                </td>
                                <td class="py-3 px-4 text-center text-gray-600">{{ $grade->tugas }}</td>
                                <td class="py-3 px-4 text-center text-gray-600">{{ $grade->uts }}</td>
                                <td class="py-3 px-4 text-center text-gray-600">{{ $grade->uas }}</td>
                                <td class="py-3 px-4 text-center font-semibold text-blue-700">
                                    {{ $grade->nilai_akhir }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">
                                    Belum ada nilai
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
