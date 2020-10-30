<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'organization_id',
        'content',
        'status',
        'location',
        'from_salary',
        'to_salary',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
