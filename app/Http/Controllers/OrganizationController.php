<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Topic;

class OrganizationController extends BaseController
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

    public function participantPage(Request $request, $org_id)
    {
        $organization = Organization::join('countries', 'organizations.country_id', '=', 'countries.id')
            ->where('organizations.id', $org_id)
            ->get([
                'organizations.id as id',
                'organizations.name as name',
                'organizations.image_url_lg as logo',
                'countries.image_url as flag',
            ])->first();
        $set = self::getTopicsByDay(0, $org_id);
        $vars = [
            'days' => $set['models'],
            'next_day' => $set['day']+1,
            'current'=> Date::now()->format('j F D Y'),
            'organization' => $organization,
        ];

        return view('indexes.organization', $vars);
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
