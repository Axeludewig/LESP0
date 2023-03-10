<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
		'modalidad',
		'tipo',
		'nombre_del_responsable',
		'coordinacion',
		'dirigido',
		'numero_de_asistentes',
		'horas_teoricas',
		'horas_practicas',
		'categoria',
		'auditorio',
		'fecha_de_inicio',
        'fecha_de_terminacion',
		'objetivo_general',
		'forma_de_evaluacion',
		'porcentaje_asistencia',
		'calificacion_requerida',
		'evaluacion_adquirida',
        'valor_curricular',
        'status',
        'tags',
        'img'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('nombre', 'like', '%' . request('search') . '%')
                ->orWhere('descripcion', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    public function participantes()
    {
        return $this->belongsToMany(Participantes::class)
                    ->withPivot('nombre_participante', 'rfc_participante', 'ubicacion', 'fecha_de_inicio', 'fecha_de_terminacion', 'valor_curricular', 'img');
    }


}