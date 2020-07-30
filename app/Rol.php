<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    public function usuarios(){
        return $this->belongsTo('App\User');
    }
}
