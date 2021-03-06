<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicTerm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'semName',
        'academicYearID'
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academicYearID');
    }
}
