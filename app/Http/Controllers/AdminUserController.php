<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GuruBk;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    // Menampilkan daftar akun Guru BK dan Wali Kelas
    public function index()
    {
        $users = User::whereIn('role', ['guru_bk', 'wali_kelas'])
            ->with(['guruBk', 'waliKelas'])
            ->orderBy('name')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    // Menampilkan formulir tambah akun
    public function create()
    {
        $guruBks = GuruBk::orderBy('nama')->get();

        return view('admin.users.create', compact('guruBks'));
    }

    // Menyimpan akun baru
    public function store(Request $request)
    {
        $role = $request->role;

        $table = $role === 'wali_kelas'
            ? 'wali_kelas'
            : 'guru_bks';

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:guru_bk,wali_kelas',
            'nip' => [
                'required',
                'string',
                'max:50',
                Rule::unique($table, 'nip'),
            ],
            'no_hp' => 'nullable|string|max:20',
            'kelas' => [
                Rule::requiredIf(fn () => $request->role === 'wali_kelas'),
                'nullable',
                'string',
                'max:50',
            ],
            'guru_bk_id' => 'nullable|exists:guru_bks,id',
        ]);

        if ($validated['role'] === 'wali_kelas' && empty($validated['guru_bk_id'])) {
            return back()->withErrors(['guru_bk_id' => 'Guru BK wajib dipilih untuk Wali Kelas.'])->withInput();
        }

        DB::transaction(function () use ($validated) {

            // Membuat akun login
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
                'is_active' => true,
            ]);

            // Membuat profil sesuai role
            if ($validated['role'] === 'guru_bk') {

                GuruBk::create([
                    'user_id' => $user->id,
                    'nip' => $validated['nip'],
                    'nama' => $validated['name'],
                    'email' => $validated['email'],
                    'no_hp' => $validated['no_hp'] ?? null,
                ]);

            } else {

                WaliKelas::create([
                    'user_id' => $user->id,
                    'nip' => $validated['nip'],
                    'nama' => $validated['name'],
                    'kelas' => $validated['kelas'],
                    'email' => $validated['email'],
                    'no_hp' => $validated['no_hp'] ?? null,
                    'guru_bk_id' => $validated['guru_bk_id'],
                ]);
            }
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun berhasil ditambahkan!');
        }

    public function edit(User $user)
    {
        abort_unless(in_array($user->role, ['guru_bk', 'wali_kelas'], true), 404);

        $user->load(['guruBk', 'waliKelas']);
        $guruBks = GuruBk::orderBy('nama')->get();

        return view('admin.users.edit', compact('user', 'guruBks'));
    }

    public function update(Request $request, User $user)
    {
        abort_unless(in_array($user->role, ['guru_bk', 'wali_kelas'], true), 404);

        $currentProfile = $user->role === 'guru_bk' ? $user->guruBk : $user->waliKelas;
        $profileTable = $request->role === 'wali_kelas' ? 'wali_kelas' : 'guru_bks';
        $profileId = $request->role === $user->role ? $currentProfile?->id : null;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:guru_bk,wali_kelas',
            'nip' => [
                'required', 'string', 'max:50',
                Rule::unique($profileTable, 'nip')->ignore($profileId),
            ],
            'no_hp' => 'nullable|string|max:20',
            'kelas' => [
                Rule::requiredIf(fn () => $request->role === 'wali_kelas'),
                'nullable', 'string', 'max:50',
            ],
            'is_active' => 'required|boolean',
            'guru_bk_id' => 'nullable|exists:guru_bks,id',
        ]);

        if ($validated['role'] === 'wali_kelas' && empty($validated['guru_bk_id'])) {
            return back()->withErrors(['guru_bk_id' => 'Guru BK wajib dipilih untuk Wali Kelas.'])->withInput();
        }

        DB::transaction(function () use ($validated, $user, $currentProfile) {
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role'],
                'is_active' => (bool) $validated['is_active'],
            ];

            if (! empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            $user->update($userData);

            if ($user->role === 'guru_bk') {
                $profileData = [
                    'user_id' => $user->id,
                    'nip' => $validated['nip'],
                    'nama' => $validated['name'],
                    'email' => $validated['email'],
                    'no_hp' => $validated['no_hp'] ?? null,
                ];

                if ($currentProfile && $currentProfile->getTable() === 'guru_bks') {
                    $currentProfile->update($profileData);
                } else {
                    $currentProfile?->delete();
                    GuruBk::create($profileData);
                }
            } else {
                $profileData = [
                    'user_id' => $user->id,
                    'nip' => $validated['nip'],
                    'nama' => $validated['name'],
                    'kelas' => $validated['kelas'],
                    'email' => $validated['email'],
                    'no_hp' => $validated['no_hp'] ?? null,
                    'guru_bk_id' => $validated['guru_bk_id'],
                ];

                if ($currentProfile && $currentProfile->getTable() === 'wali_kelas') {
                    $currentProfile->update($profileData);
                } else {
                    $currentProfile?->delete();
                    WaliKelas::create($profileData);
                }
            }
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        abort_unless(in_array($user->role, ['guru_bk', 'wali_kelas'], true), 404);

        DB::transaction(function () use ($user) {
            $user->guruBk?->delete();
            $user->waliKelas?->delete();
            $user->delete();
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun berhasil dihapus!');
    }
}
