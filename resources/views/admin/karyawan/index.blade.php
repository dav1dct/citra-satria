@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Data Karyawan</h4>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th><th>Email</th><th>Posisi</th><th>Departemen</th><th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $k)
                <tr>
                    <td>{{ $k->nama_lengkap }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->posisi }}</td>
                    <td>{{ $k->departemen }}</td>
                    <td>{{ $k->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
