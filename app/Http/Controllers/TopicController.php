<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Topic;
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

        $total = Topic::count();
        $pages = $total / $validatedData['pagination']['perpage'];

        $meta = [
            'page' => $validatedData['pagination']['page'],
            'perpage' => $validatedData['pagination']['perpage'],
            'total' => $total,
            'pages' => $pages,
            'sort' => $validatedData['sort']['sort'],
            'field' => $validatedData['sort']['field']
        ];

        $builder = Topic::join('videos', 'videos.id', '=', 'topics.video_id')
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->join('organizations', 'organizations.id', '=', 'users.organization_id')
            ->orderBy($validatedData['sort']['field'], $validatedData['sort']['sort'])
            ->skip($validatedData['pagination']['perpage'] * ($validatedData['pagination']['page']-1))
            ->take($validatedData['pagination']['perpage']);

        if (!empty($validatedData['query'])) {
            $query = $validatedData['query'];

            if (!empty($query['created_at'])) {
                $start = Carbon::parse($query['created_at']);
                $end = $start->copy()->addDay();
                $builder->whereBetween('topics.created_at', [$start, $end]);
            }

            if (!empty($query['organization'])) {
                $builder->where('organizations.name', 'rlike', $query['organization']);
            }
        }

        $data = $builder->get([
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
            ->with('msg', [
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
                ->with('msg', [
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
            'description_long' => $topic->description_long
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
                ->with('msg', [
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

        $user = Auth::user();
        $validatedData['user_id'] = $user->id;

        $topic = Topic::find($id);

        if (!$topic) {
            return redirect()
                ->route('topics.index')
                ->with('msg', [
                        'type' => 'error',
                        'text' => 'Сюжет не существует'
                    ]
                );
        }

        $topic->update([
            'name' => $validatedData['name'],
            'description_short' => $validatedData['description_short'],
            'description_long' => $validatedData['description_long'],
            'url' => $validatedData['url'],
            'video_id' => $validatedData['video_id']
        ]);

        return redirect()
            ->route('topics.index')
            ->with('msg', [
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
}
