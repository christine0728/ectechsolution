<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'serviceid',
        'cancel',
        'promoId',
        'userid',
        'paid',
        'status',
        'start',
        'end',
        'start_time',
        'end_time',
        'description',
    ];
}
