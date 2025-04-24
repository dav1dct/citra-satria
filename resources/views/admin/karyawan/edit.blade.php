@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Karyawan</h4>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" required>
            @error('nama_lengkap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $karyawan->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager" {{ old('posisi', $karyawan->posisi) == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ old('posisi', $karyawan->posisi) == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD" {{ old('departemen', $karyawan->departemen) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="IT" {{ old('departemen', $karyawan->departemen) == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $karyawan->status) }}" required>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
