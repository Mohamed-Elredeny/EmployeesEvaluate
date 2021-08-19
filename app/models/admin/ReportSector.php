<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class ReportSector extends Model
{
    protected $table = 'report_sectors';
    protected $fillable =[
      'sector_id',
      'report_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class, 'report_id');
    }
}
