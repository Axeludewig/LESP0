<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionarios';
    use HasFactory;
    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class, 'id_cuestionario');
    }
}