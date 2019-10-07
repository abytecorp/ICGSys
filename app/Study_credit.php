<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study_credit extends Model
{
    protected $fillable = [
        'customer_id', 'w_information_id', 'st_cre_state_id', 'us_cr'
    ];
}
