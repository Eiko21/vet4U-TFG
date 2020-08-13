<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalFile extends Model
{
    protected $fillable = [
        'idMascota', 'fechaVisita','motivoVisita', 'examenFisico', 'diagnostico', 'tratamiento', 
        'indicaciones', 'seguimiento', 'temperatura', 'pruebaRealizada', 'operacionRealizada',
    ];

    protected $table = 'medicalFiles';
    
    public function mascota(){
        return $this->belongsTo('App\Pet', 'idMascota');
    }

    public function imagenes(){
        return $this->hasMany('App\MedicalFileImage');
    }
}
