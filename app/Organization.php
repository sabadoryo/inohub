<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'country_code',
        'city_code',
        'logo_path',
    ];

    protected $appends = [
        'logo_url',
        'country_name',
        'city_name'
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function hasModule($moduleSlug)
    {
        foreach ($this->modules as $module) {
            if ($module->slug == $moduleSlug) {
                return true;
            }
        }

        return false;
    }

    public function getLogoUrlAttribute()
    {
        return \Storage::disk('public')->url($this->logo_path);
    }

    public function getCountryNameAttribute()
    {
        $countries = getCountriesList();

        foreach ($countries as $country) {
            if ($country['code'] == $this->country_code) {
                return $country['name'];
            }
        }

        return null;
    }

    public function getCityNameAttribute()
    {
        $countries = getCountriesList();

        foreach ($countries as $country) {
            if ($country['code'] == $this->country_code) {
                foreach ($country['cities'] as $city) {
                    if ($city['code'] == $this->city_code) {
                        return $city['name'];
                    }
                }
            }
        }

        return null;
    }

}
