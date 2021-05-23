<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagories extends Model
{
    protected $fillable = [
        'name', 'description', 'charges','charges_type', 'image', 'status'
    ];
}
