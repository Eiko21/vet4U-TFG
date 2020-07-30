<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'rol' => 'admin',
                'seleccionable' => false
            ],
            [
                'rol' => 'veterinario',
                'seleccionable' => false
            ],
            [
                'rol' => 'cliente',
                'seleccionable' => false
            ],
        ]);
    }
}
