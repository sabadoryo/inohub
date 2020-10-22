<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'short_description',
        'content',
        'limit_date',
        'start_date',
        'end_date',
        'status',
    ];

    protected $dates = [
        'limit_date',
        'start_date',
        'end_date'
    ];

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
