<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
        //Relación muchos as muchos
        public function rols(){
            return $this->belongsToMany(Rol::class);
        }
}
