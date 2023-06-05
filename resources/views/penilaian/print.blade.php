@extends('templates.partials.print-template')

@section('content-print')
    <center>
        <h2>Data Penilaian</h2>
    </center>
    <hr /><br>
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th width=1%>No</th>
                <th>Nama Karyawan</th>
                @foreach ($weights as $weight)
                    <th>{{ $weight->criteria->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($uniqueScores as $US)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $US->employee->nama_karyawan }}</td>
                    @foreach ($scores->where('employee_id', $US->employee_id) as $s)
                        <td>{{ $s->subCriteria->keterangan }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
