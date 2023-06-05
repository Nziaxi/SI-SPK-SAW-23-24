<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use \App\Models\Divisi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', [
            'employees' => Employee::get(),
        ])->with('i', 1);
    }

    public function create()
    {
        return view('karyawan.create', [
            'departements' => Divisi::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_karyawan' => ['required', 'min:3'],
            'alamat' => ['required', 'min:5'],
        ]);

        $employee = new Employee();

        $employee->nama_karyawan = $request->nama_karyawan;
        $employee->departement_id = $request->departement_id;
        $employee->alamat = $request->alamat;

        $employee->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('karyawan.index');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('karyawan.edit', [
            'departements' => Divisi::get(),
            'employee' => $employee,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_karyawan' => ['required', 'min:3'],
            'alamat' => ['required', 'min:5'],
        ]);

        $employee = Employee::find($id);

        $employee->nama_karyawan = $request->nama_karyawan;
        $employee->departement_id = $request->departement_id;
        $employee->alamat = $request->alamat;

        $employee->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('karyawan.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('karyawan.index');
    }

    public function print()
    {
        $data = Employee::get();

        $pdf = Pdf::loadView('karyawan.print', ['employees' => $data]);
        return $pdf->stream();
    }
}