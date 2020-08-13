<?php

namespace App\Imports;

use App\MedicalFile;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicalFilesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicalFile([
            'idMascota' => $row[0],
            'fechaVisita' => $row[1],
            'motivoVisita' => $row[2],
            'examenFisico' => $row[3],
            'diagnostico' => $row[4],
            'tratamiento' => $row[5],
            'indicaciones' => $row[6],
            'seguimiento' => $row[7],
            'temperatura' => $row[8],
            'pruebaRealizada' => $row[9],
            'operacionRealizada' => $row[10],
        ]);
    }
}
