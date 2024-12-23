<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    //Relación muchos as muchos
    public function rols(){
        return $this->belongsToMany(Rol::class);
    }

    //filtro scope para la action
    public function scopeAction($query, $action){
        return $query->where('action', 'like', "%$action%");
    }
}
