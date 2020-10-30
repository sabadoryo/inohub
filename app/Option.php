<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $incrementing = false;

    protected $fillable = ['key', 'value'];

    protected $primaryKey = 'key';

    protected $appends = [
        'value_url',
    ];

    public function getValueUrlAttribute()
    {
        return $this->value ? \Storage::disk('public')->url($this->value) : null;
    }
    public static function add($key, $value)
    {
        self::create(['key' => $key, 'value' => $value]);
    }

    public static function edit($key, $value)
    {
        self::where('key',$key)->update(['value' => $value]);
    }

    public static function editOrCreate($key, $value)
    {
        $param = self::find($key);

        if(!$param) {
            $param = new Option();
            $param->key = $key;
        }

        $param->value = $value;
        $param->save();
    }

    public static function getVal($key, $default = null)
    {
        $opt = self::find($key);

        if ($opt) {
            return $opt->value;
        }

        return $default;
    }
}
