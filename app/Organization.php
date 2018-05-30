<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * Get the users records associated with the organization.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
