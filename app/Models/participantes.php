<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participantes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'ud_curso',
        'nombre_curso',
        'rfc_participante',
        'nombre_participante',
        'email_participante',
        'ubicacion',
        'fecha_de_inicio',
        'fecha_de_terminacion',
        'valor_curricular',
        'tipo',
        'img'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('nombre_curso', 'like', '%' . request('search') . '%')
                ->orWhere('rfc_participante', 'like', '%' . request('search') . '%')
                ->orWhere('nombre_participante', 'like', '%' . request('search') . '%');
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('nombre_curso', 'fecha_de_inicio', 'fecha_de_terminacion', 'valor_curricular', 'img');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'id_user', 'id');
    }

    public function curso()
    {
        return $this->belongsToMany(Cursos::class, 'id_curso', 'id');
    }

}