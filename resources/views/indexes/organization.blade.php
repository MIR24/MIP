@extends('layouts.front')

@section('content')
    <div class="detail-head">
        <a href="/"><div class="country" style="background-image: url({{$organization->flag}});"></div></a>
    </div>
    <div class="detail-description">
        <img src="{{$organization->logo}}"/>
        <p class="sup">{{$organization->name}}</p>
        <p>{{$organization->description}}</p>
        @role('admin')
            <span class="gray-btn"><a target="_blank" href="{{ route('stats.index', ['organization' => urlencode($organization['name'])]) }}">Статистика</a></span>
        @endrole
    </div>
    <div class="grid-container">
        <div class="grid-wrap">
            @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day, 'organization' => $organization->id])
        </div>
    </div>
@endsection
