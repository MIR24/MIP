@extends('layouts.front')

@section('content')

    {{--@include('layouts_partials.carousel', ['items'=> $models])--}}

    <div class="grid-container">
        <div class="new-video">+ Видео</div>
        @include('columns.topics', ['days' => $days, 'current' => $current, 'next_day' => $next_day])
    </div>

    @include('columns.organizations', ['orgs' => $organizations])

@endsection
