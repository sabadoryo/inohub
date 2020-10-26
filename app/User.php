<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'organization_id',
        'password',
        'is_active',
        'avatar_path',
    ];

    protected $appends = [
        'full_name',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return $this->last_name.' '.$this->first_name;
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Активный' : 'Неактивный';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar_path ? \Storage::disk('public')->url($this->avatar_path) : null;
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
