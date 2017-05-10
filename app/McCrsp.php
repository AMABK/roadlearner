<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McCrsp extends Model {

    protected $table = 'mc_crsps';
    protected $fillable = ['make_id', 'model', 'engine_capacity', 'crsp', 'upload_date', 'user_id', 'status'];

    public function make() {
        return $this->belongsTo('App\Make');
    }

}
