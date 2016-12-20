<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'brief_description',
        'full_description',
        'shop_id'
    ];


}
