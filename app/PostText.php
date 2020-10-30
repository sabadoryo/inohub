<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostText extends Model
{
    protected $fillable = [
        'post_id',
        'content',
        'order',
    ];
}
