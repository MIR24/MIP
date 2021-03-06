<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Topic;
use App\Organization;
use App\Country;
use Validator;
use App\Helpers\Helper;
use App\Video;
use App\Thread;

class TopicController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datatables.topic', [
            'updateFailed' => \Session::get('updateFailed'),
            'id' => \Session::get('id'),
            'videoTag' => \Session::get('videoTag')
        ]);
    }

    /**
     * Display a listing of the resource as JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $query = $request->all();
        $query['take'] = config('constants.search_limit');
        $days = self::getTopicsByFilter($query);

        return view('columns.topics', [
            'days' => $days,
            'current'=> Date::now()->format('d F D Y'),
        ]);

    }
    public function indexDT(Request $request)
    {
        $validatedData = $request->validate([
            'pagination' => 'required|array',
            'sort' => 'nullable|required|array',
            'query' => 'nullable|array|max:255',
            'status' => 'max:255'
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'please login'], 404);
        }
        if (!$user->hasRole('admin')) {
            if (!$user->organization) {
                return response()->json(['error' => 'user has no organization'], 404);
            }
        }

        $builder = Topic::leftJoin('videos', 'videos.id', '=', 'topics.video_id')
            ->leftJoin('threads', 'threads.id', '=', 'topics.thread_id')
            ->leftJoin('users', 'users.id', '=', 'topics.user_id')
            ->leftJoin('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy($validatedData['sort']['field'], $validatedData['sort']['sort']);

        if (!$user->hasRole('admin')) {
            $builder->where('organizations.id', $user->organization->id);
        }

        if (!empty($validatedData['status']) && $validatedData['status'] != 'all') {
            if ($validatedData['status'] == 'inactive') {
                $builder->where('topics.status', 'inactive');
            }
        }

        if (!empty($validatedData['query'])) {
            $query = $validatedData['query'];

            if (!empty($query['created_at'])) {
                $dates = explode(config('constants.datepicker_delimiter'), $query['created_at']);
                if (count($dates) > 1) {
                    $start = Date::parse($dates[0])->hour(0)->minute(0)->second(0);
                    $end = Date::parse($dates[1])->hour(23)->minute(59)->second(59);
                    $builder->whereBetween('topics.created_at', [$start, $end]);
                } else {
                    $start = Date::parse($dates[0])->hour(0)->minute(0)->second(0);
                    $builder->whereDate('topics.created_at', '>', $start);
                }
            }

            if (!empty($query['organization'])) {
                $builder->where('organizations.name', 'like', '%'.$query['organization'].'%');
            }

            if (!empty($query['name'])) {
                $builder->where('topics.name', 'like', '%'.$query['name'].'%');
            }
        }

        $total = $builder->count();
        $pages = $total / $validatedData['pagination']['perpage'];

        $meta = [
            'page' => $validatedData['pagination']['page'],
            'perpage' => $validatedData['pagination']['perpage'],
            'total' => $total,
            'pages' => $pages,
            'sort' => $validatedData['sort']['sort'],
            'field' => $validatedData['sort']['field']
        ];

        $data = $builder
            ->skip($validatedData['pagination']['perpage'] * ($validatedData['pagination']['page']-1))
            ->take($validatedData['pagination']['perpage'])
            ->get([
                'topics.id',
                'topics.created_at',
                'topics.name',
                'topics.description_short',
                'topics.description_long',
                'topics.url',
                'topics.status',
                'organizations.name as organization',
                'videos.cdn_cdn_url as video_url',
                'videos.cdn_content_type as video_content_type',
                'threads.id as thread_id',
            ]);

        return response()->json([
            'meta' => $meta,
            'data' => $data
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        $organizations = Organization::join('countries', 'organizations.country_id', '=', 'countries.id')
            ->get([
                'organizations.id as id',
                'organizations.name as name',
                'organizations.name_short as name_short',
                'organizations.image_url_lg as logo',
                'countries.image_url as flag',
                'countries.name as country_name'
            ]);
        $models = [];
        for ($days = 0, $ago = 0; $days < config('constants.days_on_main'); ++$days) {
            $set = self::getTopicsByDay($ago);
            $models = array_merge($models, is_array($set['models']) ? $set['models'] : $set['models']->toArray());
            $ago = $set['day']+1;
        }
        $vars = [
            'days' => $models,
            'next_day' => $ago,
            'current'=> Date::now()->format('j F D Y'),
            'organizations' => $organizations,
        ];

        return view('indexes.index', $vars);
    }

    /**
     * Display wow index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWoWFront()
    {
        $threads  = 2;
        $organizations = Organization::join('countries', 'organizations.country_id', '=', 'countries.id')
            ->get([
                'organizations.id as id',
                'organizations.name as name',
                'organizations.name_short as name_short',
                'organizations.image_url_lg as logo',
                'countries.image_url as flag',
                'countries.name as country_name'
            ]);
        $models = [];
        for ($days = 0, $ago = 0; $days < config('constants.days_on_main'); ++$days) {
            $set = self::getTopicsByDay($ago, null, $threads);
            $models = array_merge($models, is_array($set['models']) ? $set['models'] : $set['models']->toArray());
            $ago = $set['day']+1;
        }
        $vars = [
            'days' => $models,
            'next_day' => $ago,
            'current'=> Date::now()->format('j F D Y'),
            'organizations' => $organizations,
            'threads' => $threads,
        ];

        return view('indexes.wow_index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'url.url' => 'Ссылка должна выглядеть так: ftp://example.com',
        ];

        if ($request->get('status')) {
            $validator = Validator::make($request->all(), Topic::$validateActive, $messages);
        } else {
            $validator = Validator::make($request->all(), Topic::$validateInactive, $messages);
        }

        if ($validator->fails()) {
            return redirect('topics#m_modal_create_topic')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->getData();

        if (array_key_exists('status', $validatedData)) {
            $validatedData['status'] = 'active';
            $validatedData['published_at'] = date("Y-m-d H:i:s");
        } else {
            $validatedData['status'] = 'inactive';
            $validatedData['published_at'] = null;
        }

        if (isset($validatedData['platform_id']) && $preview = VideoController::getCover($validatedData['platform_id'])) {
            $validatedData['image_url'] = $preview;
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Пожалуйста, войдите в систему'
                    ]
                );
        }
        if (!$user->hasRole('admin')) {
            if (!$user->organization) {
                return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'У пользователя нет организации'
                    ]
                );
            }
        }
        if ($user->hasRole('admin')) {
            $org = Organization::find($validatedData['organization']);
            if (empty($org)) {
                return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Организация не найдена'
                    ]
                );
            }
            $fakeUser = $org->users()->first();
            $validatedData['user_id'] = $fakeUser->id;
        } else {
            $validatedData['user_id'] = $user->id;
        }

        if (empty($validatedData['thread_id']) || Thread::where('id', $validatedData['thread_id'])->doesntExist()) {
            $validatedData['thread_id'] = null;
        }

        Topic::create($validatedData);

        return redirect()
            ->route('topics.index')
            ->with(
                'msg',
                [
                    'type' => 'success',
                    'text' => 'Сюжет создан'
                ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == null || !is_numeric($id)) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Сюжет не существует'
                    ]
                );
        }

        $topic = Topic::find($id);

        if (!$topic) {
            return response()->json(['error' => 'topic not found'], 404);
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Пожалуйста, войдите в систему'
                    ]
                );
        }
        if (!$user->hasRole('admin')) {
            if (!$user->organization) {
                return redirect()
                    ->route('topics.index')
                    ->with(
                        'msg',
                        [
                            'type' => 'error',
                            'text' => 'У пользователя нет организации'
                        ]
                    );
            }
            if ($topic->user->organization->id != $user->organization->id) {
                return redirect()
                    ->route('topics.index')
                    ->with(
                        'msg',
                        [
                            'type' => 'error',
                            'text' => 'Недостаточно прав для изменения'
                        ]
                    );
            }
        }

        $params = [
            'id' => $topic->id,
            'name' => $topic->name,
            'url' => $topic->url,
            'cover' => $topic->image_url,
            'description_short' => $topic->description_short,
            'description_long' => $topic->description_long,
            'status' => $topic->status,
            'renderErrors' => false,
        ];

        $video = $topic->Video;
        if ($video) {
            $params['video_id'] = $video->id;
            $params['video_url'] = $video->cdn_cdn_url;
            $params['videoTag'] = Helper::getVideoTag($video->cdn_cdn_url, $video->cdn_content_type);
        }
        $thread = $topic->thread;
        if ($thread) {
            $params['thread_id'] = $thread->id;
        }

        return view('modals.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id == null || !is_numeric($id)) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Сюжет не существует'
                    ]
                );
        }

        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Сюжет не существует'
                    ]
                );
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Пожалуйста, войдите в систему'
                    ]
                );
        }
        if (!$user->hasRole('admin')) {
            if (!$user->organization) {
                return redirect()
                    ->route('topics.index')
                    ->with(
                        'msg',
                        [
                            'type' => 'error',
                            'text' => 'У пользователя нет организации'
                        ]
                    );
            }
            if ($topic->user->organization->id != $user->organization->id) {
                return redirect()
                    ->route('topics.index')
                    ->with(
                        'msg',
                        [
                            'type' => 'error',
                            'text' => 'Недостаточно прав для изменения'
                        ]
                    );
            }
        }

        if ($request->get('status')) {
            $validator = Validator::make($request->all(), Topic::$validateActive);
        } else {
            $validator = Validator::make($request->all(), Topic::$validateInactive);
        }

        if ($validator->fails()) {
            $updateFailedParams = [
                'updateFailed' => true,
                'id' => $id,
            ];
            $video_id = $request->get('video_id');
            if ($video_id) {
                $video = Video::find($video_id);
                $updateFailedParams['videoTag'] = Helper::getVideoTag($video->cdn_cdn_url, $video->cdn_content_type);
            }
            return redirect('topics#m_modal_edit_topic')
                ->withErrors($validator)
                ->withInput()
                ->with($updateFailedParams);
        }

        $validatedData = $validator->getData();

        if (array_key_exists('status', $validatedData)) {
            $validatedData['status'] = 'active';
            $validatedData['published_at'] = date("Y-m-d H:i:s");
        } else {
            $validatedData['status'] = 'inactive';
            $validatedData['published_at'] = null;
        }

        if (empty($validatedData['thread_id']) || Thread::where('id', $validatedData['thread_id'])->doesntExist()) {
            $validatedData['thread_id'] = null;
        }

        if ($user->hasRole('admin')) {
            $org = Organization::find($validatedData['organization']);
            if (empty($org)) {
                return redirect()
                ->route('topics.index')
                ->with(
                    'msg',
                    [
                        'type' => 'error',
                        'text' => 'Организация не найдена'
                    ]
                );
            }
            $fakeUser = $org->users()->first();
            $validatedData['user_id'] = $fakeUser->id;
        } else {
            $validatedData['user_id'] = $user->id;
        }

        $topic->update($validatedData);

        return redirect()
            ->route('topics.index')
            ->with(
                'msg',
                [
                    'type' => 'success',
                    'text' => 'Сюжет изменен'
                ]
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a portion of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $days_old
     * @return \Illuminate\Http\Response
     */
    public function row(Request $request, $organization, $days_ago)
    {
        if ($organization != 'all') {
            $set = self::getTopicsByDay($days_ago, $organization);
        } else {
            $set = self::getTopicsByDay($days_ago);
        }
        $vars = [
            'days' => $set['models'],
            'next_day' => $set['day']+1,
            'current'=> Date::now()->format('d F D Y'),
            'organization' => $organization != 'all' ? $organization : null,
        ];

        return view('columns.topics', $vars);
    }

    /**
     * Display a portion of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $days_old
     * @return \Illuminate\Http\Response
     */
    public function next(Request $request)
    {
        $organization = $request->query('org');
        $days_ago = $request->query('days_ago');
        $threads = $request->query('threads');

        $set = self::getTopicsByDay($days_ago, $organization, $threads);

        $vars = [
            'days' => $set['models'],
            'next_day' => $set['day']+1,
            'current'=> Date::now()->format('d F D Y'),
            'organization' => $organization,
            'threads' => $threads,
        ];

        return view('columns.topics', $vars);
    }
}
