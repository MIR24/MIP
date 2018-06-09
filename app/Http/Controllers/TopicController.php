<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Topic;
use App\Organization;
use App\Country;
use Validator;

class TopicController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datatables.topic');
    }

    /**
     * Display a listing of the resource as JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $input = $request->all();
        $date_start = isset($input['date_start']) ? $input['date_start'] : null;
        $date_end = isset($input['date_end']) ? $input['date_end'] : null;
        $organizations = isset($input['organizations']) ? $input['organizations'] : null;
        $countries = isset($input['countries']) ? $input['countries'] : null;
        $days = self::getTopicsBetween($date_start, $date_end, $organizations, $countries);
        die(var_dump($input));

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

        $builder = Topic::leftJoin('videos', 'videos.id', '=', 'topics.video_id')
            ->leftJoin('users', 'users.id', '=', 'topics.user_id')
            ->leftJoin('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy($validatedData['sort']['field'], $validatedData['sort']['sort'])
            ->where('organizations.id', $user->organization ? $user->organization->id : null);

        if (!empty($validatedData['status']) && $validatedData['status'] != 'all') {
            if ($validatedData['status'] == 'inactive') {
                $builder->where('topics.status', 'inactive')
                ->where('users.id', $user->id);
            }
        } else {
            $builder->where('topics.status', 'active')
            ->orWhere('users.id', $user->id);
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
                $builder->where('organizations.name', 'rlike', $query['organization']);
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
                'organizations.name as organization',
                'videos.cdn_cdn_url as video_url',
                'videos.cdn_content_type as video_content_type'
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
                'organizations.name as name',
                'organizations.image_url_lg as logo',
                'countries.image_url as flag',
                'countries.name as country_name'
            ]);
        $countries = Country::all();
        $set = self::getTopicsByDay(0);
        $vars = [
            'days' => $set['models'],
            'next_day' => $set['day']+1,
            'current'=> Date::now()->format('j F D Y'),
            'organizations' => $organizations,
            'countries' => $countries
        ];

        return view('indexes.index', $vars);
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description_short' => 'required|string',
            'description_long' => 'required|string',
            'url' => 'required|url|max:255'
        ], $messages);

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

        $user = Auth::user();
        $validatedData['user_id'] = $user->id;

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

        $params = [
            'id' => $topic->id,
            'name' => $topic->name,
            'url' => $topic->url,
            'description_short' => $topic->description_short,
            'description_long' => $topic->description_long,
            'status' => $topic->status,
        ];

        $video = $topic->Video;
        if ($video) {
            $params['video_id'] = $video->id;
            $params['videoTag'] = '<video class="col-lg-12 col-md-12 col-sm-12" controls><source src="https://'. $video->cdn_cdn_url .'" type="'. $video->cdn_content_type .'">Ваш браузер не поддерживает воспроизведение видео</video>';
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description_short' => 'required|string',
            'description_long' => 'required|string',
            'url' => 'required|url|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('topics#m_modal_edit_topic')
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

        $user = Auth::user();
        $validatedData['user_id'] = $user->id;

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
    public function row(Request $request, $days_ago)
    {
        $set = self::getTopicsByDay($days_ago);
        $vars = [
            'days' => $set['models'],
            'next_day' => $set['day']+1,
            'current'=> Date::now()->format('d F D Y'),
        ];

        return view('columns.topics', $vars);
    }
}
