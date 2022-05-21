<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlockCourses extends Model
{
    protected $fillable = [
        'blockID',
        'termID',
        'courseID'
    ];
    use HasFactory, SoftDeletes;

    public function block()
    {
        return $this->belongsTo(Block::class, 'blockID');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'classID');
    }

    public function term()
    {
        return $this->belongsTo(AcademicTerm::class, 'termID');
    }
}
