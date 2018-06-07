<div class="day-divider {{$date['is_current'] ? 'current' : ''}}"><div>{{$date['day_month']}}</div><div>{{$date['day_of_the_week']}}</div></div>
<div class="row">
    @for($i=0; $i<count($topics); $i++)
        @if($i%3==0)
            </div>
            <div class="row">
        @endif
        @include('columns_partials.topic', ['topic' => $topics[$i]])
    @endfor
</div>
<div class="show-more" data-next="{{$date['days_ago']+1}}">Показать еще</div>