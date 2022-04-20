<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model 
{

    protected $table = 'quizes';
    public $timestamps = true;

    protected $fillable=['user_id','title', 'no_question','score_question','passing_score','status'];
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'quiz_id');
    }

}