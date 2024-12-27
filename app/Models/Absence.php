<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'attendance', 'is_late', 'last_division','current_division', 'id_karyawan', 'shift_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'current_division');
    }

    public function lastDivision()
    {
        return $this->belongsTo(Division::class, 'last_division');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}