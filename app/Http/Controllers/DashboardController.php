<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function studentDashboard()
    {
        // Ambil ID siswa dari session (misal saat login)
        $studentId = session('student_id'); 

        // Ambil semua nilai siswa tersebut beserta data mata pelajaran
        $grades = Grade::with('subject')
                        ->where('student_id', $studentId)
                        ->get();

        return view('students.dashboard', compact('grades'));
    }
}
