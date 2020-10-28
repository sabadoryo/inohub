<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMSolutionCompany extends Model
{
    protected $guarded = [];

    public function getSolutionsArray()
    {
        if ($this->solutions) {
            return explode(';', $this->solutions);
        } else {
            return [];
        }
    }
}
