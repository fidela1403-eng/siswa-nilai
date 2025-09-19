<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class GradeController extends Controller
{
    /**
     * Halaman daftar nilai untuk wali_kelas
     */
    public function index()
    {
        $grades = Grade::with(['student', 'subject'])->get();
        return view('admin.grades.index', compact('grades'));
    }

    /**
     * Form tambah nilai (wali_kelas)
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.grades.create', compact('students', 'subjects'));
    }

    /**
     * Simpan nilai baru (wali_kelas)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'tugas'      => 'nullable|numeric|min:0|max:100',
            'uts'        => 'nullable|numeric|min:0|max:100',
            'uas'        => 'nullable|numeric|min:0|max:100',
        ]);

        // Hitung nilai akhir otomatis
        $tugas = $validated['tugas'] ?? 0;
        $uts   = $validated['uts'] ?? 0;
        $uas   = $validated['uas'] ?? 0;
        $validated['nilai_akhir'] = round(($tugas + $uts + $uas) / 3, 2);

        Grade::create($validated);

        return redirect()->route('admin.grades.index')
                         ->with('success', '✅ Grade berhasil ditambahkan!');
    }

    /**
     * Form edit nilai (wali_kelas)
     */
    public function edit(Grade $grade)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('admin.grades.edit', compact('grade', 'students', 'subjects'));
    }

    /**
     * Update nilai (wali_kelas)
     */
    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'tugas'      => 'nullable|numeric|min:0|max:100',
            'uts'        => 'nullable|numeric|min:0|max:100',
            'uas'        => 'nullable|numeric|min:0|max:100',
        ]);

        $tugas = $validated['tugas'] ?? 0;
        $uts   = $validated['uts'] ?? 0;
        $uas   = $validated['uas'] ?? 0;
        $validated['nilai_akhir'] = round(($tugas + $uts + $uas) / 3, 2);

        $grade->update($validated);

        return redirect()->route('admin.grades.index')
                         ->with('success', '✏️ Grade berhasil diperbarui!');
    }

    /**
     * Hapus nilai (wali_kelas)
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grades.index')
                         ->with('success', '🗑️ Grade berhasil dihapus!');
    }

    /**
     * Halaman nilai khusus siswa login
     */
    public function studentGrades()
    {
        $user = Auth::user();
        $student = $user->student; // relasi: User hasOne(Student::class, 'id_user', 'id_user')

        if (!$student) {
            return redirect()->route('login')->with('error', 'Data siswa tidak ditemukan');
        }

        $grades = Grade::with('subject')
            ->where('student_id', $student->id)
            ->get();

        return view('students.grades', compact('grades', 'student'));
    }
}
