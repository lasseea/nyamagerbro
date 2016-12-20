<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_business_hours extends Model
{
    protected $table = 'shops_business_hours';

    protected $fillable = [
        'shop_id',
        'day_of_week',
        'open_time',
        'close_time',
        'closed',
    ];
}
