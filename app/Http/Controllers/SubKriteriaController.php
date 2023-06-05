<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        return view('sub-kriteria.index', [
            'SubCriterias' => SubCriteria::get(),
        ])->with('i', 1);
    }
    public function create()
    {
        return view('sub-kriteria.create', [
            'criterias' => Criteria::get(),
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => ['required', 'min:3'],
            'nilai' => ['required', 'numeric', 'max:1'],
        ]);

        $SubCriteria = new SubCriteria();

        $SubCriteria->criteria_id = $request->criteria_id;
        $SubCriteria->keterangan = $request->keterangan;
        $SubCriteria->nilai = $request->nilai;

        $SubCriteria->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('sub-kriteria.index');
    }
    public function edit($id)
    {
        $SubCriteria = SubCriteria::find($id);

        return view('sub-kriteria.edit', [
            'criterias' => Criteria::get(),
            'SubCriteria' => $SubCriteria,
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'keterangan' => ['required', 'min:3'],
            'nilai' => ['required', 'numeric', 'max:1'],
        ]);

        $SubCriteria = SubCriteria::find($id);

        $SubCriteria->criteria_id = $request->criteria_id;
        $SubCriteria->keterangan = $request->keterangan;
        $SubCriteria->nilai = $request->nilai;

        $SubCriteria->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('sub-kriteria.index');
    }
    public function destroy($id)
    {
        $SubCriteria = SubCriteria::find($id);

        $SubCriteria->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('sub-kriteria.index');
    }
}