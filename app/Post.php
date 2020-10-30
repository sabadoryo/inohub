<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'status',
        'published_at'
    ];
    
    protected $dates = [
        'published_at',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
    
    public function texts()
    {
        return $this->hasMany(PostText::class);
    }
    
    public function getDataAttribute()
    {
        $data = [];
        
        foreach ($this->texts as $text) {
            $data[+$text->order] = [
                'type' => 'text',
                'content' => $text->content
            ];
        }
        
        foreach ($this->images as $image) {
            $data[+$image->order] = [
                'type' => 'image',
                'image_id' => $image->id,
                'image' => \Storage::disk('public')->url($image->path),
                'path' => $image->path
            ];
        }
        
        ksort($data);
        
        return array_values($data);
    }
}
