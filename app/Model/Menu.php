<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'url', 'content'];

    public function subMenus() {
        return $this->hasMany('App\Model\SubMenu')->orderBy('sort');
    }
}
