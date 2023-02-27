<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participantes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_curso',
        'rfc_participante',
        'nombre_participante',
        'ubicacion',
        'fecha_de_inicio',
        'fecha_de_terminacion',
        'valor_curricular',
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

}