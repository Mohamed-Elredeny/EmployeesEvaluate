<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Manager extends Authenticatable
{
    protected $guard ='manager';
    protected $table ='managers';
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
}
