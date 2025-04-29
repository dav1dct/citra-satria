<?php

namespace App\Http\Controllers;

use App\Models\KaryawanBaru;
use Illuminate\Http\Request;

class KaryawanBaruController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

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
            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'foto_ktp' => 'required|file|mimes:jpg,jpeg,png|max:10240',
            'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);
    
        // Upload file ke storage/app/public/uploads/
        $cvPath = $request->file('cv')->store('uploads', 'public');
        $fotoKtpPath = $request->file('foto_ktp')->store('uploads', 'public');
        $ijazahPath = $request->file('ijazah')->store('uploads', 'public');
    
        // Simpan data ke database
        KaryawanBaru::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'pendidikan' => $validated['pendidikan'],
            'gender' => $validated['gender'],
            'alamat' => $validated['alamat'],
            'status' => 'Menunggu',
            'cv' => $cvPath,         // ← Upload path
            'foto_ktp' => $fotoKtpPath,
            'ijazah' => $ijazahPath,
        ]);
    
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
    
