<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('admin.subjects.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        Subject::create($request->all());

        return redirect()->route('admin.subjects.index')->with('success', 'Subject added successfully.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    // Hapus data
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
