<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'idMascota', 'nombreVacuna', 'fechaAplicacion', 'vencimiento', 
    ];

    protected $table = 'vaccines';
    public function mascota(){
        return $this->belongsTo('App\Pet', 'idMascota');
    }
}
