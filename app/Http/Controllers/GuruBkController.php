<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use Illuminate\Http\Request;

class GuruBkController extends Controller
{
    public function index()
    {
        $guruBks = GuruBk::all();

        return view('guru_bk.index', compact('guruBks'));
    }

    public function create()
    {
        return view('guru_bk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:guru_bks,nip',
            'nama' => 'required',
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
        ]);

        GuruBk::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/guru-bk')->with(
            'success',
            'Data Guru BK berhasil ditambahkan.'
        );
    }

    public function edit(GuruBk $guruBk)
    {
        return view('guru_bk.edit', compact('guruBk'));
    }

    public function update(Request $request, GuruBk $guruBk)
    {
        $request->validate([
            'nip' => 'required|unique:guru_bks,nip,' . $guruBk->id,
            'nama' => 'required',
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
        ]);

        $guruBk->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/guru-bk')->with(
            'success',
            'Data Guru BK berhasil diperbarui.'
        );
    }

    public function destroy(GuruBk $guruBk)
    {
        $guruBk->delete();

        return redirect('/guru-bk')->with(
            'success',
            'Data Guru BK berhasil dihapus.'
        );
    }
}