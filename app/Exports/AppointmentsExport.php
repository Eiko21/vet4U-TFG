<?php

namespace App\Exports;

use App\Appointment;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppointmentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::all()->where('idVeterinario', Auth::user()->id);
    }
}
