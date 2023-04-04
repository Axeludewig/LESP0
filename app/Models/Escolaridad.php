<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{
    use HasFactory;

    protected $table = 'escolaridad';
    protected $fillable=[
        'posgrado1',
        'institucion_educativa_p1',
        'periodo_de_realizacion_p1',
        'posgrado2',
        'institucion_educativa_p2',
        'periodo_de_realizacion_p2',
        'licenciatura',
        'institucion_educativa_lic',
        'cedula',
        'periodo_de_realizacion_lic',
        'carrera_tecnica',
        'institucion_educativa_ct',
        'periodo_de_realizacion_ct',
        'preparatoria',
        'institucion_educativa_prepa',
        'periodo_de_realizacion_prepa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}