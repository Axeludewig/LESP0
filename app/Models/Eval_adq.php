<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eval_adq extends Model
{
    protected $table='evals_adq';
    protected $fillable=[
        'id_curso',
        'id_revisor',
        'fecha_evaluacion',
        'status'
    ];
    use HasFactory;
}