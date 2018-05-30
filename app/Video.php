<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the topic record associated with the video.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
}
