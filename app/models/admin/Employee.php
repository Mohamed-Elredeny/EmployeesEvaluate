<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table ='employees';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'birthdate',
        'sector_id'
    ];
    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    public function report(){
        return $this->hasMany(ReportEmployee::class,'employee_id');
    }
}
