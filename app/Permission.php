<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
