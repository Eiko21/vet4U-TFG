<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'idVeterinario' => 3,
                'tituloTarea' => 'Tarea 1',
                'descripcionTarea' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Laborum maxime doloribus commodi quisquam quos nam est nostrum ipsa voluptate architecto minima possimus eius quis tempore, 
                    cumque incidunt temporibus in sapiente!', 
                'fechaTarea' => Carbon::now()->addDay()
            ],
            [
                'idVeterinario' => 3,
                'tituloTarea' => 'Tarea 2',
                'descripcionTarea' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Laborum maxime doloribus commodi quisquam quos nam est nostrum ipsa voluptate architecto minima possimus eius quis tempore, 
                    cumque incidunt temporibus in sapiente!', 
                'fechaTarea' => Carbon::now()
            ],
            [
                'idVeterinario' => 3,
                'tituloTarea' => 'Tarea 3',
                'descripcionTarea' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Laborum maxime doloribus commodi quisquam quos nam est nostrum ipsa voluptate architecto minima possimus eius quis tempore, 
                    cumque incidunt temporibus in sapiente!',
                'fechaTarea' => Carbon::createFromDate(2020,8,8)
            ],
            [
                'idVeterinario' => 3,
                'tituloTarea' => 'Tarea 4',
                'descripcionTarea' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Laborum maxime doloribus commodi quisquam quos nam est nostrum ipsa voluptate architecto minima possimus eius quis tempore, 
                    cumque incidunt temporibus in sapiente!',
                'fechaTarea' => Carbon::createFromDate(2020,8,8)
            ],
        ]);
    }
}
