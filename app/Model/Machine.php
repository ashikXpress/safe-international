<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable=['model','type','image1','image2','image3','capacity','description'];
}
