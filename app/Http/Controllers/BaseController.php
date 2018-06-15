<?php

namespace App\Http\Controllers;

use Jenssegers\Date\Date;
use App\Topic;
use Validator;
use DB;

class BaseController extends Controller
{

    protected static function getTopicsBetween($date_start = null, $date_end = null, $organizations = null, $countries = null, $title = null) {

        $builder = Topic::leftjoin('videos', 'videos.id', '=', 'topics.video_id')
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->join('organizations', 'organizations.id', '=', 'users.organization_id')
            ->join('countries', 'organizations.country_id', '=', 'countries.id')
            ->orderBy('topics.published_at', 'desc');

        if ($organizations) {
            is_array($organizations) ?: $organizations = explode(',', $organizations);
            $builder->whereIn('organizations.id', [$organizations]);
        }
        if ($countries) {
            is_array($countries) ?: $countries = explode(',', $countries);
            $builder->whereIn('countries.id', $countries);
        }

        if ($date_end) {
            $builder->whereRaw(DB::raw("DATE(topics.created_at) >= '$date_start'"))
                ->whereRaw(DB::raw("DATE(topics.created_at) <= '$date_end'"));
        } else if ($date_start) {
            $builder->whereDate('topics.published_at', $date_start);
        }

        if ($title) {
            $builder->where('topics.name', 'LIKE', "%$title%")->orWhere('topics.description_short', 'LIKE', "%$title%");
        }

        $models = $builder->get([
            'topics.id',
            'topics.published_at',
            'topics.name',
            'topics.description_short',
            'topics.description_long',
            'topics.url',
            'organizations.name as organization',
            'organizations.image_url_sm as logo',
            'countries.name as country',
            'countries.image_url as flag',
            'videos.cdn_cdn_url as video_url',
            'videos.cdn_content_type as video_content_type'
        ])
            ->groupBy(function($topic){
                return Date::createFromFormat('d F Y года H:i', $topic->published_at)->format('j F D Y');
            });
        return $models;
    }

    protected static function getTopicsByDay($days_ago = 0, $organizations = null) {

        $day = $days_ago;

        if ($first_date = Topic::orderBy('published_at', 'asc')->pluck('published_at')->first()) {
            $first_date = Date::createFromFormat('d F Y года H:i', $first_date)->format('Y-m-d');
        }

        do {
            $search_date = date('Y-m-d', strtotime("-$day days"));
            if (($models = self::getTopicsBetween($search_date, null, $organizations)) && $search_date >= $first_date) {
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
