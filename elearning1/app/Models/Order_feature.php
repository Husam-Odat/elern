<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_feature extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'feature_id'];
}
