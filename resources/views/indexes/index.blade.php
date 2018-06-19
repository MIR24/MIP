@extends('layouts.front')

@section('country_list')
    <div class="countries">
        <ul>
            @foreach($countries as $country)
                <li><input type="checkbox" id="{{$country->id}}" class="chckbx"><label for="{{$country->id}}" class="chckbx-label">{{$country->name}}</label></li>
            @endforeach
        </ul>
    </div>
@endsection

@section('content')

{{--    @include('layouts_partials.carousel', ['items'=> $models])--}}
    @include('layouts_partials.carousel')

    <div class="grid-container">
        <div class="grid-wrap">
            <div class="new-video">+ Видео</div>
            @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day])
        </div>
    </div>

    @include('columns.organizations', ['orgs' => $organizations])
    @auth
        @include('modals.download')
    @endauth

@endsection
