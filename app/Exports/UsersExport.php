<?php

namespace App\Exports;

use App\models\admin\Certificate;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Certificate::all();
    }
}
