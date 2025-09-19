@extends('layouts.app')

@section('title', 'Student')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600 mb-6">Student</h1>

        <!-- Button tambah siswa -->
        <a href="{{ route('admin.student.create') }}" 
           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition mb-4">
            ➕ Add Student
        </a>

        <!-- Tabel data siswa -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($students as $student)
                    <tr>
                        <td class="px-6 py-4">{{ $student->id }}</td>
                        <td class="px-6 py-4">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $student->classRoom->class_name ?? '-' }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.student.edit', $student->id) }}" 
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 text-white transition">✏️ Edit</a>
                            
                            <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 px-3 py-1 rounded-lg hover:bg-red-600 text-white transition"
                                        onclick="return confirm('Are you sure?')">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No students found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
