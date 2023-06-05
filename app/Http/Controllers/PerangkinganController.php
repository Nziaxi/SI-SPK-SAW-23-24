<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Ranking;
use App\Models\Score;
use App\Models\Weight;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PerangkinganController extends Controller
{
    public function index()
    {
        $scres = Score::get();
        $uniqueScores = $scres->unique('employee_id');

        // Data score untuk normalisasi
        $scores = Score::select(
            'scores.id as id',
            'employees.id as ida',
            'weights.criteria_id as idw',
            'sub_criterias.id as idr',
            'employees.nama_karyawan as name',
            'sub_criterias.nilai as rating',
            'sub_criterias.keterangan as description'
        )
            ->leftJoin('employees', 'employees.id', '=', 'scores.employee_id')
            ->leftJoin('weights', 'weights.criteria_id', '=', 'scores.criteria_id')
            ->leftJoin('sub_criterias', 'sub_criterias.id', '=', 'scores.sub_criteria_id')
            ->get();

        // Duplikasi data score untuk perangkingan
        $cscores = Score::select(
            'scores.id as id',
            'employees.id as ida',
            'weights.criteria_id as idw',
            'sub_criterias.id as idr',
            'employees.nama_karyawan as name',
            'sub_criterias.nilai as rating',
            'sub_criterias.keterangan as description'
        )
            ->leftJoin('employees', 'employees.id', '=', 'scores.employee_id')
            ->leftJoin('weights', 'weights.criteria_id', '=', 'scores.criteria_id')
            ->leftJoin('sub_criterias', 'sub_criterias.id', '=', 'scores.sub_criteria_id')
            ->get();

        $employees = Employee::get();
        $weights = Weight::get();

        // Normalisasi
        foreach ($employees as $a) {
            $afilter = collect($scores)->where('ida', $a->id);
            foreach ($weights as $cw) {
                $rates = collect($scores)->map(function ($val) use ($cw) {
                    if ($cw->criteria_id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();
                $rates = array_values(array_filter($rates));


                if ($cw->criteria->jenis == 'Benefit') {
                    $maxRate = max($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($maxRate) {
                        $item->rating = round($item->rating / $maxRate, 2);
                        return $item;
                    });
                } elseif ($cw->criteria->jenis == 'Cost') {
                    $minRate = min($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($minRate) {
                        $item->rating = round($minRate / $item->rating, 2);
                        return $item;
                    });
                }
            }
        }

        // Perangkingan
        foreach ($employees as $a) {
            $afilter = collect($cscores)->where('ida', $a->id);
            $total = 0;
            foreach ($weights as $cw) {
                $rates = collect($cscores)->map(function ($val) use ($cw) {
                    if ($cw->criteria_id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();
                $rates = array_values(array_filter($rates));

                if ($cw->criteria->jenis == 'Benefit') {
                    $maxRate = max($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($maxRate, $cw) {
                        $item->rating = round($item->rating / $maxRate, 2);
                        $item->rating = round($item->rating * $cw->nilai, 2);
                        return $item;
                    });
                } elseif ($cw->criteria->jenis == 'Cost') {
                    $minRate = min($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($minRate, $cw) {
                        $item->rating = round($minRate / $item->rating, 2);
                        $item->rating = round($item->rating * $cw->nilai, 2);
                        return $item;
                    });
                }
                $filteredAfilter = $afilter->where('idw', $cw->criteria_id)->first();
                if ($filteredAfilter) {
                    $total = $total + $filteredAfilter->rating;
                }
            }

            // Simpan atau update data peringkat
            $ranking = Ranking::updateOrCreate(
                ['employee_id' => $a->id],
                ['total' => $total]
            );
        }

        // Join table rangking dan employee dengan sorting desc
        $rankings = Employee::join('rankings', 'employees.id', '=', 'rankings.employee_id')
            ->where('rankings.total', '!=', 0)
            ->orderBy('rankings.total', 'desc')
            ->get();

        return view('templates.perangkingan', compact('scres', 'scores', 'cscores', 'uniqueScores', 'employees', 'weights', 'rankings'));

    }

    public function print()
    {
        $employees = Employee::get();
        $weights = Weight::get();

        // Duplikasi data score untuk perangkingan
        $cscores = Score::select(
            'scores.id as id',
            'employees.id as ida',
            'weights.criteria_id as idw',
            'sub_criterias.id as idr',
            'employees.nama_karyawan as name',
            'sub_criterias.nilai as rating',
            'sub_criterias.keterangan as description'
        )
            ->leftJoin('employees', 'employees.id', '=', 'scores.employee_id')
            ->leftJoin('weights', 'weights.criteria_id', '=', 'scores.criteria_id')
            ->leftJoin('sub_criterias', 'sub_criterias.id', '=', 'scores.sub_criteria_id')
            ->get();

        // Perangkingan
        foreach ($employees as $a) {
            $afilter = collect($cscores)->where('ida', $a->id);
            $total = 0;
            foreach ($weights as $cw) {
                $rates = collect($cscores)->map(function ($val) use ($cw) {
                    if ($cw->criteria_id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();
                $rates = array_values(array_filter($rates));

                if ($cw->criteria->jenis == 'Benefit') {
                    $maxRate = max($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($maxRate, $cw) {
                        $item->rating = round($item->rating / $maxRate, 2);
                        $item->rating = round($item->rating * $cw->nilai, 2);
                        return $item;
                    });
                } elseif ($cw->criteria->jenis == 'Cost') {
                    $minRate = min($rates);
                    $afilter->where('idw', $cw->criteria_id)->transform(function ($item) use ($minRate, $cw) {
                        $item->rating = round($minRate / $item->rating, 2);
                        $item->rating = round($item->rating * $cw->nilai, 2);
                        return $item;
                    });
                }
                $filteredAfilter = $afilter->where('idw', $cw->criteria_id)->first();
                if ($filteredAfilter) {
                    $total = $total + $filteredAfilter->rating;
                }
            }
        }

        // Join table rangking dan employee dengan sorting desc
        $rankings = Employee::join('rankings', 'employees.id', '=', 'rankings.employee_id')
            ->where('rankings.total', '!=', 0)
            ->orderBy('rankings.total', 'desc')
            ->get();

        $pdf = Pdf::loadView('templates.perangkingan-print', ['weights' => $weights, 'rankings' => $rankings, 'cscores' => $cscores]);
        return $pdf->stream();
    }
}