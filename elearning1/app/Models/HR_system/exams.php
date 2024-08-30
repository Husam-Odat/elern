<?php

namespace App\Models\HR_system;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_title',
        'exam_desc',
        'marks',
    ];

    public function Salary()
    {
        return $this->hasMany(salaries::class);
    }
}
