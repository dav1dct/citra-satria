@extends('layouts.app')

@section('content')
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Tambah Karyawan</h1>
<div class="container">
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="text-white">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="text-white">Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager" {{ old('posisi') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ old('posisi') == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="text-white">Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD" {{ old('departemen') == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="IT" {{ old('departemen') == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="text-white">Status</label>
            <select name="status" class="form-control">
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="Menunggu" {{ old('status', 'Menunggu') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
