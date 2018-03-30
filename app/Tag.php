<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillables = [
        'name', 'slug',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tags');
    }

    public $timestamps = false;

    public function getRouteKeyName() {
        return 'slug';
    }
}
