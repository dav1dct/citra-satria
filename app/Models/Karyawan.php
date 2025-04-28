<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',             
        'nama_lengkap',   
        'email',             
        'telepon',           
        'jenis_kelamin',    
        'tanggal_lahir',     
        'alamat',         
        'posisi',          
        'departemen',    
        'status',            
        'tanggal_masuk',     
        'tanggal_keluar',    
        'status_kerja',       
        'status_pernikahan', 
        'no_hp',              
    ];
}
