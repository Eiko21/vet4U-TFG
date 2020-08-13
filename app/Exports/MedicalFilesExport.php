<?php

namespace App\Exports;

use App\MedicalFile;
use App\Pet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class MedicalFilesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mascotas = Pet::where('idVeterinario',Auth::user()->id)->get();
        $historial = [];
        if($mascotas->count() > 0){
            foreach($mascotas as $mascota){
                $historial = MedicalFile::all()->where('idMascota', $mascota->id);
            }
        }
        return $historial;
    }
}
