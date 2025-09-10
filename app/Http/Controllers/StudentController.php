<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function __construct()
    // {
    //     // Semua route student harus login dulu
    //     $this->middleware('auth');
    // }

    // Menampilkan semua siswa
    public function index()
    {
        $students = Student::all(); // cukup ambil semua data siswa
        return view('homeroom.student.index', compact('students'));
    }

    // Form tambah siswa
    public function create()
    {
        $classes = ClassRoom::all();
        return view('homeroom.student.create', compact('classes'));
    }

    // Simpan siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_room_id' => 'required|exists:class_rooms,id'
        ]);

        Student::create([
            'name' => $request->name,
            'class_room_id' => $request->class_room_id
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    // Detail siswa
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Form edit siswa
    public function edit(Student $student)
    {
        $classes = ClassRoom::all();
        return view('homeroom.student.edit', compact('student', 'classes'));
    }

    // Update data siswa
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_room_id' => 'required|exists:class_rooms,id'
        ]);

        $student->update([
            'name' => $request->name,
            'class_room_id' => $request->class_room_id
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully');
    }

    // Hapus siswa
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                        ->with('success', 'Student deleted successfully');
    }
}
