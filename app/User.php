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
        'is_admin',
        'last_login',
        'avatar_path',
    ];

    protected $appends = [
        'full_name',
        'avatar_url',
        'initials',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'email_verified_at',
        'last_login',
    ];

    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar_path ? \Storage::disk('public')->url(
            $this->avatar_path
        ) : null;
    }

    public function getInitialsAttribute()
    {
        $r = mb_substr($this->last_name, 0, 1) . mb_substr($this->first_name, 0, 1);
        return mb_strtoupper($r);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function scopeSearch($q, $search)
    {
        $q->where(function ($q) use ($search) {
            $q->where(
                \DB::raw('CONCAT_WS(" ", last_name, first_name)'),
                'like',
                '%' . $search .'%'
            )->orWhere('email', $search)
                ->orWhere('phone', $search);
        });
    }
}
