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
        'status',
    ];

    protected $appends = [
      'logotype_url',
    ];

    public function getLogotypeUrlAttribute()
    {
        if ($this->logo_path) {
            return \Storage::disk('public')->url($this->logo_path);
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($q, $search)
    {
        $q->where(function ($q) use ($search) {
            $q->where(
                'company_name',
                'like',
                '%'.$search.'%'
            )->orWhere('bin', $search);
        });
    }
}
