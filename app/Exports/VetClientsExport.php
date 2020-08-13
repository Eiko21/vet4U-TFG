<?php

namespace App\Exports;

use App\VetClient;
use Maatwebsite\Excel\Concerns\FromCollection;

class VetClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VetClient::all();
    }
}
