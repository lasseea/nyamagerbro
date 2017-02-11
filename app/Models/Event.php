<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'date',
        'brief_description',
        'full_description',
        'event_img_link',
        'small_img_link',
    ];
}
