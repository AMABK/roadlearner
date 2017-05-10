<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    
    protected $fillable = ['answer', 'question_id', 'ans_value', 'ans_status'];
    
    public function question() {
        return $this->belongsTo('App\Question');
    }
}
