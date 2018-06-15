<div class="col-md-4">
    <div class="cellwrap">
        <div class="preview">
            <img class="channel-logo" src="{{$topic['logo']}}"/>
            @if($topic['video_url'])
                @include('columns_partials.CDNVideoPlayer', ['video_url' => $topic['video_url']])
            @endif
        </div>
        <div class="icons">
            @auth
                <span class="download">Скачать ⬇</span>
            @endauth
            <span class="age-restriction">18+</span>
        </div>
        <a href="#" class="description">
            <div>{{$topic['name']}}</div>
            <div>{{$topic['description_short']}}</div>
        </a>
        <div class="pub-date">{{$topic['created_at']}}</div>
        <div class="pub-geo">{{$topic['country']}} <span class="country-mini" style="background-image: url({{$topic['flag']}})"></span></div>
    </div>
</div>