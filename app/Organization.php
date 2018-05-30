<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes;

    /**
     * Get the users records associated with the organization.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
