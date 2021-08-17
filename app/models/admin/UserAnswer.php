<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $table = 'user_answers';
    protected $fillable =[
      'report_employee_id',
      'question_id',
      'answer_id',
    ];
}
