<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table ='managers';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'birthdate',
        'image',
        'sector_id'
    ];
    public function sector(){
        return $this->belongsTo(Sector::class);

    }
}
