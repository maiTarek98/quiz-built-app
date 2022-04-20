<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model 
{

    protected $table = 'user_answers';
    public $timestamps = true;

    public function quiz_id()
    {
        return $this->belongsTo('Models\Quiz', 'quiz_id');
    }

    public function question_id()
    {
        return $this->belongsTo('Models\Question', 'question_id');
    }

}