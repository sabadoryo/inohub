<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    protected $fillable = ['form_id'];

    public function fields()
    {
        return $this->hasMany(ApplicationFormField::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
