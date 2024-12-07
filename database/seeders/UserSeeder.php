<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->rol_id = 1;
        $user->full_name = 'Administrador general';
        $user->nick = 'AdmGeral';
        $user->nif = '26793294L';
        $user->email = 'adm_general@gmail.com';
        $user->password = 'adm123';
        $user->born_date = '2000-12-18';
        $user->save();


        $user = new User();
        $user->rol_id = 2;
        $user->full_name = 'Editor general';
        $user->nick = 'editor';
        $user->nif = '26793295M';
        $user->email = 'editor@gmail.com';
        $user->password = 'editor123';
        $user->born_date = '2000-12-18';
        $user->save();


        $user = new User();
        $user->rol_id = 3;
        $user->full_name = 'Cliente';
        $user->nick = 'cliente';
        $user->nif = '26793296N';
        $user->email = 'cliente@gmail.com';
        $user->password = 'cliente123';
        $user->born_date = '2000-12-18';
        $user->save();
    }
}
