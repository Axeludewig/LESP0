<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pivot2 extends Model
{
    protected $table = 'pivot2';
    protected $fillable = [
        'consecutivo',
        'year'
    ];
    use HasFactory;
}