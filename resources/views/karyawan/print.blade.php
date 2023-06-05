@extends('templates.partials.print-template')

@section('content-print')
    <center>
        <h2>Data Karyawan</h2>
    </center>
    <hr /><br>
    <table>
        <thead>
            <tr>
                <th class="cell-fit">No</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $employee->nama_karyawan }}</td>
                    <td>{{ $employee->departement->nama_divisi }}</td>
                    <td>{{ $employee->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
