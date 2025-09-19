<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Try login using Auth
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'wali_kelas') {
                return redirect()->route('homeroom.dashboard');
            } elseif ($user->role === 'siswa') {
                return redirect()->route('student.grades');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Role not recognized.');
            }
        }

        // If login failed
        return back()->with('error', 'Email or Password is incorrect');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // remove user session

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out!');
    }
}
