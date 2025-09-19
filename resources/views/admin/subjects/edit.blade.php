@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">Edit Mata Pelajaran</h1>

        <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Ini penting agar Laravel tahu ini update -->

            <div>
                <label for="subject_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Mata Pelajaran
                </label>
                <input type="text" name="subject_name" id="subject_name"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('subject_name', $subject->subject_name) }}" <!-- Ambil value lama -->
                       
            </div>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('admin.subjects.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    ⬅ Kembali
                </a>
                <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                    💾 Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
