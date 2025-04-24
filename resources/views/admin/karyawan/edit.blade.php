@extends('layouts.app')

@section('content')
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Edit Karyawan</h1>
<div class="container">
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="text-white">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" required>
            @error('nama_lengkap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-white">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $karyawan->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-white">Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager" {{ old('posisi', $karyawan->posisi) == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ old('posisi', $karyawan->posisi) == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-white">Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD" {{ old('departemen', $karyawan->departemen) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="IT" {{ old('departemen', $karyawan->departemen) == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-white">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $karyawan->status) }}" required>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
