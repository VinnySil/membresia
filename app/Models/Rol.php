<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Relación muchos as muchos
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
