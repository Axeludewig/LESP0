<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rfc',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'email',
        'proyecto',
        'puesto',
        'descripcion_puesto',
        'curp',
        'turno',
        'coordinacion',
        'area',
        'funcion',
        'tipo',
        'status',
        'observaciones',
        'es_admin',
        'profile_pic'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha-de-registro' => 'datetime',
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('nombre', 'like', '%' . request('search') . '%')
                ->orWhere('apellido_paterno', 'like', '%' . request('search') . '%')
                ->orWhere('apellido_materno', 'like', '%' . request('search') . '%');
        }
    }

    public function participantes()
    {
        return $this->belongsToMany(Participantes::class)
                    ->withPivot('nombre_curso', 'fecha_de_inicio', 'fecha_de_terminacion', 'valor_curricular', 'img');
    }

    public function validaciones()
    {
        return $this->hasMany(Validaciones::class);
    }

    public function InformacionPersonal()
    {
        return $this->hasOne(InformacionPersonal::class);
    }

    public function Escolaridad()
    {
        return $this->hasOne(Escolaridad::class);
    }

    public function Experiencia_profesional()
    {
        return $this->hasOne(Experiencia_profesional::class);
    }

    
    public function calificaciones()
    {
        return $this->hasOne(Calificaciones::class);
    }

    public function permisos(){
        return $this->hasMany(Permisos_eval::class);
    }
}