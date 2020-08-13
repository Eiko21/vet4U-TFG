<?php

namespace App\Exports;

use App\Vaccine;
use App\Pet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class VaccinesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mascotas = Pet::where('idVeterinario',Auth::user()->id)->get();
        $vacunas = [];
        if($mascotas->count() > 0){
            foreach($mascotas as $mascota){
                $vacunas = Vaccine::all()->where('idMascota', $mascota->id);
            }
        }
        return $vacunas;
    }
}
