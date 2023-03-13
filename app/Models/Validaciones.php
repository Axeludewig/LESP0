<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_curso',
        'nombre_usuario',
        'valor_curricular',
        'status',
        'tipo',
        'folio'
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

    
    public function user()
    {
        return $this->belongsTo(User::class, 'nombre_usuario', 'nombre');
    }
}