<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $availableYears = History::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $yearFilter = $availableYears;

        return view('templates.report', compact('availableYears', 'yearFilter'));
    }
}