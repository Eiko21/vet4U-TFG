<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'vaccines';
    public function mascota(){
        return $this->belongsTo('App\Pet', 'idMascota');
    }
}
