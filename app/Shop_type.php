<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_type extends Model
{
    protected $table = 'shop_types';

    protected $fillable = [
        'shop_type',
    ];
}
