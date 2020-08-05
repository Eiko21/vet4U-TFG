<?php

use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hours')->insert([
            [
                'idCita' => null,
                'hora' => '9:00',
            ],
            [
                'idCita' => null,
                'hora' => '10:00',
            ],
            [
                'idCita' => null,
                'hora' => '11:00',
            ],
            [
                'idCita' => null,
                'hora' => '12:00',
            ],
        ]);
    }
}
