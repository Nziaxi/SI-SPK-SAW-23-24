<?php

namespace App\Http\Controllers;

use \App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        return view('divisi.index', [
            'departements' => Divisi::get(),
        ])->with('i', 1);
    }

    public function create()
    {
        return view('divisi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_divisi' => ['required', 'min:2'],
            'keterangan' => ['required'],
        ]);

        $departement = new Divisi();

        $departement->nama_divisi = $request->nama_divisi;
        $departement->keterangan = $request->keterangan;

        $departement->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('divisi.index');
    }

    public function edit($id)
    {
        $departement = Divisi::find($id);

        return view('divisi.edit', [
            'departement' => $departement,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_divisi' => ['required', 'min:2'],
            'keterangan' => ['required'],
        ]);

        $departement = Divisi::find($id);

        $departement->nama_divisi = $request->nama_divisi;
        $departement->keterangan = $request->keterangan;

        $departement->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('divisi.index');
    }

    public function destroy($id)
    {
        $departement = Divisi::find($id);

        $departement->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('divisi.index');
    }
}