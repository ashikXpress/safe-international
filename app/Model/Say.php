<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Say extends Model
{
    protected $fillable = [
        'author', 'designation', 'image', 'description'
    ];
}
