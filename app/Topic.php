<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * Get the user record associated with the topic.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the video record associated with the topic.
     */
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
