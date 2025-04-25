@extends('layouts.form')

@section('content')
    <h1 class="text-white text-center mb-6 h1 bg-primary p-3 rounded">Formulir Karyawan Baru</h1>

    <div class="w-full max-w-md mx-auto p-6 bg-gray-800 rounded shadow-md">
        <form action="{{ route('karyawanbaru.store') }}" method="POST">
            @csrf

            {{-- Nama Lengkap --}}
            <div class="mb-4">
                <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required style="background-color: white; color: black; border: 1px solid #ccc;" />
                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required style="background-color: white; color: black; border: 1px solid #ccc;" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Nomor HP --}}
            <div class="mb-4">
                <x-input-label for="no_hp" :value="__('Nomor HP')" />
                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')" required style="background-color: white; color: black; border: 1px solid #ccc;" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            {{-- Tanggal Lahir --}}
            <div class="mb-4">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required style="background-color: white; color: black; border: 1px solid #ccc;" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            {{-- Pendidikan Terakhir --}}
            <div class="mb-4">
                <x-input-label for="pendidikan" :value="__('Pendidikan Terakhir')" />
                <select name="pendidikan" id="pendidikan" class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white" style="background-color: white; color: black; border: 1px solid #ccc;" required>
                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                    @foreach(['SD', 'SMP', 'SMA', 'SMK', 'D3', 'S1', 'S2', 'S3', 'Lainnya'] as $jenjang)
                        <option value="{{ $jenjang }}" {{ old('pendidikan') == $jenjang ? 'selected' : '' }}>{{ $jenjang }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('pendidikan')" class="mt-2" />
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                <select name="gender" id="gender" class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white" style="background-color: white; color: black; border: 1px solid #ccc;" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <textarea name="alamat" id="alamat" rows="3" class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white" style="background-color: white; color: black; border: 1px solid #ccc;">{{ old('alamat') }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
