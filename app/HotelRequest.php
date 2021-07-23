<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRequest extends Model
{
    protected $table = 'hotel_requests';
    protected $fillable = [
        'client_id','city','date_in','date_out',
        'hotel_id','qty_adults','rooms','ubication'
    ];
}
