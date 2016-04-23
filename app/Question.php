<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    
    protected $table = 'questions';
    
    protected $fillable = ['question_type_id', 'question', 'answer_desc', 'question_status', 'image_link'];

    /**
     * Get the answers.
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

}
