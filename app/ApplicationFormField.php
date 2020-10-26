<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationFormField extends Model
{
    protected $fillable = ['form_field_id', 'value'];

    public function formField()
    {
        return $this->belongsTo(FormField::class);
    }
}
