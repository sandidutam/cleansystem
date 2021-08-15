<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nomor_pegawai',
        'nama_depan',
        'nama_belakang',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'kelurahan',
        'pendidikan',
        'jabatan',
        'penempatan',
        'sektor_area',
        'tanggal_diterima',
        'no_hp',
        'foto_pegawai',

    ];

    public function getFotoPegawai()
    {
        if(!$this->foto_pegawai) {
            return asset('images/default.jpg');
        }
        
        return asset('images/'.$this->foto_pegawai);
    }

    public static function getId()
    {
        return $getId = DB::table('pegawai')->orderBy('id','DESC')->take(1)->get();
    }

    /**
     * Get all of the pegawai for the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presensi()
    {
        return $this->hasMany(Presensi::class,'pegawai_id');
    }
    
}