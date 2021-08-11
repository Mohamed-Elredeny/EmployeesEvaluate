<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table ='certificates';
    protected $fillable = [
        'name_ar',
        'name_en',
        'program_ar',
        'program_en',
        'date',
        'number'
    ];

}
