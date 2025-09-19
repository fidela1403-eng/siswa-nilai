@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600 mb-6">Daftar Kelas</h1>

        <!-- Button tambah kelas -->
        <a href="{{ route('admin.classrooms.create') }}" 
           class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition mb-4">
            ➕ Tambah Kelas
        </a>

        <!-- Alert sukses -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel daftar kelas -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($classrooms as $classroom)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $classroom->class_name }}</td>
                        <td class="px-6 py-4 space-x-2 flex">
                            <!-- Edit -->
                            <a href="{{ route('admin.classrooms.edit', $classroom->id) }}" 
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 text-white transition">
                                ✏️ Edit
                            </a>
                            
                            <!-- Delete -->
                            <form action="{{ route('admin.classrooms.destroy', $classroom->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 px-3 py-1 rounded-lg hover:bg-red-600 text-white transition"
                                        onclick="return confirm('Apakah kamu yakin ingin menghapus kelas ini?')">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada kelas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
