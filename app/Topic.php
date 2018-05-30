<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description_short',
        'description_long',
        'url',
        'user_id',
        'video_id'
    ];

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
