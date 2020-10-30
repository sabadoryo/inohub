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
        'status',
    ];

    protected $appends = [
      'logo_url',
    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo_path ? \Storage::disk('public')->url($this->logo_path) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
