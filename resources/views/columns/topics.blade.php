<div class="day-divider current"><div>12 мая</div><div>сб</div><div class="new-video">+ Видео</div></div>
<div class="row">
    @for($i=0; $i<count($topics); $i++)
        @if($i%3==0)
            </div>
            <div class="row">
        @endif
        @include('columns_partials.topic', ['topic' => $topics[$i]])
    @endfor
</div>
<div class="show-more">Показать еще</div>