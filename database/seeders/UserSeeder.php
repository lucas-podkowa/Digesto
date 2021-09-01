<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lucas Podkowa',
            'email' => 'lucaspodkowa@gmail.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Administrador');

        User::factory(2)->create();
    }
}
