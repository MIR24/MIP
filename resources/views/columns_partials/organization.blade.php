<span class="ch col-md-4">
    <div class="cellwrap">
        <a href="/organizations/{{$org->id}}" class="ch col-md-4">
            <div class="channel-logo-big" style="background-image: url({{$org->logo}})">
                <div class="country" style="background-image: url({{$org->flag}})"></div>
            </div>
        </a>
        @role('admin')
            <span class="gray-btn bottom-left"><a target="_blank" href="{{ route('stats.index', ['organization' => urlencode($org['name'])]) }}">Статистика</a></span>
        @endrole
        <a href="/organizations/{{$org->id}}" class="ch col-md-4">
            <div class="advert">
                <div>{{$org->name}}</div>
                <div class="ch-arrow"></div>
            </div>
        </a>
    </div>
</span>
