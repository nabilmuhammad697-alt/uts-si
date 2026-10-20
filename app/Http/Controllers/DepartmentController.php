<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diubah.');
    }

    public function destroy(Department $department)
    {
        // Validasi aturan: menolak hapus jika departemen masih memiliki pegawai
        if ($department->employees()->count() > 0) {
            return redirect()->route('departments.index')->with('error', 'Departemen tidak dapat dihapus karena masih memiliki pegawai.');
        }

        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
