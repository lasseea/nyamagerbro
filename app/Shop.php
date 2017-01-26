<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'logo_img_link',
        'website',
        'google_maps_url',
        'shop_type_id',
    ];
}
