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
    public function reportSector(){
        return $this->hasMany(ReportSector::class, 'sector_id');
    }

    public function employee(){
        return $this->hasMany(Employee::class, 'sector_id');
    }
}
