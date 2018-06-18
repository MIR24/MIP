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
                <span class="download" data-meta-id="#showTopics{{ $topic['id'] }}">Скачать ⬇</span>
            @endauth
            <span class="age-restriction">18+</span>
        </div>
        <div class="description">
            <div>{{$topic['name']}}</div>
            <div>{{$topic['description_short']}}</div>
        </div>
        <div class="pub-date">{{$topic['published_at']}}</div>
        <div class="pub-geo">{{$topic['country']}} <span class="country-mini" style="background-image: url({{$topic['flag']}})"></span></div>
        <div id="showTopics{{ $topic['id'] }}" class="meta" data-name="{{$topic['name']}}" data-short="{{$topic['description_short']}}" data-full="{{$topic['description_long']}}" data-link="{{$topic['ftp_url']}}"></div>
    </div>
</div>