@extends('layouts.app')

@section('title', 'Data Wali Kelas')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600 mb-6">Daftar Wali Kelas</h1>

        <!-- Tombol tambah wali kelas -->
        <a href="{{ route('admin.homeroom.create') }}" 
           class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition mb-4">
            ➕ Tambah Wali Kelas
        </a>

        <!-- Alert sukses -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel daftar wali kelas -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($homerooms as $item)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>

                            <!-- Langsung ambil dari kolom 'nama' tabel homeroom_teachers -->
                            <td class="px-6 py-4 font-semibold">{{ $item->nama }}</td>

                            <!-- Nama kelas dari relasi classroom -->
                            <td class="px-6 py-4 font-semibold">{{ $item->classroom->class_name ?? '-' }}</td>

                            <td class="px-6 py-4 space-x-2 flex">
                                <!-- Edit -->
                                <a href="{{ route('admin.homeroom.edit', $item->id_homeroom) }}"
                                   class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 text-white transition">
                                    ✏️ Edit
                                </a>

                                <!-- Hapus -->
                              <form action="{{ route('admin.homeroom.destroy', $item->id_homeroom) }}"
      method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
        🗑️ Hapus
    </button>
</form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data wali kelas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
