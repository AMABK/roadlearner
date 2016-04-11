<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
       protected $table = 'videos';


    protected  $fillable = ['video_type', 'video_name', 'video_desc', 'video_link'];
}
