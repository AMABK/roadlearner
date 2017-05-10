<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mv_crsp extends Model
{
    protected $table = 'mv_crsps';
    
    protected $fillable = ['make_id', 'model', 'engine_capacity', 'body_type', 'drive_config', 'seating', 'fuel', 'gvw', 'crsp', 'upload_date','status'];
    
    public function make() {
        return $this->belongsTo('App\Make');
    }
}
