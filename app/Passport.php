<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = [
        'content',
        'type',
        'program_id',
        'event_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
