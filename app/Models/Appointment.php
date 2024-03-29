<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [

        'userid',
        'start',
        'cancel',
        'end',
        'start_time',
        'end_time',
        'description',
    ];
}
