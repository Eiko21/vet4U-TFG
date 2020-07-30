<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalFile extends Model
{
    protected $table = 'medicalFiles';
    public function mascota(){
        return $this->belongsTo('App\Pet', 'idMascota');
    }

    public function imagenes(){
        return $this->hasMany('App\MedicalFileImage');
    }
}
