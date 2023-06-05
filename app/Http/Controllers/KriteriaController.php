<?php

namespace App\Http\Controllers;

use \App\Models\Criteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        return view('kriteria.index', [
            'criterias' => Criteria::get(),
        ])->with('i', 1);
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kriteria' => ['required', 'min:3'],
        ]);

        $criteria = new Criteria();

        $criteria->nama_kriteria = $request->nama_kriteria;
        $criteria->jenis = $request->jenis;

        $criteria->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('kriteria.index');
    }

    public function edit($id)
    {
        $criteria = Criteria::find($id);

        return view('kriteria.edit', [
            'criteria' => $criteria,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kriteria' => ['required', 'min:3'],
        ]);

        $criteria = Criteria::find($id);

        $criteria->nama_kriteria = $request->nama_kriteria;
        $criteria->jenis = $request->jenis;

        $criteria->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('kriteria.index');
    }

    public function destroy($id)
    {
        $criteria = Criteria::find($id);

        $criteria->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('kriteria.index');
    }
}