<!-- @extends('layouts.app')

@section('content') -->
<div class="container">
    <h1>Data Karyawan Baru</h1>

    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Tanggal Lahir</th>
                <th>Pendidikan</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawanbarus as $kb)
                <tr>
                    <td>{{ $kb->nama_lengkap }}</td>
                    <td>{{ $kb->email }}</td>
                    <td>{{ $kb->no_hp }}</td>
                    <td>{{ \Carbon\Carbon::parse($kb->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $kb->pendidikan }}</td>
                    <td>{{ $kb->gender }}</td>
                    <td>{{ $kb->alamat }}</td>
                    <td>{{ $kb->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- @endsection -->
