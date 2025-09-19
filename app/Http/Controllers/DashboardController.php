<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;

class DashboardController extends Controller
{
    // Halaman dashboard wali kelas
    public function dashboard()
    {
        $students = Student::all();
        $grades = Grade::with('student')->get(); // ambil data nilai
        return view('homeroom.dashboard', compact('students', 'grades'));
    }

    // Simpan nilai siswa
    public function storeGrade(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject'    => 'required|string',
            'tugas'      => 'required|numeric|min:0|max:100',
            'uts'        => 'required|numeric|min:0|max:100',
            'uas'        => 'required|numeric|min:0|max:100',
        ]);

        $nilai_akhir = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);

        Grade::create([
            'student_id'  => $request->student_id,
            'subject'     => $request->subject,
            'tugas'       => $request->tugas,
            'uts'         => $request->uts,
            'uas'         => $request->uas,
            'nilai_akhir' => $nilai_akhir,
        ]);

        return back()->with('success', 'Nilai berhasil disimpan!');
    }
}
