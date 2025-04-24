@extends('layouts.app')

@section('content')
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Tambah Karyawan Baru</h1>
<div class="container">
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="text-white">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="text-white">Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="text-white">Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD">HRD</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
