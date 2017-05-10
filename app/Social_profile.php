<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social_profile extends Model
{
    protected $table = 'social_profiles';
    
    protected $fillable = ['user_id', 'profile_id', 'media_type', 'profile'];
}
