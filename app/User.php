<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos','email', 'telefono', 'password', 'idVeterinario', 'idRol', 'imagen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){
        return $this->hasMany('App\Rol', 'idRol');
    }

    public function mascotas(){
        return $this->hasMany('App\Pet');
    }

    public function citas(){
        return $this->hasMany('App\Appointment');
    }

    public function clientes(){
        return $this->hasMany('App\VetClient');
    }

    public function tareas(){
        return $this->hasMany('App\Task');
    }
}
