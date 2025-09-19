@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">
            ➕ Tambah Kelas
        </h1>

        <form action="{{ route('admin.classrooms.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Kelas -->
            <div>
                <label for="class_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kelas
                </label>
                <input type="text" name="class_name" id="class_name"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Misal: X RPL 1" required>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.classrooms.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    ⬅ Kembali
                </a>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
