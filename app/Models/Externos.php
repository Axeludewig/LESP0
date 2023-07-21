<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externos extends Model
{
    protected $fillable = [
        'id_user',
        'nombre_capacitacion',
        'horas_totales',
        'status',
        'archivo',
        'archivo2',
        'archivo3',
        'archivo4',
    ];

    use HasFactory;

    // Define the relationship with the 'users' table
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}