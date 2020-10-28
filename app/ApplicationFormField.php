<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationFormField extends Model
{
    protected $fillable = ['form_field_id', 'value', 'type'];

    public function formField()
    {
        return $this->belongsTo(FormField::class);
    }

    public function getValueAttribute($value)
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
