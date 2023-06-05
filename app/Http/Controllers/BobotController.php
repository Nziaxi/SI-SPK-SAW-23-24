<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Weight;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        return view('bobot.index', [
            'weights' => Weight::get(),
        ])->with('i', 1);
    }

    public function create()
    {
        return view('bobot.create', [
            'criterias' => Criteria::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nilai' => ['required', 'numeric', 'max:1'],
        ]);

        $weight = new Weight();

        $weight->criteria_id = $request->criteria_id;
        $weight->nilai = $request->nilai;

        $weight->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('bobot.index');
    }

    public function edit($id)
    {
        $weight = Weight::find($id);

        return view('bobot.edit', [
            'criterias' => Criteria::get(),
            'weight' => $weight,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nilai' => ['required', 'numeric', 'max:1'],
        ]);

        $weight = Weight::find($id);

        $weight->criteria_id = $request->criteria_id;
        $weight->nilai = $request->nilai;

        $weight->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('bobot.index');
    }

    public function destroy($id)
    {
        $weight = Weight::find($id);

        $weight->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('bobot.index');
    }
}