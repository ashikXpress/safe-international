<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $fillable = ['menu_id', 'name', 'url', 'content'];
}
