<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'blockName',
        'blockCode',
        'programID'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'programID');
    }

    public function students()
    {
        return $this->hasMany(EnrolledStudent::class, 'blockID');
    }

    public function courses()
    {
        return $this->hasMany(BlockCourses::class, 'blockID');
    }

    public function academic_term(){
        return $this->belongsTo(AcademicTerm::class, "yearID");
    }
}
