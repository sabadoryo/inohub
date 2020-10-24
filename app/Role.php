<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
