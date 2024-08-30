<?php

namespace App\Models\HR_system;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'user_id',
        'location',
        'desc',
    ];
}
