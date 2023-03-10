<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sesion',
        'nombre_curso',
        'fecha_sesion',
        'hora_sesion',
        'hora_registro',
        'nombre_participante',
        'rfc_participante',
        'id_participante'
    ];

    public function sesion()
    {
        return $this->belongsTo(Sesiones::class, 'id_sesion');
    }

    public function participante()
    {
        return $this->belongsTo(User::class, 'id_participante');
    }
}