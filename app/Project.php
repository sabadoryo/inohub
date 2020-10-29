<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'company_name',
        'link',
        'description',
        'image_path',
        'status',
        'published_at',
    ];
    
    protected $dates = [
        'published_at',
    ];
}
