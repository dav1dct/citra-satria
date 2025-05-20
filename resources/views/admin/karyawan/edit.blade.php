@extends('layouts.app')

@section('content')
<h1 style="font-family: 'BD-Wurst'" class="text-white text-center mb-4 h1 bg-gray-800 p-4">Edit Karyawan</h1>
<div class="container">
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="text-black dark:text-white">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ old('nik', $karyawan->nik) }}" required>
            @error('nik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" required>
            @error('nama_lengkap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $karyawan->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Posisi</label>
            <select name="posisi" class="form-control">
                <option value="Manager" {{ old('posisi', $karyawan->posisi) == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Staff" {{ old('posisi', $karyawan->posisi) == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Departemen</label>
            <select name="departemen" class="form-control">
                <option value="HRD" {{ old('departemen', $karyawan->departemen) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="IT" {{ old('departemen', $karyawan->departemen) == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Status Kerja</label>
            <select name="status_kerja" class="form-control">
                <option value="Tetap" {{ old('status_kerja', $karyawan->status_kerja) == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                <option value="Tidak Tetap" {{ old('status_kerja', $karyawan->status_kerja) == 'Tidak Tetap' ? 'selected' : '' }}>Tidak Tetap</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-control">
                <option value="Nikah" {{ old('status_pernikahan', $karyawan->status_pernikahan) == 'Nikah' ? 'selected' : '' }}>Nikah</option>
                <option value="Tidak Nikah" {{ old('status_pernikahan', $karyawan->status_pernikahan) == 'Tidak Nikah' ? 'selected' : '' }}>Tidak Nikah</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $karyawan->alamat) }}" required>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $karyawan->no_hp) }}" required>
            @error('no_hp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}" required>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}" required>
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" value="{{ old('tanggal_keluar', $karyawan->tanggal_keluar) }}">
        </div>

        <div class="mb-3">
            <label class="text-black dark:text-white">Status</label>
            <select name="status" class="form-control">
                <option value="Aktif" {{ old('status', $karyawan->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ old('status', $karyawan->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="Menunggu" {{ old('status', $karyawan->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            </select>
        </div>

        <button class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection
