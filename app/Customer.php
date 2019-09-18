<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'document_type_id', 'idn', 'name', 'first_last_name', 'second_last_name', 'birth_date', 'born_city', 'address', 'address_city', 'neighborhood', 'cellphone', 'phone', 'mail', 'us_cr'
    ];
}
