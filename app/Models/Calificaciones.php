<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table = 'calificaciones';
    protected $fillable = [
        'id_evaluacion',
        'id_user',

    ];
    use HasFactory;
    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}