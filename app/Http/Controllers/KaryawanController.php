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
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:karyawans',
            'posisi' => 'required',
            'departemen' => 'required',
        ]);

        Karyawan::create(array_merge(
            $request->all(),
            ['status' => 'Aktif', 'tanggal_masuk' => now()]
        ));

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }
}

