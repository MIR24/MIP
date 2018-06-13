@extends('layouts.front')

@section('content')
    <div class="detail-head">
        <a href="/"><div class="country" style="background-image: url({{$organization->flag}});"></div></a>
    </div>
    <div class="detail-description">
        <img src="{{$organization->logo}}"/>
        <p class="sup">{{$organization->name}}</p>
        <p>{{$organization->description}}</p>
    </div>
    <div class="grid-container">
        <div class="grid-wrap">
            @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day, 'organization' => $organization->id])
        </div>
    </div>
@endsection
