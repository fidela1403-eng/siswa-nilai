@extends('layouts.app')

@section('title', 'Tambah Wali Kelas')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">➕ Tambah Wali Kelas</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.homeroom.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama Wali Kelas --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Wali Kelas</label>
                <input type="text" name="nama" id="nama"
                       value="{{ old('nama') }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('nama') border-red-500 @enderror"
                       placeholder="Masukkan nama wali kelas" required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pilih User --}}
            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-700 mb-1">User (ID)</label>
                <select name="id_user" id="id_user" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id_user }}" {{ old('id_user') == $user->id_user ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_user')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pilih Kelas --}}
            <div>
                <label for="classroom_id" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                <select name="classroom_id" id="classroom_id" class="w-full px-3 py-2 border rounded-lg" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                            {{ $classroom->class_name }}
                        </option>
                    @endforeach
                </select>
                @error('classroom_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.homeroom.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">⬅ Kembali</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
