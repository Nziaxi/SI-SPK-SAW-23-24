@extends('templates.partials.print-template')

@section('content-print')
    <center>
        <h2>Data Perangkingan</h2>
    </center>
    <hr /><br>
    <table class="table">
        <thead>
            <tr class="text-nowrap">
                <th width=1%>No</th>
                <th width=25%>Nama Karyawan</th>
                @foreach ($weights as $weight)
                    <th class="text-center" value="{{ $weight->criteria->nama_kriteria }}">
                        C{{ $loop->iteration }}
                    </th>
                @endforeach
                <th class="text-center" width=10%>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rankings as $rank)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $rank->nama_karyawan }}</td>
                    @php
                        $score = $cscores->where('ida', $rank->employee_id)->all();
                        $total = 0;
                    @endphp
                    @foreach ($score as $s)
                        @php
                            $total = $total + $s->rating;
                        @endphp
                        <td class="text-center">{{ $s->rating }}</td>
                    @endforeach
                    <td class="text-center">{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
