<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $fillable = [
        'id_user',
        'id_curso',
        'id_ponente',
        'archivo1', 
        'archivo2',
        'archivo3',
        'status'
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

    public function ponente()
    {
        return $this->belongsTo(Ponentes::class, 'id_ponente', 'id');
    }
}