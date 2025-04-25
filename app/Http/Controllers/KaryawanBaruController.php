<?php

namespace App\Http\Controllers;

use App\Models\KaryawanBaru;
use Illuminate\Http\Request;

class KaryawanBaruController extends Controller
{
    public function index()
    {
        $karyawanbarus = KaryawanBaru::all();
        return view('karyawanbaru.index', compact('karyawanbarus'));
    }

    public function create()
    {
        return view('karyawanbaru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawan_barus,email',
            'no_hp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'pendidikan' => 'required|string',
            'gender' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $validated['status'] = 'Menunggu'; // default

        KaryawanBaru::create($validated);

        return redirect()->route('karyawanbaru.success')->with('success', 'Data karyawan berhasil ditambahkan.');
    }
    public function success()
    {
        return view('karyawanbaru.success');
    }
    public function updateStatus(Request $request, $id)
    {
    $request->validate([
        'status' => 'required|in:Menunggu,Diterima,Ditolak',
    ]);

    $karyawan = KaryawanBaru::findOrFail($id);
    $karyawan->status = $request->status;
    $karyawan->save();

    return redirect()->route('karyawanbaru.index')->with('success', 'Status berhasil diperbarui.');
    }
    public function edit($id)
    {
        $karyawan = KaryawanBaru::findOrFail($id);
        return view('karyawanbaru.edit', compact('karyawan'));
    }        
}
    
