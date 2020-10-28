<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpTask extends Model
{
    protected $fillable = [
        'company_name',
        'title',
        'status',
    ];

    
}
