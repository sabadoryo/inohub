<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'manager_id',
        'application_id',
        'company_name',
        'project_name',
        'project_description',
        'address',
        'expected_result',
        'application_file_path',
        'register_certificate_file_path',
        'absence_tax_file_path',
        'status',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
