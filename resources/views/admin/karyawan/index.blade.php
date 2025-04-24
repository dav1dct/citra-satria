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

    <table class="table table-bordered table-dark border-2" style="border: 2px solid #0d6efd;">
        <thead class="table-dark text-center fw-bold fs-5" style="border: 2px solid #0d6efd;">
            <tr>
                <th style="width: 60px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Posisi</th>
                <th>Departemen</th>
                <th>Status</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $index => $k)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $k->nama_lengkap }}</td>
                    <td>{{ $k->email }}</td>
                    <td class="text-center">{{ $k->posisi }}</td>
                    <td class="text-center">{{ $k->departemen }}</td>
                    <td class="text-center">{{ $k->status }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', $k) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
