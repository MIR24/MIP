@extends('layouts.metronic')

@section('content')
    @foreach ($models as $model)
        <p>This is model {{ $model->id }}</p>
    @endforeach
@endsection
