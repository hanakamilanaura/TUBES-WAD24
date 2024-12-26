<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_karyawan extends Model
{
    use HasFactory;

    protected $table = 'data_karyawan';

    protected $fillable = [
        'NamaKaryawan',
        'DivisiKaryawan',
        'NoTelp',
        'Alamat',
    ];

    public function absensi()
    {
        return $this->hasMany(data_absensi::class, 'NamaKaryawan', 'NamaKaryawan'); 
    }
    public function perpindahan()
    {
        return $this->hasMany(perpindahan_divisi::class, 'NamaKaryawan', 'NamaKaryawan');
    }
    public function divisi()
    {
        return $this->hasMany(divisi_karyawan::class, 'NamaKaryawan', 'NamaKaryawan');
    }
}
