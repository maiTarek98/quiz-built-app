<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{

    protected $table = 'questions';
    public $timestamps = true;
    protected $fillable=['user_id','option_1', 'option_2','option_3','option_4','quiz_id','question','correct_option'];

    public function quiz_id()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }

    public function user_id()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}