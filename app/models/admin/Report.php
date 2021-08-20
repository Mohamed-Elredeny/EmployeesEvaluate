<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =[
      'name_ar',
      'from',
      'to',
      'sectors'
    ];
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function ReportSector(){
        return $this->hasMany(ReportSector::class);
    }
}
