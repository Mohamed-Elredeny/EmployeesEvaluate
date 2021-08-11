<?php

namespace App\Imports;

use App\models\admin\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Certificate([
            'name_en'=>$row['name_en'],
            'name_ar'=> $row['name_ar'],
            'date'=>  $row['date'],
            'program_ar'=> $row['program_ar'],
            'program_en'=> $row['program_en'],
            'number'=> $row['number'],

        ]);
    }
}
