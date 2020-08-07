<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VetClient extends Model
{
    protected $table = 'vetClients';

    public function veterinario(){
        return $this->belongsTo('App\User', 'idVeterinario');
    }
}
