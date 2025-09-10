@php
use App\Models\Grade;

// Ambil ID siswa dari session
$studentId = session('student_id') ?? 0;

// Ambil semua nilai siswa beserta mata pelajaran
$grades = Grade::with('subject')
                ->where('student_id', $studentId)
                ->get();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-white min-h-screen text-gray-800">

<div class="container mx-auto py-10">
    <!-- Header Card -->
    <div class="bg-blue-50 p-6 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold flex items-center gap-2 text-blue-800">
                <i data-feather="user"></i> Welcome, {{ session('name') ?? 'Student' }}
            </h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-100 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-200 flex items-center gap-1">
                    <i data-feather="log-out"></i> Logout
                </button>
            </form>
        </div>
        <p class="mt-2 text-blue-700/80">You are logged in as <strong>Student</strong>.</p>
    </div>

    <!-- Nilai Card -->
    <div class="bg-blue-50 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-blue-700 mb-4 flex items-center gap-2">
            <i data-feather="book"></i> Nilai Kamu
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-center">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="px-4 py-2">Mata Pelajaran</th>
                        <th class="px-4 py-2">Tugas</th>
                        <th class="px-4 py-2">UTS</th>
                        <th class="px-4 py-2">UAS</th>
                        <th class="px-4 py-2">Nilai Akhir</th>
                        <th class="px-4 py-2">Grade</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-200">
                    @forelse ($grades as $grade)
                        @php
                            // Soft colors untuk grade
                            $gradeClass = match($grade->grade) {
                                'A' => 'bg-blue-500 text-white',
                                'B' => 'bg-blue-300 text-white',
                                'C' => 'bg-blue-100 text-blue-800',
                                'D' => 'bg-blue-50 text-blue-800',
                                'E' => 'bg-gray-200 text-gray-800',
                                default => 'bg-gray-100 text-gray-800'
                            };
                        @endphp
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-2">{{ $grade->subject->nama_mapel ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $grade->tugas ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $grade->uts ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $grade->uas ?? '-' }}</td>
                            <td class="px-4 py-2 font-semibold">{{ $grade->nilai_akhir ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <span class="px-3 py-1 rounded-full {{ $gradeClass }}">
                                    {{ $grade->grade ?? '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-gray-500">Belum ada nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    feather.replace()
</script>
</body>
</html>
