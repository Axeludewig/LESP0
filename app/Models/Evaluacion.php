<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'id_cuestionario');
    }

    public function calificaciones()
    {
        return $this->hasOne(Calificaciones::class, 'id_evaluacion');
    }
    use HasFactory;
}