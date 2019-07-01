<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Download;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datatables.stats', [
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

    public function indexDT(Request $request)
    {
        $validatedData = $request->validate([
            'pagination' => 'required|array',
            'sort' => 'nullable|required|array',
            'query' => 'nullable|array|max:255',
        ]);

        $builder = Download::leftJoin('topics', 'topics.id', '=', 'downloads.topic_id')
            ->leftJoin('users', 'users.id', '=', 'downloads.user_id')
            ->leftJoin('organizations', 'organizations.id', '=', 'downloads.organization_id')
            ->leftJoin('videos', 'videos.id', '=', 'topics.video_id')
            ->orderBy($validatedData['sort']['field'], $validatedData['sort']['sort']);


        if (!empty($validatedData['query'])) {
            $query = $validatedData['query'];

            if (!empty($query['created_at'])) {
                $dates = explode(config('constants.datepicker_delimiter'), $query['created_at']);
                if (count($dates) > 1) {
                    $start = Date::parse($dates[0])->hour(0)->minute(0)->second(0);
                    $end = Date::parse($dates[1])->hour(23)->minute(59)->second(59);
                    $builder->whereBetween('downloads.created_at', [$start, $end]);
                } else {
                    $start = Date::parse($dates[0])->hour(0)->minute(0)->second(0);
                    $builder->whereDate('downloads.created_at', '>', $start);
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
                'downloads.id',
                'downloads.created_at',
                'topics.name as name',
                'topics.name as topic_name',
                'topics.url',
                'topics.description_short',
                'topics.description_long',
                'topics.url',
                'topics.status',
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
}
