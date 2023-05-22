<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table="revision";
    
    protected $fillable = [
        'id_user',
        'id_curso',
        'id_actividad',
        'archivo1',
        'archivo2',
        'archivo3',
    ];

    use HasFactory;
}