<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
            DB::table('roles')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $role_all = [];

        $rol = Role::create([
            'name'          => 'Administrador',
            'slug'          => 'administrador',
        ]);

        $role_all[] = $rol->id;

        $rol = Role::create([
            'name'          => 'Usuario',
            'slug'          => 'usuario',
        ]);

        $role_all[] = $rol->id;

        $rol = Role::create([
            'name'          => 'Invitado',
            'slug'          => 'invitado',
        ]);

        $role_all[] = $rol->id;
    }
}
