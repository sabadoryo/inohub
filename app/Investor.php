<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $appends = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return \Storage::disk('public')->url($this->photo_path);
        }

        return null;
    }

}
