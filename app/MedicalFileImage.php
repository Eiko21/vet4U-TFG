<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalFileImage extends Model
{
    protected $table = 'medicalFileImages';

    public function fichamedica(){
        return $this->belongsTo('App\MedicalFile', 'idFicha');
    }
}
