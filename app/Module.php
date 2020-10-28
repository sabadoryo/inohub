<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
