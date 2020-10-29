<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'slug'];

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
