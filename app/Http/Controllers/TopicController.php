<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $data = Topic::with('user.organization')
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
            'url' => 'required|url|max:255',
            'published_at' => 'required|date'
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

        return redirect()->route('topics.index');
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
