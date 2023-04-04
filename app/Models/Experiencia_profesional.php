<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia_profesional extends Model
{
    use HasFactory;
    
    protected $table = 'experiencia_profesional';

    protected $fillable=[
        'puesto1',
        'experiencia1',
        'periodo1',
        'puesto2',
        'experiencia2',
        'periodo2',
        'puesto3',
        'experiencia3',
        'periodo3',
        'puesto4',
        'experiencia4',
        'periodo4',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}