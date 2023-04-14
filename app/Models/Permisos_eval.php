<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos_eval extends Model
{
    protected $table = 'permisos_eval';
    protected $fillable = [
        'id_usuario',
        'id_eval',
    ];
    use HasFactory;
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_eval', 'id');
    }

}