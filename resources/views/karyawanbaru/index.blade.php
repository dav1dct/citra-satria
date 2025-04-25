<!-- @extends('layouts.app')

@section('content') -->
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Daftar Karyawan Baru</h1>
<div class="container">
    <table class="table table-bordered table-dark border-2" style="border: 2px solid #0d6efd;">
        <thead class="align-middle table-dark text-center fw-bold fs-5" style="border: 2px solid #0d6efd;">
            <tr>
                <th style="width: 60px">No</th>
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
            @foreach($karyawanbarus as $index => $kb)
                <tr>
                     <td class="text-center">{{ $index + 1 }}</td>
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
