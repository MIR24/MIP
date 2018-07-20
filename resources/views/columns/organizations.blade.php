<div id="participants" class="ch container">
    <div class="row">
    @for($i=0; $i<count($orgs); $i++)
        @if($i%3==0)
            </div>
            <div class="row">
        @endif
        @include('columns_partials.organization', ['org' => $orgs[$i]])
    @endfor
    </div>
</div>
