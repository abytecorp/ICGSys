<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'bs_name', 'acronym', 'nit', 'verification_digit', 'address', 'phone1', 'phone2', 'phone3', 'status_id',
         'email', 'web', 'logo', 'us_cr', 'city_id'
    ];
}
