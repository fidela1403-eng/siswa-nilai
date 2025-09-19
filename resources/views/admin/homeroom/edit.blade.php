@extends('layouts.app')

@section('title', 'Edit Wali Kelas')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">
            ✏️ Edit Wali Kelas
        </h1>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- === FORM EDIT === --}}
        <form action="{{ route('admin.homeroom.update', $homeroomTeacher->id_homeroom) }}"
              method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Kolom Nama --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Wali Kelas
                </label>
                <input type="text" name="nama" id="nama"
                       value="{{ old('nama', $homeroomTeacher->nama) }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       required>
            </div>

            {{-- Pilih User --}}
            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama User
                </label>
                <select name="id_user" id="id_user"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id_user }}"
                            {{ $homeroomTeacher->id_user == $user->id_user ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Kelas --}}
            <div>
                <label for="classroom_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Kelas
                </label>
                <select name="classroom_id" id="classroom_id"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}"
                            {{ $homeroomTeacher->classroom_id == $classroom->id ? 'selected' : '' }}>
                            {{ $classroom->class_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.homeroom.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    ⬅ Kembali
                </a>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
