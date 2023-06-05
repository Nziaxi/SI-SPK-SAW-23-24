@extends('templates.partials.print-template')

@section('content-print')
    <center>
        <h2>Data Pengguna</h2>
    </center>
    <hr /><br>
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th class="text-center" width=1%>No</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">{{ $user->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
