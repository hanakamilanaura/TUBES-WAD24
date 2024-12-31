<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    // Gunakan guarded untuk menghindari mass assignment
    protected $guarded = ['id'];

    /**
     * Relasi ke tabel Employee (Many-to-One)
     * 'id_employee' adalah foreign key di tabel 'absences'
     */
    public function employee()
    {   
        return $this->belongsTo(Employee::class, 'id_employee', 'id');
    }

    /**
     * Relasi ke tabel Division (Many-to-One untuk Current Division)
     * 'current_division' adalah foreign key di tabel 'absences'
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'current_division', 'id');
    }

    /**
     * Relasi ke tabel Division (Many-to-One untuk Last Division)
     * 'last_division' adalah foreign key di tabel 'absences'
     */
    public function lastDivision()
    {
        return $this->belongsTo(Division::class, 'last_division', 'id');
    }

    /**
     * Relasi ke tabel Shift (Many-to-One)
     * 'shift_id' adalah foreign key di tabel 'absences'
     */
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }
}
