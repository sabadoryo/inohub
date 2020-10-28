<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImages extends Model
{
    protected $fillable = [
        'news_id',
        'path',
        'order',
    ];
    
//    protected $appends = [
//        'image_url',
//    ];
    
//    public function getImagesUrlAttribute()
//    {
//        return $this->path ? \Storage::disk('public')->url(
//            $this->path
//        ) : null;
//    }
}
