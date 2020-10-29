<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpTaskSolution extends Model
{
    public function task()
    {
        return $this->belongsTo(CorpTask::class);
    }
}
