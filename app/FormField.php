<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{//
    protected $fillable = [
        'type',
        'label',
        'is_required',
        'options',
        'prompt',
        'other_option',
        'max_files_count',
        'file_allows',
        'file_types',
        'example_files_path',
        'example_files_name',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'max_files_count' => 'integer',
        'options' => 'array',
    ];

    public function getExampleFilesNameAttribute($value)
    {
        if ($this->isJson($value)) {
            return json_decode($value);
        } else {
            return $value;
        }
    }

    public function getExampleFilesPathAttribute($value)
    {
        if ($this->isJson($value)) {
            return json_decode($value);
        } else {
            return $value;
        }
    }


    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
