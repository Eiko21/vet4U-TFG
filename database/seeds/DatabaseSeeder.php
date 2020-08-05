<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            PetSeeder::class,
            MedicalFileSeeder::class,
            VaccineSeeder::class,
            HourSeeder::class,           
        ]);
    }
}
