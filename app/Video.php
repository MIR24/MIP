<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cdn_id',
        'cdn_name',
        'cdn_path',
        'cdn_size',
        'cdn_content_type',
        'cdn_create_date',
        'cdn_latest_update',
        'cdn_resource_url',
        'cdn_cdn_url',
        'cdn_vod_hls',
        'cdn_video',
        'cdn_private',
        'cdn_status'
    ];

    /**
     * Get the topic record associated with the video.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
}
