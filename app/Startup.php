<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'short_description',
        'stage',
        'another_stage',
        'link',
        'bin',
        'legal_name',
        'ceo',
    ];
}
