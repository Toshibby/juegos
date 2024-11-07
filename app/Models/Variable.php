<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $guarded=['id'];



    protected static function boot()
    {
        parent::boot();

        static::saving(function ($variable) {
            $variable->var_ind_squared = $variable->var_ind ** 2;
            $variable->var_dep_squared = $variable->var_dep ** 2;
            $variable->var_ind_dep_product = $variable->var_ind * $variable->var_dep;
        });
    }
}
