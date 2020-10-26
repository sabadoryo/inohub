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
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'max_files_count' => 'integer',
    ];

}
