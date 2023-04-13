<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionarios';
    protected $fillable = [
        'id_evaluacion',
        'pregunta1',
        'pregunta1_opcion1',
        'pregunta1_opcion2',
        'pregunta1_opcion3',
        'pregunta1_opcion4',
        'pregunta1_opcion5',
        'pregunta2',
        'pregunta2_opcion1',
        'pregunta2_opcion2',
        'pregunta2_opcion3',
        'pregunta2_opcion4',
        'pregunta2_opcion5',
        'pregunta3',
        'pregunta3_opcion1',
        'pregunta3_opcion2',
        'pregunta3_opcion3',
        'pregunta3_opcion4',
        'pregunta3_opcion5',
        'pregunta4',
        'pregunta4_opcion1',
        'pregunta4_opcion2',
        'pregunta4_opcion3',
        'pregunta4_opcion4',
        'pregunta4_opcion5',
        'pregunta5',
        'pregunta5_opcion1',
        'pregunta5_opcion2',
        'pregunta5_opcion3',
        'pregunta5_opcion4',
        'pregunta5_opcion5',
        'pregunta1_respuesta',
        'pregunta2_respuesta',
        'pregunta3_respuesta',
        'pregunta4_respuesta',
        'pregunta5_respuesta',
    ];
    use HasFactory;
    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class, 'id_cuestionario');
    }
}