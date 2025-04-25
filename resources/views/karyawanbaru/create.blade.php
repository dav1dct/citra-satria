@extends('layouts.form')

@section('content')
<h1 class="text-white text-center mb-4 h1 bg-primary p-3">Formulir Karyawan Baru</h1>
<div class="container">
    <form action="{{ route('karyawanbaru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="text-white">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Nomor HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>
        <div class="mb-3">
            <label class="text-white">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
        </div>
        <div class="mb-3">
    <label class="text-white">Pendidikan Terakhir</label>
    <select name="pendidikan" class="form-control" required>
        <option value="">-- Pilih Pendidikan Terakhir --</option>
        <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
        <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
        <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
        <option value="SMK" {{ old('pendidikan') == 'SMK' ? 'selected' : '' }}>SMK</option>
        <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
        <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
        <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
        <option value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
        <option value="Lainnya" {{ old('pendidikan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
    </select>
</div>
        <div class="mb-3">
            <label class="text-white">Jenis Kelamin</label>
            <select name="gender" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="text-white">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
        </div>
        <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
        <x-primary-button type="submit" class="ms-3">
                {{ __('Daftar') }}
        </x-primary-button>
    </form>
</div>
@endsection
