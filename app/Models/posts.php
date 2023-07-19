<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
        'autor',
        'content'
    ];
    use HasFactory;
}