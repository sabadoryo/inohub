<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMTaskCompany extends Model
{
    protected $guarded = [];

    public function getActualTasksArray()
    {
        if ($this->actual_tasks) {
            return explode(';', $this->actual_tasks);
        } else {
            return [];
        }
    }

    public function getEmbeddedTasksArray()
    {
        if ($this->embedded_tasks) {
            return explode(';', $this->embedded_tasks);
        } else {
            return [];
        }
    }
}
