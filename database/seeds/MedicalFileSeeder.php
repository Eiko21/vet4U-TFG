<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MedicalFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicalFiles')->insert([
            [
                'idMascota' => 1,
                'fechaVisita' => Carbon::createFromDate(2020,7,30),
                'motivoVisita' => 'Lorem ipsum dolor sit amet',
                'examenFisico' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus labore exercitationem, omnis voluptate aperiam dolor nesciunt',
                'diagnostico' => 'Velit tempora placeat autem, aliquam nisi labore deserunt sunt eligendi molestiae optio voluptas laboriosam at, eos veritatis explicabo dolore. Explicabo, debitis assumenda',
                'tratamiento' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit',
                'indicaciones' => null,
                'seguimiento' => 'Revisión cada 15 días',
                'temperatura' => 35.2,
                'pruebaRealizada' => 'Radiografía',
                'operacionRealizada' => null
            ],
            [
                'idMascota' => 2,
                'fechaVisita' => Carbon::createFromDate(2020,7,31),
                'motivoVisita' => 'Corte de uñas',
                'examenFisico' => null,
                'diagnostico' => null,
                'tratamiento' => null,
                'indicaciones' => null,
                'seguimiento' => 'Volver la última semana del mes',
                'temperatura' => null,
                'pruebaRealizada' => null,
                'operacionRealizada' => null
            ],
            [
                'idMascota' => 2,
                'fechaVisita' => Carbon::createFromDate(2020,4,05),
                'motivoVisita' => 'Realización de pruebas',
                'examenFisico' => null,
                'diagnostico' => null,
                'tratamiento' => null,
                'indicaciones' => null,
                'seguimiento' => 'Regresar en 2 días para los resultados',
                'temperatura' => null,
                'pruebaRealizada' => null,
                'operacionRealizada' => null
            ],
        ]);
    }
}
