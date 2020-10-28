<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        'user_id',
        'program_category_id',
        'title',
        'content',
        'limit_date',
        'start_date',
        'end_date',
        'status',
        'color',
    ];

    protected $dates = [
        'limit_date',
        'start_date',
        'end_date',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(
            ProgramCategory::class,
            'program_category_id'
        );
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class)
            ->withPivot('order_number')->orderBy('order_number');
    }

    public function members()
    {
        return $this->hasMany(ProgramMember::class);
    }
}
