<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        // The relationship function fails on the following line;
        return $this->belongsTo('App\User', 'userID', 'id');
    }

    public function posts()
    {
        // The relationship function fails on the following line:
        return $this->hasMany('App\Post', 'article_id');
    }
}
