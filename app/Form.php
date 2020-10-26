<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function fields()
    {
        return $this->hasMany(FormField::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
