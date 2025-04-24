@extends('layouts.app')

@section('content')
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Daftar Karyawan</h1>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    <table class="table table-bordered table-dark border-2 border-blue-500">
        <thead class="table-dark text-center fw-bold fs-5">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Posisi</th>
                <th>Departemen</th>
                <th>Status</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
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
                    <td>
                        <a href="{{ route('karyawan.edit', $k) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
