<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
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
    static $validateFilable = [
        'id' => 'required|max:255',
        'name' => 'required|max:255',
        'path' => 'required|max:255',
        'size' => 'required',
        'content_type' => 'required|max:255',
        'create_date' => 'required|max:255',
        'latest_update' => 'nullable|max:255',
        'resource_url' => 'required|max:255',
        'cdn_url' => 'required|max:255',
        'vod_hls' => 'required|max:255',
        'video' => 'required|max:255',
        'private' => 'required',
        'status' => 'required|max:255'
    ];
    /**
     * Get the topic record associated with the video.
     */
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }
}
