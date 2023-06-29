<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_curso',
        'numero',
        'fechayhora',
        'contenido_tematico',
        'objetivos',
        'tecnica',
        'responsable',
        'horas_teoricas',
        'horas_practicas',
        'referencia'
    ];
}