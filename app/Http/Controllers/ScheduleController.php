<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $query = Schedule::with('student')->latest();

        if (auth()->user()->role === 'siswa') {
            $student = Student::where(
                'user_id',
                auth()->id()
            )->first();

            if (!$student) {
                $schedules = collect();
            } else {
                $schedules = $query
                    ->where(function ($q) use ($student) {
                        $q->whereNull('student_id')
                          ->orWhere('student_id', $student->id);
                    })
                    ->get();
            }
        } else {
            $schedules = $query->get();
        }

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $students = Student::all();

        return view('schedules.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keterangan' => 'nullable|string',
        ]);

        Schedule::create([
            'student_id' => $request->student_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
            'status' => 'tersedia',
        ]);

        return redirect()
            ->route('schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }
}
