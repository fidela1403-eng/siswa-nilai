@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-indigo-600 mb-4">
            👨‍🎓 Daftar Siswa Kelas {{ $classRoom->name ?? '-' }}
        </h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah siswa hanya untuk wali kelas yang login --}}
        <div class="mb-4 text-right">
            <a href="{{ route('admin.student.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                ➕ Tambah Siswa
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">No</th>
                        <th class="py-2 px-4 border">Nama Siswa</th>
                        <th class="py-2 px-4 border">Kelas</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $index => $student)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $student->name }}</td>
                            <td class="py-2 px-4 border">{{ $student->classRoom->name }}</td>
                            <td class="py-2 px-4 border text-center space-x-2">
                                <a href="{{ route('admin.student.edit', $student->id) }}"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                                   ✏️ Edit
                                </a>
                                <form action="{{ route('admin.student.destroy', $student->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Hapus siswa ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                            🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Tidak ada siswa di kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
