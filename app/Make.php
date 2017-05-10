<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model {

    protected $table = 'makes';
    protected $fillable = ['make_name', 'make_category', 'make_desc', 'status', 'user_id'];

    public function mvCrsps() {
        return $this->hasMany('App\Mv_crsp');
    }
    public function mcCrsps() {
        return $this->hasMany('App\McCrsp');
    }
    public function trailerCrsps() {
        return $this->hasMany('App\TrailerCrsp');
    }

}
