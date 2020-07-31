<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            [
                'idDueño' => 1,
                'idVeterinario' => 3,
                'nombre' => 'Curro',
                'chip' => '345GHE8Y6ER',
                'raza' => 'Pastor Alemán',
                'especie' => 'Canina',
                'sexo' => 'Macho',
                'nacimiento' => Carbon::createFromDate(2018, 9, 27),
                'estatura' => '63cm',
                'peso' => 40.0,
                'esterilizacion' => false,
            ],
            [
                'idDueño' => 2,
                'idVeterinario' => 3,
                'nombre' => 'Tofi',
                'chip' => 'PO099AC2GM3',
                'raza' => 'Presa Canario',
                'especie' => 'Canina',
                'sexo' => 'Hembra',
                'nacimiento' => Carbon::createFromDate(2018, 9, 29),
                'estatura' => '57cm',
                'peso' => 50.0,
                'esterilizacion' => true,
            ]
        ]);
    }
}
