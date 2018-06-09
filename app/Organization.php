<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * Get the users records associated with the organization.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the country record associated with the organization.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
