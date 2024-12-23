<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    //Relación muchos as muchos
    public function permissions(){return $this->belongsToMany(Permission::class);}

    //Relación uno a muchos
    public function users(){return $this->hasMany(User::class);}

    //filtro scope para el nombre
    public function scopeName($query, $name){

        return $query->where('name', 'like', "%$name%");
    }
}
