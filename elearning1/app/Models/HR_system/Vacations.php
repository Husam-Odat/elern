<?php

namespace App\Models\HR_system;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacations extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'vacation_type',
        'start_date',
        'end_date',
        'status',
    ];
    public function employee()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
