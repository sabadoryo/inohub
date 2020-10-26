<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramMember extends Model
{
    protected $fillable = [
        'user_id',
        'manager_id',
        'application_id'
    ];
}
