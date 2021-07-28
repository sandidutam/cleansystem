<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'presensi';
    protected $fillable = [
            'nomor_pegawai',
            'nama_lengkap',
            'jabatan',
            'sektor_area',
            'tanggal',
            'jam_masuk',
            'jam_keluar',
            'catatan_masuk',
            'catatan_keluar',
            'keterangan'
    ];
}
