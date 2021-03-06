<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table ='questions';
    protected $fillable = [
        'name_ar',
        'report_id'
    ];
    public function report(){
        return $this->belongsTo(Report::class);
    }
}
