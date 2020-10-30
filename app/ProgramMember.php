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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
