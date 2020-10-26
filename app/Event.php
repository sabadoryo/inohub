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
        'end_date',
    ];
}
