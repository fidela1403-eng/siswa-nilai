<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cek user di database
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // simpan session
            session([
                'user_id' => $user->id,
                'role' => $user->role,
                'name' => $user->name
            ]);

            // redirect berdasarkan role
            if ($user->role === 'wali_kelas') {
                return redirect()->route('homeroom.dashboard');
            } elseif ($user->role === 'siswa') {
                return redirect()->route('student.dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Role tidak dikenali');
            }
        }

        // kalau gagal login
        return back()->with('error', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        // hapus semua session
        $request->session()->flush();

        // redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }
}
