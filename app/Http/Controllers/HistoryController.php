<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\History;
use App\Models\SubCriteria;
use App\Models\Weight;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai dari table
        $histories = History::get();
        $employees = Employee::get();
        $weights = Weight::get();

        $uniqueHistories = $histories->unique('employee_id');
        $availableYears = History::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $yearFilter = $request->input('yearFilter', $availableYears->first());

        $data = History::where('year', $yearFilter)->orderBy('year', 'desc')->get();

        return view('riwayat-penilaian.index', compact('data', 'histories', 'employees', 'weights', 'uniqueHistories', 'availableYears', 'yearFilter'))->with('i', 1);
    }

    public function create()
    {
        // Ambil nilai dari table
        $employees = Employee::get();
        $weights = Weight::get();
        $subCriterias = SubCriteria::get();

        return view('riwayat-penilaian.create', compact('employees', 'weights', 'subCriterias'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'criteria' => 'required|array',
            'criteria.*' => 'required',
            'year' => 'required',
        ]);

        // Ambil nilai-nilai dari permintaan HTTP
        $employeeId = $validatedData['employee_id'];
        $criteriaValues = $validatedData['criteria'];
        $year = $validatedData['year'];

        // Simpan data penilaian ke database
        foreach ($criteriaValues as $criteriaId => $subCriteriaId) {
            History::create([
                'employee_id' => $employeeId,
                'criteria_id' => $criteriaId,
                'sub_criteria_id' => $subCriteriaId,
                'year' => $year,
            ]);
        }

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('riwayat-penilaian.index');
    }

    public function edit($id, $year)
    {
        $employee = Employee::find($id);
        $weights = Weight::get();
        $subCriterias = SubCriteria::get();
        $histories = History::where('employee_id', $employee->id)->get();

        return view('riwayat-penilaian.edit', compact('employee', 'histories', 'weights', 'subCriterias', 'year'));
    }

    public function update(Request $request, $id, $year)
    {
        $this->validate($request, [
            'criteria' => 'required|array',
            'criteria.*' => 'exists:sub_criterias,id',
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        $employee = Employee::findOrFail($id);
        $histories = History::where('employee_id', $employee->id)->where('year', $year)->get();

        if ($histories->isEmpty()) {
            abort(404, 'Data not found');
        }

        // Menghapus data penilaian yang ada untuk karyawan ini
        History::where('employee_id', $employee->id)->where('year', $year)->delete();

        // Menyimpan data penilaian yang baru
        foreach ($request->criteria as $criteriaId => $subCriteriaId) {
            History::create([
                'employee_id' => $employee->id,
                'criteria_id' => $criteriaId,
                'sub_criteria_id' => $subCriteriaId,
                'year' => $request->year,
            ]);
        }

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('riwayat-penilaian.index');
    }

    public function destroy($id)
    {
        // Menghapus data penilaian yang ada untuk karyawan ini
        History::where('employee_id', $id)->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('riwayat-penilaian.index');
    }

    public function print($year)
    {
        $weights = Weight::get();

        $data = History::where('year', $year)->orderBy('year', 'desc')->get();

        $pdf = Pdf::loadView('riwayat-penilaian.print', ['year' => $year, 'weights' => $weights, 'data' => $data, 'i' => 1]);
        return $pdf->stream();
    }
}