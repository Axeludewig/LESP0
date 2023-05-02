<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponentes extends Model
{
    protected $fillable = [
        'id_user',
        'id_curso',
        'archivo1',
        'archivo2',
        'archivo3',
        'especial'
    ];
    
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_user', 'id');
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'id_curso', 'id');
    }

    public function actividades()
    {
        return $this->hasMany(Actividades::class, 'id_ponente', 'id');
    }
}