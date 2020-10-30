<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'organization_id',
        'user_id',
        'title',
        'short_description',
        'content',
        'limit_date',
        'status',
        'published_at',
    ];

    protected $dates = [
        'limit_date',
        'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function passport()
        {
            return $this->morphOne(Passport::class, 'entity');
        }

    public function forms()
    {
        return $this->belongsToMany(Form::class)
            ->withPivot('order_number')
            ->orderBy('order_number');
    }

    public function members()
    {
        return $this->hasMany(ProgramMember::class);
    }
}
