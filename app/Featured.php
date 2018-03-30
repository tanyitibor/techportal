<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table = "featured";

    protected $fillables = [
        'article_id'
    ];

    public function article ()
    {
        return $this->belongsTo('App\Article');
    }
}
