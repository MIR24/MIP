<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Download extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id',
        'user_id',
        'topic_id',
    ];

    /**
     * Get the user record associated with the download.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the organization record associated with the download.
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    /**
     * Get the topic record associated with the download.
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value) {
            return Date::createFromFormat('Y-m-d H:i:s', $value)->format('d F Y года H:i');
        }
        return $value;
    }
}
