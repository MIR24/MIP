<div class="ch container">
    <div class="row">
    @for($i=0; $i<count($orgs); $i++)
        @if($i%3==0)
            </div>
            <div class="row">
        @endif
        @include('columns_partials.organization', ['org' => $orgs[$i]])
    @endfor
    <a href="#" class="ch ch-mip col-md-4">
        <div class="cellwrap">
            <div class="channel-logo-big">
                <div class="country"></div>
            </div>
            <div class="advert">
                <div>Правила присоединения к информационному пулу</div>
                <div class="ch-arrow"></div>
            </div>
        </div>
    </a>
    </div>
</div>
