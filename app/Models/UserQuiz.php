<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model 
{

    protected $table = 'user_quizes';
    public $timestamps = true;

    public function quiz_id()
    {
        return $this->belongsTo('Models\Quiz', 'quiz_id');
    }

}