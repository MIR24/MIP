@extends('layouts.front')

@section('content')

    @include('layouts_partials.carousel', ['items'=> $models])

    <div class="grid-container">
        <div class="new-video">+ Видео</div>
        @include('columns.topics', ['topics' => $models])
    </div>

    @include('columns.organizations', ['orgs' => $organizations])

@endsection
