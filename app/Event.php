<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'image_path',
        'start_date',
        'status',
        'published_at',
        'user_id',
        'organization_id',
    ];

    protected $dates = [
        'start_date',
        'published_at'
    ];

    protected $appends = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->image_path ? \Storage::disk('public')->url(
            $this->image_path
        ) : null;
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class)
            ->withPivot('order_number')->orderBy('order_number');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function passport()
    {
        return $this->morphOne(Passport::class, 'entity');
    }
}
