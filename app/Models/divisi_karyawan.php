<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi_karyawan extends Model
{
    use HasFactory;

    protected $table = 'divisi_karyawan';

    protected $fillable = [
        'NamaKaryawan',
        'DivisiKaryawan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(data_karyawan::class, 'NamaKaryawan', 'NamaKaryawan');
    }
    public function absensi()
    {
        return $this->hasMany(data_absensi::class, 'NamaKaryawan', 'NamaKaryawan');
    }
}
