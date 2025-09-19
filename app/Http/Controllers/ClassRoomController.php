<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = ClassRoom::all();
        return view('admin.classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        ClassRoom::create([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('admin.classrooms.index')
                         ->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classroom)
    {
        return view('admin.classrooms.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classroom)
    {
        return view('admin.classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classroom)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        $classroom->update([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('admin.classrooms.index')
                         ->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classroom)
    {
        $classroom->delete();

        return redirect()->route('admin.classrooms.index')
                         ->with('success', 'Kelas berhasil dihapus.');
    }
}
