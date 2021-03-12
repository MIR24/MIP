<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barantaran\Platformcraft\Platform;
use App\Video;
use Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (!$request->isJson()) {
            return response()->json(['error' => 'request is not a json'], 404);
        }

        $validator = Validator::make($request->all(), [
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
        ]);

        $validator->validate();
        $validatedData = $validator->getData();
        foreach ($validatedData as $key => $value) {
            $validatedData['cdn_'.$key] = $value;
            unset($key);
        }

        $video = Video::create($validatedData);

        if (!$video) {
            return response()->json(['error' => 'video not saved'], 404);
        }

        return response()->json($video);
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
     * Get cover for platform video.
     *
     * @param string $platform_id
     *
     * @return string
     */

    public static function getCover($platform_id)
    {
        $platform = new Platform(config('platformcraft.api_user_id'), config('platformcraft.hmac_key'));

        $url = $platform->getUrl('objects', 'get', $platform_id);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, htmlspecialchars_decode($url));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = json_decode(curl_exec($ch));

        curl_close($ch);

        if ($data->code == 200) {
            return $data->object->previews[0];
        }

        return null;
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
}
