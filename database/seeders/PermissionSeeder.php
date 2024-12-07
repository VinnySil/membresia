<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = new Permission();
        $permission->action = 'Create';
        $permission->save();

        $permission = new Permission();
        $permission->action = 'Update';
        $permission->save();

        $permission = new Permission();
        $permission->action = 'Delete';
        $permission->save();

        $permission = new Permission();
        $permission->action = 'Read';
        $permission->save();

        $permission = new Permission();
        $permission->action = 'Buy';
        $permission->save();
    }
}
