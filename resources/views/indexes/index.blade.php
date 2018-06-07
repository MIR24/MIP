@extends('layouts.front')

@section('content')

    @include('layouts_partials.carousel')

    @include('columns.topics', ['topics' => $models])

    @include('columns.organizations')

@endsection
