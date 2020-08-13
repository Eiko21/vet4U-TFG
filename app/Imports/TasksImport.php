<?php

namespace App\Imports;

use App\Task;
use Maatwebsite\Excel\Concerns\ToModel;

class TasksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Task([
            'idVeterinario' => $row[0],
            'tituloTarea' => $row[1],
            'descripcionTarea' => $row[2],
            'fechaTarea' => $row[3],
        ]);
    }
}
