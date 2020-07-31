<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insert([
            [
                'idMascota' => 1,
                'nombreVacuna' => 'Vacuna 1',
                'fechaAplicacion' => Carbon::createFromDate(2019,12,12),
                'vencimiento' => Carbon::createFromDate(2020,2,12)
            ],
            [
                'idMascota' => 1,
                'nombreVacuna' => 'Vacuna 2',
                'fechaAplicacion' => Carbon::createFromDate(2020,3,10),
                'vencimiento' => Carbon::createFromDate(2020,5,10)
            ],
            [
                'idMascota' => 2,
                'nombreVacuna' => 'Vacuna 3',
                'fechaAplicacion' => Carbon::createFromDate(2020,2,20),
                'vencimiento' => Carbon::createFromDate(2020,4,20)
            ],
            [
                'idMascota' => 2,
                'nombreVacuna' => 'Vacuna 4',
                'fechaAplicacion' => Carbon::createFromDate(2020,7,30),
                'vencimiento' => Carbon::createFromDate(2020,9,30)
            ],
        ]);
    }
}
