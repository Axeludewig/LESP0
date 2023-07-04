<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carta extends Model
{

    protected $table = 'carta';

    protected $fillable=[
        'id_curso',
        'carta'
    ];

    use HasFactory;
}