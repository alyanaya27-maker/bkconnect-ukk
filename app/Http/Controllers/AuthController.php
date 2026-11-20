<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'is_active' => true,
        ]);

        return redirect('/login')->with(
            'success',
            'Registrasi berhasil! Silakan login.'
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Periksa status akun
            if (!$user->is_active) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Akun kamu sedang dinonaktifkan. Hubungi Admin.',
                    ]);
            }

            $request->session()->regenerate();

            // Arahkan pengguna sesuai role
            switch ($user->role) {
                case 'siswa':
                    return redirect()->route('dashboard.siswa');

                case 'guru_bk':
                    return redirect()->route('dashboard.guru_bk');

                case 'admin':
                    return redirect()->route('dashboard.admin');

                case 'wali_kelas':
                    return redirect()->route('dashboard.wali_kelas');

                default:
                    Auth::logout();

                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect()->route('login')
                        ->withErrors([
                            'email' => 'Role akun belum terdaftar.',
                        ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
