<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $table = 'hours';

    public function citas(){
        return $this->belongsTo('App\Appointment', 'idCita');
    }
}
