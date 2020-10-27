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

    public function getAdditionalDataAttribute($value)
    {
        if ($this->isJson($value)) {
            return json_decode($value);
        } else {
            return $value;
        }
    }

    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
