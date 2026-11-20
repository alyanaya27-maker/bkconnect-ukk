<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $students = Student::all();

    return view('students.index', compact('students'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('students.create');
}
    /**
     * Store a newly created resource in storage.
     */
    
public function store(Request $request)
{
    $request->validate([
        'nis' => 'required|unique:students,nis',
        'nama' => 'required',
        'kelas' => 'required',
        'jurusan' => 'nullable',
        'jenis_kelamin' => 'nullable',
        'alamat' => 'nullable',
        'no_hp' => 'nullable',
        'wali_kelas' => 'nullable',
    ], [
        'nis.required' => 'NIS wajib diisi.',
        'nis.unique' => 'NIS sudah terdaftar. Gunakan NIS yang berbeda.',
        'nama.required' => 'Nama siswa wajib diisi.',
        'kelas.required' => 'Kelas wajib diisi.',
    ]);

    Student::create([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'wali_kelas' => $request->wali_kelas,
    ]);

    return redirect('/students')->with(
        'success',
        'Data siswa berhasil ditambahkan.'
    );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
{
    return view('students.edit', compact('student'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
{
    $request->validate([
    'nis' => ['required', Rule::unique('students', 'nis')->ignore($student->id)],
    'nama' => 'required',
    'kelas' => 'required',
], [
    'nis.required' => 'NIS wajib diisi.',
    'nis.unique' => 'NIS sudah terdaftar. Gunakan NIS yang berbeda.',
]);

    $student->update([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'wali_kelas' => $request->wali_kelas,
    ]);

    return redirect('/students')->with(
        'success',
        'Data siswa berhasil diperbarui.'
    );
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')->with(
        'success',
        'Data siswa berhasil dihapus.'
    );
}
}
