<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'collegeID',
        'departmentID',
        'programCode'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID');
    }
    public function blocks()
    {
        return $this->hasMany(Block::class, 'programID');
    }
}
