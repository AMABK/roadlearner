<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    
    protected $fillable = ['doc_name','doc_link', 'doc_type', 'doc_ext', 'doc_status','doc_desc'];
}
