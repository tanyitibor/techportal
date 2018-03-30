<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTag extends Model
{
    protected $fillables = [
        'tag_id'
    ];

    public function tag ()
    {
        return $this->belongsTo('App\Tag');
    }
}
