<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image_path',
        'status',
        'published_at'
    ];
    
    protected $appends = [
        'image_url',
    ];
    
    protected $dates = [
        'published_at',
    ];
    
    public function getImageUrlAttribute()
    {
        return $this->image_path ? \Storage::disk('public')->url(
            $this->image_path
        ) : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
