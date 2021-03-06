@extends('layouts.front')

@section('country_list')
    <div class="countries">
        <ul>
            @foreach($organizations as $org)
                <li><input type="checkbox" id="{{$org->id}}" class="chckbx"><label for="{{$org->id}}" class="chckbx-label">{{$org->name_short}}</label></li>
            @endforeach
        </ul>
    </div>
@endsection

@section('content')

{{--    @include('layouts_partials.carousel', ['items'=> $models])--}}
    @include('layouts_partials.carousel')

    <div class="grid-container">
        <div class="grid-wrap">
            @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day])
        </div>
    </div>

    @include('columns.organizations', ['orgs' => $organizations])
    @auth
        @include('modals.download')
    @endauth

@endsection
