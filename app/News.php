<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'status',
        'published_at',
        'user_id',
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
        return $this->hasMany(NewsImages::class);
    }
    
    public function texts()
    {
        return $this->hasMany(NewsText::class);
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
