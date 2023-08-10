<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evals_adq extends Model
{
    protected $table = 'evals_adquiridas';
    protected $fillable = [
        'id_evaladq',
        'id_curso',
        'id_evaluador',
        'id_evaluado',
        'nombre_completo_evaluador',
        'puesto_evaluador',
        'firma_del_evaluador',
        'nombre_evaluado',
        'puesto_evaluado',
        'area_evaluado',
        'nombre_capacitacion',
        'evaluacion1',
        'evaluacion2',
        'evaluacion3',
        'evaluacion4',
        'evaluacion5',
        'evaluacion6',
        'evaluacion7',
        'evaluacion8',
        'resultado',
        'necesidad_capacitacion',
        'descripcion_necesidad',
        'calificacion',
        'validacion_ensenanza',
    ];
    
    use HasFactory;
}