<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnrolledStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'studentID',
        'termID',
        'yearLevelID',
        'blockID'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }
    public function term()
    {
        return $this->belongsTo(AcademicTerm::class, 'termID');
    }
    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class, 'yearLevelID');
    }
    public function block()
    {
        return $this->belongsTo(Block::class, 'blockID');
    }
}
