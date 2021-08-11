<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =[
      'name_ar',
      'name_en',
      'date',
      'sectors'
    ];
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
