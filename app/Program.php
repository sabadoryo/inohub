<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'audience', // Для кого программа
        'benefits', // Что получат от программы
        'requirements', // Требования для прохождения курса
        'limit_date',
        'start_date',
        'end_date',
        'status',
        'project_include'
    ];

    protected $dates = [
        'limit_date',
        'start_date',
        'end_date'
    ];

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
