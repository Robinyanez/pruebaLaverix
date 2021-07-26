<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
            DB::table('users')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $users_all = [];

        $user = User::create([
            'name'          => 'Administrador',
            'last_name'     => 'Administrador',
            'slug'          => 'administrador',
            'phone'         => '09999999999',
            'address'       => 'undefined',
            'date_of_birth' => '1994-04-12',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('123456789'),
            'role_id'       => 1,
        ]);

        $users_all[] = $user->id;
    }
}
