<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    /**
     * Get the topic record associated with the video.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
}
