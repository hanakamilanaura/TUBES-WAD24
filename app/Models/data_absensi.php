<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_absensi extends Model
{
    use HasFactory;

    protected $table = 'data_absensi';

    protected $fillable = [
        'NamaKaryawan',
        'DivisiKaryawan',
        'NoTelp',
        'Tanggal',
    ];

    public function karyawan()
    {
        return $this->belongsTo(data_karyawan::class, 'NamaKaryawan', 'NamaKaryawan');
    }
    public function laporan()
    {
        return $this->hasMany(laporan_absensi::class, 'DataAbsensiId', 'id'); // Sesuaikan dengan kolom yang relevan
    }
}
