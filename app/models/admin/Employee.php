<?php

namespace App\models\admin;

/*use Illuminate\Database\Eloquent\Model;*/
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;
    protected $guard = 'employee';
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
