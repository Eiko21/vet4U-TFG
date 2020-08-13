<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'idDueño', 'idVeterinario','fechaCita', 'hora', 'tipoCita',
    ];

    protected $table = 'appointments';

    public function usuarios(){
        return $this->belongsTo('App\User', 'idDueño', 'idVeterinario');
    }

    public function horarios(){
        return $this->hasMany('App\Hour');
    }
}
