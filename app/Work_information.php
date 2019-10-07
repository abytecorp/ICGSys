<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_information extends Model
{
    protected $fillable = [
        'customer_id', 'montly_income', 'activity_id', 'company_id', 'position_id', 'init_date', 'obs', 'status_id', 'us_cr'
    ];
}
