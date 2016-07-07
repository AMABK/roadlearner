<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrailerCrsp extends Model {

    protected $table = 'trailer_crsps';
    protected $fillable = ['make_id', 'model', 'hst', 'axel_weight', 'crsp', 'upload_date', 'user_id', 'status'];

    public function make() {
        return $this->belongsTo('App\Make');
    }

}
