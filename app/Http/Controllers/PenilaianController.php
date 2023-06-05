<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Score;
use App\Models\SubCriteria;
use App\Models\Weight;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        // Ambil nilai dari table
        $scores = Score::get();
        $uniqueScores = $scores->unique('employee_id');
        $employees = Employee::get();
        $weights = Weight::get();

        return view('penilaian.index', compact('scores', 'uniqueScores', 'employees', 'weights'));
    }

    public function create()
    {
        // Ambil nilai dari table
        $employees = Employee::get();
        $weights = Weight::get();
        $subCriterias = SubCriteria::get();

        return view('penilaian.create', compact('employees', 'weights', 'subCriterias'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'criteria' => 'required|array',
            'criteria.*' => 'required',
        ]);

        // Ambil nilai-nilai dari permintaan HTTP
        $employeeId = $validatedData['employee_id'];
        $criteriaValues = $validatedData['criteria'];

        // Simpan data penilaian ke database
        foreach ($criteriaValues as $criteriaId => $subCriteriaId) {
            Score::create([
                'employee_id' => $employeeId,
                'criteria_id' => $criteriaId,
                'sub_criteria_id' => $subCriteriaId,
            ]);
        }

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('penilaian.index');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $weights = Weight::get();
        $subCriterias = SubCriteria::get();
        $scores = Score::where('employee_id', $employee->id)->get();

        return view('penilaian.edit', compact('employee', 'scores', 'weights', 'subCriterias'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'criteria' => 'required|array',
            'criteria.*' => 'exists:sub_criterias,id',
        ]);

        $employee = Employee::findOrFail($id);

        // Menghapus data penilaian yang ada untuk karyawan ini
        Score::where('employee_id', $employee->id)->delete();

        // Menyimpan data penilaian yang baru
        foreach ($request->criteria as $criteriaId => $subCriteriaId) {
            Score::create([
                'employee_id' => $employee->id,
                'criteria_id' => $criteriaId,
                'sub_criteria_id' => $subCriteriaId,
            ]);
        }

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('penilaian.index');
    }

    public function destroy($id)
    {
        // Menghapus data penilaian yang ada untuk karyawan ini
        Score::where('employee_id', $id)->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('penilaian.index');
    }

    public function print()
    {
        // Ambil nilai dari table
        $scores = Score::get();
        $uniqueScores = $scores->unique('employee_id');
        $weights = Weight::get();

        $pdf = Pdf::loadView('penilaian.print', ['scores' => $scores, 'uniqueScores' => $uniqueScores, 'weights' => $weights]);
        return $pdf->stream();
    }
}