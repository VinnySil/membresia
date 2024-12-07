<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rol = new Rol();
        $rol->name = "Administrador";
        $rol->save();
        $rol->permissions()->attach([1,2,3,4]);

        $rol = new Rol();
        $rol->name = "Editor";
        $rol->save();
        $rol->permissions()->attach([2,4]);

        $rol = new Rol();
        $rol->name = "Cliente";
        $rol->save();
        $rol->permissions()->attach([4]);
    }
}
