<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'courseName',
        'courseCode',
        'programID',
        'roomID',
        'scheduleID'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomID');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'scheduleID');
    }
}
