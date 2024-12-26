<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_absensi extends Model
{
    use HasFactory;

    protected $table = 'laporan_absensi';

    protected $fillable = [
        'NamaKaryawan',
        'DivisiKaryawan',
        'Tanggal',
    ];

    public function absensi()
    {
        return $this->belongsTo(data_absensi::class, 'DataAbsensiId', 'id');
    }
}
