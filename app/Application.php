<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'entity_model',
        'entity_id',
        'status',//open,process,accepted,rejected
        'manager_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function entity()
    {
        return $this->morphTo(
            __FUNCTION__,
            'entity_model',
            'entity_id'
        );
    }

    public function forms()
    {
        return $this->hasMany(ApplicationForm::class);
    }

    public function actions()
    {
        return $this->hasMany(ApplicationAction::class);
    }

    public function get()
    {

    }
}
