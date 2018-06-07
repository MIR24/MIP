<div class="col-md-4">
    <div class="cellwrap">
        <div class="preview">
            <img class="channel-logo" src="/images/vgtrk.png"/>
            @if($topic->video_url)
                @include('columns_partials.CDNVideoPlayer', ['video_url' => $topic->video_url])
            @endif
        </div>
        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">4+</span></div>
        <a href="#" class="description">
            <div>{{$topic->description_short}}</div>
            <div>{{$topic->description_long}}</div>
        </a>
        <div class="pub-date">10 мая 2018</div>
        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
    </div>
</div>