<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_curso',
        'nombre_curso',
        'nombre_usuario',
        'valor_curricular',
        'status',
        'tipo',
        'folio',
        'fecha_de_registro',
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('nombre_curso', 'like', '%' . request('search') . '%')
                ->orWhere('nombre_usuario', 'like', '%' . request('search') . '%')
                ->orWhere('folio', 'like', '%' . request('search') . '%')
                ->orWhere('fecha_de_registro', 'like', '%' . request('search') . '%')
                ->orWhere('tipo', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%')
                ->orWhere('valor_curricular', 'like', '%' . request('search') . '%');
        }
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'id_curso', 'id');
    }
}