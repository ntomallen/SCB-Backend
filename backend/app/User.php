<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = array('id');

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        // This relationship fails on the follwing line:
        return $this->hasMany('App\Article', 'userID', 'id');
    }

    public function posts()
    {
        // The relationship function fails on the following line:
        return $this->hasMany('App\Post', 'user_id', 'id');
    }
}
