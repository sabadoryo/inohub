<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsText extends Model
{
    protected $fillable = [
        'news_id',
        'content',
        'order',
    ];
}
