<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $karyawans = Karyawan::all();
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:karyawans',
            'posisi' => 'required',
            'departemen' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggu',
        ]);

        Karyawan::create(array_merge(
            $request->all(),
            ['status' => $request->status ?? 'Menunggu', 'tanggal_masuk' => now()]
        ));
        

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }
        // Menampilkan form edit karyawan
    public function edit(Karyawan $karyawan)
    {
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    // Menyimpan perubahan data karyawan
    public function update(Request $request, Karyawan $karyawan)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'posisi' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
        

        // Update data
        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui!');
    }
}

