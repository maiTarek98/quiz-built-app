<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model 
{

    protected $table = 'user_answers';
    public $timestamps = true;
    protected $fillable=['user_id','question_id', 'quiz_id','user_answer','check_answer'];

    public function quiz_id()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }

     public function user_id()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function question_id()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

}