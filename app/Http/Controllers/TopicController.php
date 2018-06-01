<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barantaran\Platformcraft\Platform;
use App\Video;
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
            'query' => 'nullable|string|max:255'
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
        $data = Topic::with(['user.organization', 'video'])
            ->skip($validatedData['pagination']['perpage'] * ($validatedData['pagination']['page']-1))
            ->take($validatedData['pagination']['perpage'])
            ->get();
        $data = $data->map(function ($item) {
            $item->organization = $item->user->organization ? $item->user->organization->name : '';
            return $item;
        });

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description_short' => 'required|string',
            'description_long' => 'required|string',
            'url' => 'required|url|max:255'
        ]);

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

        return view('modals.update', $params);
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
            return redirect('topics#m_modal_update_topic')
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

    public function platformcraftUrl(Request $request)
    {
        $method = $request->input('method');
        if (!$method) {
            return response()->json(['error' => 'method needed'], 404);
        }
        $point = $request->input('point');
        if (!$point) {
            return response()->json(['error' => 'point needed'], 404);
        }

        $platform = new Platform(config('platformcraft.api_user_id'), config('platformcraft.hmac_key'));

        $response = $platform->getUrl(
            $point,
            $method,
            null
        );

        return response()->json($response);
    }

    public function saveVideo(Request $request)
    {
        if (!$request->isJson()) {
            return response()->json(['error' => 'request is not a json'], 404);
        }
        $request->validate(Video::$validateFilable);
        $input = $request->all();
        $video = Video::create([
            'cdn_id' => $input['id'],
            'cdn_path' => $input['path'],
            'cdn_size' => $input['size'],
            'cdn_name' => $input['name'],
            'cdn_content_type' => $input['content_type'],
            'cdn_create_date' => $input['create_date'],
            'cdn_latest_update' => $input['latest_update'],
            'cdn_resource_url' => $input['resource_url'],
            'cdn_cdn_url' => $input['cdn_url'],
            'cdn_vod_hls' => $input['vod_hls'],
            'cdn_video' => $input['video'],
            'cdn_private' => $input['private'],
            'cdn_status' => $input['status'],
        ]);

        if ($video) {
            return response()->json($video);
        } else {
            return response()->json(['error' => 'video not saved'], 404);
        }
    }
}
