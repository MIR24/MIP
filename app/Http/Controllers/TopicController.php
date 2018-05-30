<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barantaran\Platformcraft\Platform;
use App\Video;
use App\Topic;

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
            "page" => $validatedData['pagination']['page'],
            "perpage" => $validatedData['pagination']['perpage'],
            "total" => $total,
            "pages" => $pages,
            "sort" => $validatedData['sort']['sort'],
            "field" => $validatedData['sort']['field']
        ];
        $data = Topic::with('user.organization')
            ->skip($validatedData['pagination']['perpage'] * ($validatedData['pagination']['page']-1))
            ->take($validatedData['pagination']['perpage'])
            ->get();
        $data = $data->map(function ($item) {
            $item->organization = $item->user->organization->name;
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
        //
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

    public function platformcraftUrl(Request $request)
    {
        $method = $request->input('method');
        if (!$method) {
            return response()->json(['error' => 'method needed']);
        }
        $point = $request->input('point');
        if (!$point) {
            return response()->json(['error' => 'point needed']);
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
            return response()->json(['error' => 'request is not a json']);
        }

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
            return response()->json(['error' => 'request is not a json']);
        }
    }
}
