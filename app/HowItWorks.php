<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    protected $fillable = [
        'name', 'image', 'status'
    ];
}
