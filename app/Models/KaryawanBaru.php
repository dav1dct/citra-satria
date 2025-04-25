<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanBaru extends Model
{
    use HasFactory;

    protected $table = 'karyawan_barus';  // Pastikan nama tabel sudah benar

    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_hp',
        'tanggal_lahir',
        'pendidikan',
        'gender',
        'alamat',
        'status', // kolom status
    ];
}
