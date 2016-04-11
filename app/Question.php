<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /**
     * Get the answers.
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

}
