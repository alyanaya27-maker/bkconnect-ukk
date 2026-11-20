<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\GuruBk;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $student = null;
        $guruBk = null;
        $waliKelas = null;

        switch ($user->role) {
            case 'siswa':
                $student = Student::where('user_id', $user->id)->first();
                break;

            case 'guru_bk':
                $guruBk = GuruBk::where('user_id', $user->id)->first();
                break;

            case 'wali_kelas':
                $waliKelas = WaliKelas::where('user_id', $user->id)->first();
                break;

            default:
                abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        return view('profile.index', compact(
            'student',
            'guruBk',
            'waliKelas'
        ));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        switch ($user->role) {

            case 'siswa':
                $student = Student::where('user_id', $user->id)->first();

                $validated = $request->validate([
                    'nama' => 'required|string|max:255',
                    'nis' => [
                        'required',
                        'string',
                        'max:50',
                        Rule::unique('students', 'nis')->ignore($student?->id),
                    ],
                    'kelas' => 'required|string|max:50',
                    'jurusan' => 'required|string|max:100',
                    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'alamat' => 'nullable|string',
                    'no_hp' => 'nullable|string|max:20',
                    'wali_kelas' => 'nullable|string|max:255',
                ]);

                if ($student) {
                    $student->update($validated);
                } else {
                    Student::create(array_merge($validated, [
                        'user_id' => $user->id,
                    ]));
                }
                break;

            case 'guru_bk':
                $guruBk = GuruBk::where('user_id', $user->id)->first();

                $validated = $request->validate([
                    'nama' => 'required|string|max:255',
                    'nip' => [
                        'required',
                        'string',
                        'max:50',
                        Rule::unique('guru_bks', 'nip')->ignore($guruBk?->id),
                    ],
                    'email' => 'nullable|email|max:255',
                    'no_hp' => 'nullable|string|max:20',
                ]);

                if ($guruBk) {
                    $guruBk->update($validated);
                } else {
                    GuruBk::create(array_merge($validated, [
                        'user_id' => $user->id,
                    ]));
                }
                break;

            case 'wali_kelas':
                $waliKelas = WaliKelas::where('user_id', $user->id)->first();

                $validated = $request->validate([
                    'nama' => 'required|string|max:255',
                    'nip' => [
                        'required',
                        'string',
                        'max:50',
                        Rule::unique('wali_kelas', 'nip')->ignore($waliKelas?->id),
                    ],
                    'kelas' => 'required|string|max:50',
                    'email' => 'nullable|email|max:255',
                    'no_hp' => 'nullable|string|max:20',
                ]);

                if ($waliKelas) {
                    $waliKelas->update($validated);
                } else {
                    WaliKelas::create(array_merge($validated, [
                        'user_id' => $user->id,
                    ]));
                }
                break;

            default:
                abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        $user->update([
            'name' => $validated['nama'],
        ]);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil disimpan.');
    }
}
