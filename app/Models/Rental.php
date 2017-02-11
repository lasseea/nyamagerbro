<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'title',
        'address',
        'brief_description',
        'full_description',
        'room_img_link',
    ];
}
