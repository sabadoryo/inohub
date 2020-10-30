<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'project_name',
        'description',
        'foundation_year',
        'employees_count',
        'link',
        'logo_path',
    ];
}
