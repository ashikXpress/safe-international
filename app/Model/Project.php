<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'type', 'title', 'image', 'description'
    ];
}
