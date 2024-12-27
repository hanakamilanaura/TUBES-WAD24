<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_hour', 'end_hour'];

    public function absences()
    {
        return $this->hasMany(Absence::class, 'shift_id');
    }
}