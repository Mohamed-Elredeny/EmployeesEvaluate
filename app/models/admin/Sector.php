<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = [
        'id',
        'name_ar',
        'city',
    ];
}
