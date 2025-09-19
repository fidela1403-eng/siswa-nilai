<?php

namespace App\Http\Controllers;

use App\Models\HomeroomTeacher;
use App\Models\User;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class HomeroomTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $homerooms = HomeroomTeacher::with(['user', 'classroom'])->get();
        return view('admin.homeroom.index', compact('homerooms'));
    }

    public function create()
    {
        $users = User::where('role', 'wali_kelas')->get();
        $classrooms = ClassRoom::all();
        return view('admin.homeroom.create', compact('users', 'classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'classroom_id' => 'required|exists:class_rooms,id',
            'id_user'      => 'required|exists:users,id_user',
        ]);

        HomeroomTeacher::create($request->only('nama','classroom_id','id_user'));

        return redirect()->route('admin.homeroom.index')
                         ->with('success', '✅ Data wali kelas berhasil ditambahkan.');
    }
/** Form Edit */
    public function edit($id_homeroom)
    {
        $homeroomTeacher = HomeroomTeacher::findOrFail($id_homeroom);
        $users      = User::where('role', 'wali_kelas')->get();
        $classrooms = ClassRoom::all();

        return view('admin.homeroom.edit', compact('homeroomTeacher', 'users', 'classrooms'));
    }

    /** Update Data */
    public function update(Request $request, $id_homeroom)
    {
        // validasi sesuai name di form
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'id_user'      => 'required|exists:users,id_user',
            'classroom_id' => 'required|exists:class_rooms,id',
        ]);

        $homeroomTeacher = HomeroomTeacher::findOrFail($id_homeroom);
        $homeroomTeacher->update($validated);

        return redirect()
            ->route('admin.homeroom.index')
            ->with('success', '✅ Data wali kelas berhasil diperbarui.');
    }

    public function destroy($id)
{
    $homeroomTeacher = HomeroomTeacher::findOrFail($id);
    $homeroomTeacher->delete();

    return redirect()
        ->route('admin.homeroom.index')
        ->with('success', '🗑️ Data wali kelas berhasil dihapus.');
}


}
