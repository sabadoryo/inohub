<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        'entity_id',
        'entity_model'
    ];

    public function entity()
    {
        return $this->morphTo(
            __FUNCTION__,
            'entity_model',
            'entity_id'
        );
    }

}
