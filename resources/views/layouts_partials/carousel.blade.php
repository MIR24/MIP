<div id="carouselExampleIndicators" class="carousel fade" data-ride="carousel">
    <ol class="carousel-indicators">
        @for($i=0; $i<count(config('constants.carousel_images')); $i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i!=0?:'active'}}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @for($i=0; $i<count(config('constants.carousel_images')); $i++)
            <div class="carousel-item {{$i!=0?:'active'}}">
{{--                @include('layouts_partials.carousel_image', ['topic' => $items[$i]])--}}
                @include('layouts_partials.carousel_image', ['image' => config('constants.carousel_images')[$i]])
            </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>