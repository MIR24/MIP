@extends('layouts.app')
@section('content')

        @include('layouts_partials.top_bar')

        @include('layouts_partials.carousel')

        @for($day=0;$day<3;$day++)
            @include('columns.topics')
        @endfor

        <div class="show-more">Показать еще</div>

        @include('columns.organizations')

@endsection