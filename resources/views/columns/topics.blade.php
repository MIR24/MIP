@foreach($days as $day => $topics)
<div class="day-divider {{$current == $day ? 'current' : ''}}"><div>{{explode(' ', $day)[0].' '.explode(' ', $day)[1]}}</div><div>{{explode(' ', $day)[2]}}</div></div>
<div class="row">
    @for($i=0; $i<count($topics); $i++)
        @include('columns_partials.topic', ['topic' => $topics[$i]])
    @endfor
    @if(($lack = ceil(count($topics)/3)*3 - count($topics)) !== 0)
        @for($i=0; $i<$lack; $i++)
            @include('columns_partials.dummy')
        @endfor
    @endif
</div>
@endforeach
<div class="show-more" data-next="{{$next_day}}">Показать еще</div>