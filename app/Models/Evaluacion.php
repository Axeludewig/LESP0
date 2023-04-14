<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';

    protected $fillable = [
        'nombre',
        'video',
        'numero_consecutivo'
    ];

    public function calificaciones()
    {
        return $this->hasOne(Calificaciones::class, 'id_evaluacion');
    }

    public function cuestionarios()
    {
        return $this->hasOne(Calificaciones::class, 'id_evaluacion');
    }
    use HasFactory;
}