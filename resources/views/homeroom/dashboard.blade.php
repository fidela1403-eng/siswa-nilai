@extends('layouts.app')

@section('title', 'Dashboard Homeroom Teacher')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-indigo-600 mb-4">
            Welcome, {{ session('name') }} 👋
        </h1>
        <p class="text-gray-700 mb-6">
            You are logged in as <span class="font-semibold">Homeroom Teacher</span>.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('homeroom.student.index') }}" 
               class="p-6 bg-indigo-100 hover:bg-indigo-200 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold text-indigo-700">👨‍🎓 Manage Students</h2>
                <p class="text-gray-600 mt-2">Add, edit, and view your classroom students</p>
            </a>

            <a href="{{ route('homeroom.grades.index') }}" 
               class="p-6 bg-green-100 hover:bg-green-200 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold text-green-700">📊 Manage Grades</h2>
                <p class="text-gray-600 mt-2">Input and update student grades</p>
            </a>

            <a href="{{ route('homeroom.subjects.index') }}" 
               class="p-6 bg-pink-100 hover:bg-pink-200 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold text-pink-700">📘 Manage Subjects</h2>
                <p class="text-gray-600 mt-2">Add, edit, and view subjects</p>
            </a>

            <a href="#" 
               class="p-6 bg-yellow-100 hover:bg-yellow-200 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold text-yellow-700">📑 Reports</h2>
                <p class="text-gray-600 mt-2">View class performance reports</p>
            </a>
        </div>
    </div>
</div>
@endsection
