<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    protected $table = 'pivot';
    protected $fillable = [
        'consecutivo'
    ];
    use HasFactory;
}