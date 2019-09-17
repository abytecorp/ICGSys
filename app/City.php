<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function getDepartament()
    {
        return $this->belongsTo(Departament::class, 'id_departament');
    }
}
