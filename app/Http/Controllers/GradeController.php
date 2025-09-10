<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Tampilkan daftar nilai
     */
    public function index()
    {
        $grades = Grade::with(['student', 'subject'])->get();
        return view('homeroom.grades.index', compact('grades'));
    }

    /**
     * Form tambah nilai
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('homeroom.grades.create', compact('students', 'subjects'));
    }

    /**
     * Simpan nilai baru
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

        return redirect()->route('homeroom.grades.index')
                         ->with('success', '✅ Grade berhasil ditambahkan!');
    }

    /**
     * Form edit nilai
     */
    public function edit(Grade $grade)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('homeroom.grades.edit', compact('grade', 'students', 'subjects'));
    }

    /**
     * Update nilai
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

        // Hitung nilai akhir otomatis
        $tugas = $validated['tugas'] ?? 0;
        $uts   = $validated['uts'] ?? 0;
        $uas   = $validated['uas'] ?? 0;
        $validated['nilai_akhir'] = round(($tugas + $uts + $uas) / 3, 2);

        $grade->update($validated);

        return redirect()->route('homeroom.grades.index')
                         ->with('success', '✏️ Grade berhasil diperbarui!');
    }

    /**
     * Hapus nilai
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('homeroom.grades.index')
                         ->with('success', '🗑️ Grade berhasil dihapus!');
    }
}
