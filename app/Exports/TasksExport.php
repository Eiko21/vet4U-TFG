<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Task;

class TasksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::all();
    }
}
