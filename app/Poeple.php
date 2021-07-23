<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poeple extends Model
{
    protected $table = 'people';
    protected $fillable = [
        'name','last_name','birthday','gendre','phone_number',
        'personal_email','type'
    ];
}
