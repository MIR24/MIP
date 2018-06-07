<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Topic;
use App\Organization;
use Validator;

class TopicController extends Controller
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

    private static function getTopics($days_old = 0, $organization = null) {

        Date::setLocale('ru');

        $cur_date = Date::now();

        if ($first_date = Topic::orderBy('created_at', 'asc')->pluck('created_at')->first()) {
            $first_date = Date::createFromFormat('d F Y года H:i', $first_date);
        }

        $day = $days_old;

        do {
            $date = date('Y-m-d', strtotime("-$day days"));
            if (Topic::whereDate('created_at', $date)->count() > 0) {
                break;
            } else if ($date <= $first_date) return null;
        } while (++$day);

        $builder = Topic::leftjoin('videos', 'videos.id', '=', 'topics.video_id')
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->join('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy('topics.created_at', 'desc');
        if ($organization) {
            $builder->where('organizations.id', $organization);
        }

        $new_date = new Date(strtotime("-$day days"));

        $builder->whereDate('topics.created_at', $new_date->format('Y-m-d'));

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
        ]);

        $day_info = [
            'day_month' => $new_date->format('d F'),
            'day_of_the_week' => $new_date->format('D'),
            'is_current' => $cur_date->format('Y-m-d') == $new_date->format('Y-m-d'),
            'days_ago' => $day
        ];

        return [
            'models'=> $models,
            'date'=> $day_info,
        ];
    }

    /**
     * Display a listing of the resource as JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indexDT(Request $request)
    {
        $validatedData = $request->validate([
            'pagination' => 'required|array',
            'sort' => 'nullable|required|array',
            'query' => 'nullable|array|max:255'
        ]);

        $builder = Topic::leftJoin('videos', 'videos.id', '=', 'topics.video_id')
            ->leftJoin('users', 'users.id', '=', 'topics.user_id')
            ->leftJoin('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy($validatedData['sort']['field'], $validatedData['sort']['sort']);

        if (!empty($validatedData['query'])) {
            $query = $validatedData['query'];

            if (!empty($query['created_at'])) {
                $start = Date::parse($query['created_at']);
                $end = $start->copy()->addDay();
                $builder->whereBetween('topics.created_at', [$start, $end]);
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
        $result = self::getTopics(0);

        $organizations = Organization::all();

        return view('indexes.index', [
            'models' => $result['models'],
            'date' => $result['date'],
            'organizations' => $organizations,
        ]);
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
        //
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
        //
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
    public function row(Request $request, $days_old)
    {
        $result = self::getTopics($days_old);
        if ($result['models']) {
            return view('columns.topics', [
                'topics' => $result['models'],
                'date' => $result['date'],
            ]);
        } else {
            abort(404,'Page not found');
        }
    }
}
