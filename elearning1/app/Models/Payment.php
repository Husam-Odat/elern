<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [

        'order_id',
        'payment_date',
        'amount',

    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }
}
