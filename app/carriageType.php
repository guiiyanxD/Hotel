<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carriageType extends Model
{
    protected $table = 'carriage_types';
    protected $fillable = [
        'name', ' description'
    ];
}
