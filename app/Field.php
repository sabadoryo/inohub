<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    protected $fillable = [
        'type',
        'label',
        'required',
        'default_value',
        'options'
    ];

    public function forms () {
        return $this->belongsToMany(Form::class)->withTimestamps();
    }
}
