@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Karyawan</h4>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD">HRD</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
