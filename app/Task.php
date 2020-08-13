<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'idVeterinario', 'tituloTarea','descripcionTarea', 'fechaTarea',
    ];

    protected $table = 'tasks';

    public function veterinario(){
        return $this->belongsTo('App\User','idVeterinario');
    }
}
