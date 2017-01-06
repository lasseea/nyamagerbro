<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getOpenTimeAttribute($value){
        if ($value != null) {
            return (new Carbon($value))->format('H:i');
        }
    }

    public function getCloseTimeAttribute($value){
        if ($value != null) {
            return (new Carbon($value))->format('H:i');
        }
    }

}
