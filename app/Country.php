<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'image_url',
    ];

    /**
     * Get the organization records associated with the countru.
     */
    public function organizations()
    {
        return $this->hasMany('App\Organization');
    }
}
