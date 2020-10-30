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
        'bin',
        'logo_path',
    ];

    public function getLogotypeUrl()
    {
        if ($this->logo_path) {
            return \Storage::disk('public')->url($this->logo_path);
        }

        return null;
    }
}
