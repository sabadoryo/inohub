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

    protected $dates = [
        'deadline'
    ];

    public function solutions()
    {
        return $this->hasMany(CorpTaskSolution::class);
    }


}
