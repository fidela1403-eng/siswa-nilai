<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\HomeroomTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampilkan siswa sesuai kelas wali_kelas yang login
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'wali_kelas') {
            // cari kelas yang diampu wali_kelas
            $homeroom = HomeroomTeacher::where('id_user', $user->id_user)->first();

            if ($homeroom) {
                $students = Student::where('class_room_id', $homeroom->classroom_id)->get();
            } else {
                $students = collect(); // jika belum terdaftar wali_kelas
            }
        } else {
            // admin atau role lain bisa lihat semua
            $students = Student::all();
        }

        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        $classes = ClassRoom::all();
        return view('admin.student.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_room_id' => 'required|exists:class_rooms,id'
        ]);

        Student::create([
            'name'          => $request->name,
            'class_room_id' => $request->class_room_id,
            'id_user'       => Auth::id(),
        ]);

        return redirect()->route('admin.student.index')
                         ->with('success', 'Student added successfully');
    }

    public function show(Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = ClassRoom::all();
        return view('admin.student.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_room_id' => 'required|exists:class_rooms,id'
        ]);

        $student->update([
            'name'          => $request->name,
            'class_room_id' => $request->class_room_id,
        ]);

        return redirect()->route('admin.student.index')
                         ->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.student.index')
                         ->with('success', 'Student deleted successfully');
    }
}
