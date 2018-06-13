@extends('layouts.front')

@section('content')
    <div class="detail-head">
        <div><div class="country" style="background-image: url({{$organization->image_url_lg}});"></div></div>
    </div>
    <div class="detail-description">
        <img src="/images/chahonnamo-big.png"/>
        <p class="sup">{{$organization->name}}</p>
        <p>{{$organization->description}}</p>
    </div>
    <div class="grid-container">
        <div class="grid-wrap">
            @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day, 'organization' => $organization->id])
        </div>
    </div>
@endsection
