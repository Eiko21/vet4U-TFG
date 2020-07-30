<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    public function usuarios(){
        return $this->belongsTo('App\User', 'idDueño', 'idVeterinario');
    }

    public function fichasmedicas(){
        return $this->hasMany('App\MedicalFile');
    }

    public function vacunas(){
        return $this->hasMany('App\Vaccine');
    }
}
