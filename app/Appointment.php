<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    public function usuarios(){
        return $this->belongsTo('App\User', 'idDueño', 'idVeterinario');
    }
}
