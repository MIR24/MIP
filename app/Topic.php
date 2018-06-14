<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

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
        'video_id',
        'status',
        'published_at',
        'image_url',
    ];

    static $validateActive = [
        'name' => 'required|string|max:255',
        'description_short' => 'required|string',
        'description_long' => 'required|string',
        'url' => 'required|url|max:255',
        'status' => 'required|string',
        'video_id' => 'required|int'
    ];

    static $validateInactive = [
        'name' => 'nullable|string|max:255',
        'description_short' => 'nullable|string',
        'description_long' => 'nullable|string',
        'url' => 'nullable|url|max:255',
        'status' => 'nullable|string',
        'video_id' => 'nullable|int'
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

    public function getPublishedAtAttribute($value)
    {
        return Date::createFromFormat('Y-m-d H:i:s', $value)->format('d F Y года H:i');
    }

    public function getCreatedAtAttribute($value)
    {
        return Date::createFromFormat('Y-m-d H:i:s', $value)->format('d F Y года H:i');
    }
}
