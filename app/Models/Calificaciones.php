<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table = 'calificaciones';
    protected $fillable = [
        'id_evaluacion',
        'id_user',
        'nombre_curso',
        'nombre_user',
        'oportunidad',
        'calificacion',
        'fecha_intento'
    ];
    
    use HasFactory;
    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('nombre_curso', 'like', '%' . request('search') . '%')
                ->orWhere('nombre_user', 'like', '%' . request('search') . '%')
                ->orWhere('calificacion', 'like', '%' . request('search') . '%')
                ->orWhere('created_at', 'like', '%' . request('search') . '%')
                ->orWhere('oportunidad', 'like', '%' . request('search') . '%');
        }
    }
}