<?php

namespace App\Http\Controllers;

use App\Models\CounselingRequest;
use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Http\Request;

class CounselingRequestController extends Controller
{
    public function index()
    {
        $requests = CounselingRequest::with(['student', 'schedule'])
            ->latest()
            ->get();

        return view('counseling_requests.index', compact('requests'));
    }

    public function create()
    {
        $schedules = Schedule::all();

        return view('counseling_requests.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'nullable|exists:schedules,id',
            'alasan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $student = Student::where('user_id', auth()->id())->first();

        if (!$student) {
            return back()->withInput()->withErrors([
                'student_id' => 'Data siswa untuk akun ini belum ditemukan.',
            ]);
        }

        CounselingRequest::create([
            'student_id' => $student->id,
            'schedule_id' => $request->schedule_id,
            'alasan' => $request->alasan,
            'status' => 'menunggu',
            'catatan' => $request->catatan,
        ]);

        return redirect('/dashboard/siswa')->with(
            'success',
            'Pengajuan konseling berhasil dikirim.'
        );
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak,selesai',
            'perkembangan_konseling' => 'nullable|string',
        ]);

        $pengajuan = CounselingRequest::findOrFail($id);

        $pengajuan->update([
            'status' => $validated['status'],
            'perkembangan_konseling' => $validated['perkembangan_konseling'] ?? null,
        ]);

        return redirect()
            ->route('counseling-requests.index')
            ->with('success', 'Status dan perkembangan konseling berhasil diperbarui.');
    }

    // ✅ TAMBAHAN BARU 1: tampilkan form logbook
    public function logbook(CounselingRequest $counselingRequest)
    {
        return view('logbook-form', compact('counselingRequest'));
    }

    // ✅ TAMBAHAN BARU 2: simpan logbook (terenkripsi via casts di model)
    public function simpanLogbook(Request $request, CounselingRequest $counselingRequest)
    {
        $validated = $request->validate([
            'ringkasan'     => 'required|string',
            'tindak_lanjut' => 'nullable|string',
            'pesan_untuk_siswa' => 'nullable|string|max:500',
        ]);

        $counselingRequest->update($validated);

        return redirect()->route('riwayat-konseling')
            ->with('success', 'Logbook berhasil disimpan.');
    }
}  