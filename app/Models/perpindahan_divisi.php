<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perpindahan_divisi extends Model
{
    use HasFactory;

    protected $table = 'perpindahan_divisi';

    protected $fillable = [
        'NamaKaryawan',
        'DivisiSebelum',
        'DivisiSesudah',
        'Tanggal',
    ];

    public function karyawan()
    {
        return $this->belongsTo(data_karyawan::class, 'NamaKaryawan', 'NamaKaryawan');
    }
}
