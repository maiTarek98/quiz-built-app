<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model 
{

    protected $table = 'user_quizes';
    public $timestamps = true;
    protected $fillable=['user_id','quiz_id', 'score'];

    public function quiz_id()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }


 public function user_id()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}