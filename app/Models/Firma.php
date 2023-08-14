<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $table="firmas";

    protected $fillable=[
        'id_evaladq',
        'id_otp'
    ];
    use HasFactory;
}