<?php

namespace App\Http\Controllers;

use Jenssegers\Date\Date;
use App\Topic;
use Validator;

class BaseController extends Controller
{

    protected static function getTopicsBetween($date_start = null, $date_end = null, $organization = null) {

        if (!$date_start) $date_start = Date::now()->format('Y-m-d');

        $builder = Topic::leftjoin('videos', 'videos.id', '=', 'topics.video_id')
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->join('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy('topics.created_at', 'desc');

        if ($organization) {
            $builder->where('organizations.id', $organization);
        }

        if ($date_end) {
            $builder->whereBetween('topics.created_at', [$date_end, $date_start]);
        } else {
            $builder->whereDate('topics.created_at', $date_start);
        }

        $models = $builder->get([
            'topics.id',
            'topics.created_at',
            'topics.name',
            'topics.description_short',
            'topics.description_long',
            'topics.url',
            'organizations.name as organization',
            'videos.cdn_cdn_url as video_url',
            'videos.cdn_content_type as video_content_type'
        ])
            ->groupBy(function($topic){
                return Date::createFromFormat('d F Y года H:i', $topic->created_at)->format('j F D Y');
            });
        return $models;
    }

    protected static function getTopicsByDay($days_ago = 0, $organization = null) {

        $day = $days_ago;

        if ($first_date = Topic::orderBy('created_at', 'asc')->pluck('created_at')->first()) {
            $first_date = Date::createFromFormat('d F Y года H:i', $first_date)->format('Y-m-d');
        }

        do {
            $search_date = date('Y-m-d', strtotime("-$day days"));
            if (($models = self::getTopicsBetween($search_date)) && $search_date >= $first_date) {
                if (count($models) > 0) {
                    return [
                        'models'=> $models,
                        'day'=> $day,
                    ];
                }
            } else return [
                'models'=> [],
                'day'=> $day,
            ];
        } while (++$day);
    }
}
