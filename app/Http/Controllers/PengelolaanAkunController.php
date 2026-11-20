<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun; // ganti dengan model yang kamu pakai

class PengelolaanAkunController extends Controller
{
    // Tampilkan daftar akun
    public function index()
    {
        $akun = Akun::all();
        return view('admin.pengelolaan-akun.index', compact('akun'));
    }

    // Form tambah akun
    public function create()
    {
        return view('admin.pengelolaan-akun.create');
    }

    // Simpan akun baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:akun,email',
            'role' => 'required',
            'status' => 'required',
            'nip' => 'required|unique:akun,nip',
        ]);

        Akun::create($request->all());

        return redirect()->route('pengelolaan-akun.index')
            ->with('success', 'Akun berhasil ditambahkan');
    }

    // Form edit akun
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        return view('admin.pengelolaan-akun.edit', compact('akun'));
    }

    // Update data akun
    public function update(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:akun,email,' . $id,
            'role' => 'required',
            'status' => 'required',
            'nip' => 'required|unique:akun,nip,' . $id,
        ]);

        $akun->update($request->all());

        return redirect()->route('pengelolaan-akun.index')
            ->with('success', 'Akun berhasil diupdate');
    }

    // Hapus akun
    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();

        return redirect()->route('pengelolaan-akun.index')
            ->with('success', 'Akun berhasil dihapus');
    }
}