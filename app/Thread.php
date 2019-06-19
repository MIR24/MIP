<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'image_url',
    ];

    /**
     * Get the topic record associated with the thread.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
}
