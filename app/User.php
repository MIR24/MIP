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
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the topic record associated with the user.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }

    /**
     * Get the organization record associated with the user.
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
