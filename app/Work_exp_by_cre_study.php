<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_exp_by_cre_study extends Model
{
    protected $fillable = [
        'study_credit_id', 'work_information_id', 'status_id', 'us_cr'
    ];
}
