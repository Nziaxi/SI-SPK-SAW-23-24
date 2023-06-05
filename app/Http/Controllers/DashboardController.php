<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Divisi;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahEmployees = Employee::count();
        $jumlahDepartements = Divisi::count();
        $jumlahUsers = User::count();
        $rankings = Employee::join('rankings', 'employees.id', '=', 'rankings.employee_id')
            ->where('rankings.total', '!=', 0)
            ->orderBy('rankings.total', 'desc')
            ->take(5)
            ->get();

        return view('templates.dashboard', compact('jumlahEmployees', 'jumlahDepartements', 'jumlahUsers', 'rankings'));
    }
}