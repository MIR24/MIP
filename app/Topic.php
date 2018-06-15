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
        'name' => 'required_without_all:description_short,description_long,url,video_id|nullable|string|max:255',
        'description_short' => 'required_without_all:name,description_long,url,video_id|nullable|string',
        'description_long' => 'required_without_all:name,description_short,url,video_id|nullable|string',
        'url' => 'required_without_all:name,description_long,description_short,video_id|nullable|url|max:255',
        'status' => 'nullable|string',
        'video_id' => 'required_without_all:name,description_long,description_short,url|nullable|int'
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
        if ($value) {
            return Date::createFromFormat('Y-m-d H:i:s', $value)->format('d F Y года H:i');
        }
        return $value;
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value) {
            return Date::createFromFormat('Y-m-d H:i:s', $value)->format('d F Y года H:i');
        }
        return $value;
    }
}
