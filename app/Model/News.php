<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'image', 'author', 'filename', 'description', 'uploaded_at'
    ];
}
