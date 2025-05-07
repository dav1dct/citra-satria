<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanBaru extends Model
{
    use HasFactory;

    protected $table = 'karyawan_barus';

    protected $fillable = [
        'kode_lamaran',
        'nama_lengkap',
        'email',
        'no_hp',
        'tanggal_lahir',
        'pendidikan',
        'gender',
        'alamat',
        'status',
        'cv',
        'foto_ktp',
        'ijazah',
    ];
}
