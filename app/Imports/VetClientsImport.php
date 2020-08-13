<?php

namespace App\Imports;

use App\VetClient;
use Maatwebsite\Excel\Concerns\ToModel;

class VetClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VetClient([
            'idVeterinario' => $row[0],
            'idDueño' => $row[1],
            'nombreCliente' => $row[2],
            'email' => $row[3],
            'telefono' => $row[4],
            'nombreMascota' => $row[5],
        ]);
    }
}
