<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {


        $karyawans = Karyawan::all();
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:karyawans',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans',
            'no_hp' => 'required|numeric',
            'posisi' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'status_kerja' => 'required|in:Tetap,Tidak Tetap',
            'status_pernikahan' => 'required|in:Nikah,Tidak Nikah',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggu',
            'tanggal_masuk' => 'required|date', 
            'tanggal_keluar' => 'nullable|date',
        ]);

        Karyawan::create(array_merge(
            $request->all(),
            [
                'tanggal_masuk' => now(),
                'tanggal_keluar' => $request->status == 'Tidak Aktif' ? now() : null,
            ]
        ));

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit(Karyawan $karyawan)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nik' => 'required|numeric|unique:karyawans,nik,' . $karyawan->id, 
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'no_hp' => 'required|numeric',
            'posisi' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'status_kerja' => 'required|in:Tetap,Tidak Tetap',
            'status_pernikahan' => 'required|in:Nikah,Tidak Nikah',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggu',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
        ]);

        if ($request->status == 'Tidak Aktif' && !$karyawan->tanggal_keluar) {
            $validated['tanggal_keluar'] = now();
        }

        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui!');
    }
}
