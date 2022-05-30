<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'universityID',
        'firstName',
        'middleName',
        'lastName',
        'departmentID'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID');
    }

    public function courses_taught()
    {
        return $this->hasMany(Course::class, 'teacherID');
    }
}
