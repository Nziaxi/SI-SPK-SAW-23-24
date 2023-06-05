@extends('templates.partials.print-template')

@section('content-print')
    <center>
        <h2>Data Riwayat Penilaian {{ $year }}</h2>
    </center>
    <hr /><br>
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th class="text-center" width="1%">No</th>
                <th>Nama Karyawan</th>
                @foreach ($weights as $weight)
                    <th>{{ $weight->criteria->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                @if ($index % 5 == 0)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $item->employee->nama_karyawan }}</td>
                        @foreach ($weights as $weight)
                            <td>
                                @php
                                    $criteriaValue = $data
                                        ->where('criteria_id', $weight->criteria_id)
                                        ->where('employee_id', $item->employee_id)
                                        ->first();
                                @endphp
                                @if ($criteriaValue && $criteriaValue->subCriteria)
                                    {{ $criteriaValue->subCriteria->keterangan }}
                                @else
                                    N/A
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
