<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero_consecutivo',
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
                ->orWhere('tipo', 'like', '%' . request('search') . '%')
                ->orWhere('modalidad', 'like', '%' . request('search') . '%')
                ->orWhere('dirigido', 'like', '%' . request('search') . '%')
                ->orWhere('coordinacion', 'like', '%' . request('search') . '%')
                ->orWhere('categoria', 'like', '%' . request('search') . '%')
                ->orWhere('auditorio', 'like', '%' . request('search') . '%')
                ->orWhere('fecha_de_inicio', 'like', '%' . request('search') . '%')
                ->orWhere('fecha_de_terminacion', 'like', '%' . request('search') . '%')
                ->orWhere('forma_de_evaluacion', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%')
                ->orWhere('horas_teoricas', 'like', '%' . request('search') . '%')
                ->orWhere('horas_practicas', 'like', '%' . request('search') . '%')
                ->orWhere('nombre_del_responsable', 'like', '%' . request('search') . '%')
                ->orWhere('numero_consecutivo', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
                
        }
    }
    public function participantes()
    {
        return $this->belongsToMany(Participantes::class)
                    ->withPivot('nombre_participante', 'rfc_participante', 'ubicacion', 'fecha_de_inicio', 'fecha_de_terminacion', 'valor_curricular', 'img');
    }

    public function evaluacion(){
        return $this->hasOne(Evaluacion::class, 'id_curso');
    }

}