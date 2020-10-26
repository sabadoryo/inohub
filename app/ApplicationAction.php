<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAction extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'message',
        'additional_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
