<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';

    protected $fillable = [
        'id_curso',
        'nombre',
        'video',
        'pdf',
        'pdf2',
        'pdf3',
        'pdf4',
        'numero_consecutivo'
    ];

    public function cursos(){
        return $this->belongsTo(Cursos::class, 'id_curso');
    }

    public function calificaciones()
    {
        return $this->hasOne(Calificaciones::class, 'id_evaluacion');
    }

    public function cuestionarios()
    {
        return $this->hasOne(Calificaciones::class, 'id_evaluacion');
    }

    public function permisos()
    {
        return $this->hasMany(Permisos_eval::class, 'id_eval');
    }
    use HasFactory;
}