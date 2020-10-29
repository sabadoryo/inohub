<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpTaskSolution extends Model
{
    protected $fillable = [
        'company_name',
        'company_site',
        'description',
        'task_id'
    ];

    public function task()
    {
        return $this->belongsTo(CorpTask::class, 'task_id');
    }
}
