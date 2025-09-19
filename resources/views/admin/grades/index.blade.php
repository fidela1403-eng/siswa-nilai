@extends('layouts.app')

@section('title', 'Grades')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600 mb-6">Grades</h1>

        <!-- Button tambah nilai -->
        <a href="{{ route('admin.grades.create') }}" 
           class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition mb-4">
            ➕ Add Grade
        </a>

        <!-- Alert sukses -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel daftar nilai -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tugas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">UTS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">UAS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai Akhir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($grades as $grade)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $grade->student->name }}</td>
                        <td class="px-6 py-4">{{ $grade->subject->subject_name }}</td>
                        <td class="px-6 py-4">{{ $grade->tugas }}</td>
                        <td class="px-6 py-4">{{ $grade->uts }}</td>
                        <td class="px-6 py-4">{{ $grade->uas }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg font-semibold">
                                {{ $grade->nilai_akhir }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.grades.edit', $grade->id) }}" 
                                   class="inline-flex items-center bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 text-white transition">
                                    ✏️ Edit
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('admin.grades.destroy', $grade->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center bg-red-500 px-3 py-1 rounded-lg hover:bg-red-600 text-white transition">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No grades found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
