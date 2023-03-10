<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_curso',
        'nombre_curso',
        'fecha_sesion',
        'hora_sesion',
        'status'
    ];

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'id_curso');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencias::class, 'id_sesion');
    }

    

}