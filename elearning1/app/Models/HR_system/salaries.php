<?php

namespace App\Models\HR_system;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'job_id',
        'salary_amount',
        'salary_start_date',
        'salary_end_date',
    ];
    public function Job()
    {
        return $this->belongsTo(jobs::class, 'job_id');
    }
    public function employee()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
