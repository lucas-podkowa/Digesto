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
            'email' => 'lucaspodkowa@fio.unam.edu.ar',
            'password' => bcrypt('aspire_')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Lucas Visitante',
            'email' => 'lucaspodkowa@gmail.com',
            'password' => bcrypt('aspire_')
        ])->assignRole('Visitante');
    }
}
