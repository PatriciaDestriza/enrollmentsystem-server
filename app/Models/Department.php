<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'collegeName',
        'collegeCode'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'departmentID');
    }

    public function programs()
    {
        return $this->hasMany(Program::class, 'departmentID');
    }
}
