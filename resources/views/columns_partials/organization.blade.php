<a href="/organizations/{{$org->id}}" class="ch col-md-4">
    <div class="cellwrap">
        <div class="channel-logo-big" style="background-image: url({{$org->logo}})">
            <div class="country" style="background-image: url({{$org->flag}})"></div>
        </div>
        <div class="advert">
            <div>{{$org->name}}</div>
            <div class="ch-arrow"></div>
        </div>
    </div>
</a>