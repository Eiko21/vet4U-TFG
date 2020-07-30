<?php

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
        DB::table('users')->insert([
            [
                'nombre' => 'Juan',
                'apellidos' => 'Medina Mendoza',
                'email' => 'juan@gmail.com',
                'telefono' => '111222333',
                'password' => Hash::make('soyjuan'),
                'idVeterinario' => 2,
                'idRol' => 3
            ],
            [
                'nombre' => 'Veterinario',
                'apellidos' => null,
                'email' => 'veterinario@gmail.com',
                'telefono' => '444555666',
                'password' => Hash::make('soyvet'),
                'idVeterinario' => null,
                'idRol' => 2
            ],
            [
                'nombre' => 'Administrador',
                'apellidos' => null,
                'email' => 'admin@vetforu.com',
                'telefono' => null,
                'password' => Hash::make('soyadmin'),
                'idVeterinario' => null,
                'idRol' => 1
            ]
        ]);
    }
}
