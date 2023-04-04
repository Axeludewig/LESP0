<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionPersonal extends Model
{
    use HasFactory;

    protected $table = 'informacion_personal';

    protected $fillable = [
        'direccion',
        'telefono',
        'nacionalidad',
        'lugar_de_nacimiento',
        'fecha_de_nacimiento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}