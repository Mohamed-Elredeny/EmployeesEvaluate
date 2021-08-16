<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class ReportEmployee extends Model
{
    protected $table = 'report_employees';
    protected $fillable =[
      'employee_id',
      'report_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class, 'report_id');
    }
    
}
