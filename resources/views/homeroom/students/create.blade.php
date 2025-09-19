@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">
            ➕ Tambah Siswa
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.student.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Siswa -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Siswa
                </label>
                <input type="text" name="name" id="name"
                       value="{{ old('name') }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                       placeholder="Masukkan nama siswa" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pilih Kelas -->
            <div>
                <label for="class_room_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Kelas
                </label>
                <select name="class_room_id" id="class_room_id"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('class_room_id') border-red-500 @enderror"
                        required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ old('class_room_id') == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}
                        </option>
                    @endforeach
                </select>
                @error('class_room_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.student.index') }}"
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
