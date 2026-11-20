<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentDevelopmentReport;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class StudentDevelopmentReportController extends Controller
{
    public function waliIndex()
    {
        $waliKelas = WaliKelas::where('user_id', auth()->id())
            ->with('guruBk')
            ->firstOrFail();

        $students = Student::where('kelas', $waliKelas->kelas)
            ->where('wali_kelas', $waliKelas->nama)
            ->orderBy('nama')
            ->get();

        $reports = $waliKelas->developmentReports()
            ->with('student')
            ->latest()
            ->get();

        return view('wali_kelas.perkembangan', compact('waliKelas', 'students', 'reports'));
    }

    public function store(Request $request)
    {
        $waliKelas = WaliKelas::where('user_id', auth()->id())
            ->with('guruBk')
            ->firstOrFail();

        abort_unless($waliKelas->guru_bk_id && $waliKelas->guruBk, 422, 'Wali kelas belum terhubung dengan Guru BK.');

        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'perkembangan' => 'required|string|max:5000',
            'catatan' => 'nullable|string|max:5000',
        ]);

        $studentBelongsToWali = Student::whereKey($validated['student_id'])
            ->where('kelas', $waliKelas->kelas)
            ->where('wali_kelas', $waliKelas->nama)
            ->exists();

        abort_unless($studentBelongsToWali, 403);

        StudentDevelopmentReport::create([
            ...$validated,
            'wali_kelas_id' => $waliKelas->id,
            'guru_bk_id' => $waliKelas->guru_bk_id,
        ]);

        return back()->with('success', 'Perkembangan siswa berhasil dikirim ke Guru BK.');
    }

    public function guruIndex()
    {
        $guruBk = \App\Models\GuruBk::where('user_id', auth()->id())->firstOrFail();

        $reports = StudentDevelopmentReport::where('guru_bk_id', $guruBk->id)
            ->with(['student', 'waliKelas'])
            ->latest()
            ->get();

        $reports->where('status', 'baru')->each->update(['status' => 'dibaca']);

        return view('guru_bk.perkembangan-wali', compact('guruBk', 'reports'));
    }
}
