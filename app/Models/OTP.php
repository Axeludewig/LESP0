<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $table="OTP";
    protected $fillable=[
        'OTP'
    ];

    use HasFactory;
}