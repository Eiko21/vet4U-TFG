<?php

namespace App\Imports;

use App\Vaccine;
use Maatwebsite\Excel\Concerns\ToModel;

class VaccinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vaccine([
            'idMascota' => $row[0],
            'nombreVacuna' => $row[1],
            'fechaAplicacion' => $row[2],
            'vencimiento' => $row[3],
        ]);
    }
}
