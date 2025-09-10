@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-5 w-100" style="max-width: 500px; border-radius: 1rem;">
        <h3 class="mb-4 text-primary text-center">
            <i class="bi bi-person-plus-fill me-2"></i> Add New Student
        </h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('homeroom.student.store') }}" method="POST">
            @csrf

            <!-- Student Name -->
            <div class="mb-4">
                <label for="name" class="form-label">
                    <i class="bi bi-person-fill me-1"></i> Student Name
                </label>
                <input type="text" name="name" 
                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                       id="name" value="{{ old('name') }}" 
                       placeholder="Enter student name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Class Select -->
            <div class="mb-4">
                <label for="class_room_id" class="form-label">
                    <i class="bi bi-mortarboard-fill me-1"></i> Class
                </label>
                <select name="class_room_id" id="class_room_id" 
                        class="form-select form-select-lg @error('class_room_id') is-invalid @enderror" required>
                    <option value="">-- Select Class --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ old('class_room_id') == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}
                        </option>
                    @endforeach
                </select>
                @error('class_room_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-2 justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                    <i class="bi bi-plus-lg me-1"></i> Add Student
                </button>
                <a href="{{ route('homeroom.student.index') }}" class="btn btn-secondary btn-lg flex-grow-1">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
