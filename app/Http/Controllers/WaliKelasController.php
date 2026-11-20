<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use App\Models\Student;
use App\Models\GuruBk;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    // Menampilkan daftar data Wali Kelas
    public function index()
    {
        $waliKelas = WaliKelas::all();

        return view('wali_kelas.index', compact('waliKelas'));
    }

    // Menampilkan form tambah Wali Kelas
    public function create()
    {
        $guruBks = GuruBk::orderBy('nama')->get();

        return view('wali_kelas.create', compact('guruBks'));
    }

    // Menyimpan data Wali Kelas
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:wali_kelas,nip',
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
            'guru_bk_id' => 'required|exists:guru_bks,id',
        ]);

        WaliKelas::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'guru_bk_id' => $request->guru_bk_id,
        ]);

        return redirect('/wali-kelas')->with(
            'success',
            'Data Wali Kelas berhasil ditambahkan.'
        );
    }

    // Menampilkan siswa sesuai kelas Wali Kelas yang login
    public function dataSiswa()
    {
        $waliKelas = WaliKelas::where(
            'user_id',
            auth()->id()
        )->firstOrFail();

        $students = Student::where('kelas', $waliKelas->kelas)
            ->where('wali_kelas', $waliKelas->nama)
            ->orderBy('nama')
            ->get();

        return view('wali_kelas.data-siswa', compact(
            'waliKelas',
            'students'
        ));
    }

    // Menampilkan detail siswa
    public function detailSiswa(Student $student)
    {
        $waliKelas = WaliKelas::where(
            'user_id',
            auth()->id()
        )->firstOrFail();

        // Memastikan siswa termasuk kelas Wali Kelas yang login
        $student = Student::where('id', $student->id)
            ->where('kelas', $waliKelas->kelas)
            ->where('wali_kelas', $waliKelas->nama)
            ->firstOrFail();

        return view('wali_kelas.detail-siswa', compact(
            'waliKelas',
            'student'
        ));
    }
}
