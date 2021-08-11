<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = [
        'name_ar',
        'name_en',
        'city',
        'image'
    ];
}
