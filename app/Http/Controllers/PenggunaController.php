<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index', [
            'users' => User::get(),
        ]);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:6'],
            'email' => ['required', 'min:12'],
            'password' => ['required', 'min:8'],
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;

        $user->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('pengguna.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('pengguna.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:6'],
            'email' => ['required', 'min:12'],
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;

        $user->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('pengguna.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('pengguna.index');
    }

    public function print()
    {
        $data = User::get();

        $pdf = Pdf::loadView('pengguna.print', ['users' => $data]);
        return $pdf->stream();
    }
}