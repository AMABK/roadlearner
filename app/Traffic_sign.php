<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traffic_sign extends Model
{
    protected $table = 'traffic_signs';


    protected  $fillable = ['sign_type','ts_status', 'sign_name', 'sign_desc', 'sign_link','sign_category'];
}
