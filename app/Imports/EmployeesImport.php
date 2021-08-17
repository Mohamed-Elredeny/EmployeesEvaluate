<?php

namespace App\Imports;

use App\models\admin\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'fname'=>$row['fname'],
            'lname'=> $row['lname'],
            'sector_id'=>  $row['sector_id'],
            'email'=> $row['email'],
            'password'=> $row['password'],
            'phone'=> $row['phone'],
            'birthdate'=>  $row['birthdate'],

        ]);
    }
}
