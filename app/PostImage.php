<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'post_id',
        'path',
        'order',
    ];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        if ($this->path) {
            return \Storage::disk('public')->url($this->path);
        }

        return null;
    }
    
}
