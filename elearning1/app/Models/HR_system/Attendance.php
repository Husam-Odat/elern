<?php

namespace App\Models\HR_system;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'date',
        'clock_in',
        'clock_out',
    ];
    public function employee()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
