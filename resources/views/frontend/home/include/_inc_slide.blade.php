<div class="row" style="margin-top: 50px">
    <div class="col-sm-8">
        @if (isset($slides))
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0 ; $i < count($slides); $i ++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach($slides as $item)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ pare_url_file($item->s_banner) }}" alt="{{ $item->s_text }}">
                        </div>
                    @endforeach
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
            <div class="slide-lists-text">
                @foreach($slides as $item)
                    <div class="item">
                        <p>{{ $item->s_description }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="col-sm-4">
        <div class="slide-right">
            <div class="item">
                <a href="">
                    <img src="{{ asset('images/s-1.jpeg') }}" alt="" class="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{ asset('images/s-2.jpeg') }}" alt="" class="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{ asset('images/s-3.jpeg') }}" alt="" class="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{ asset('images/s-4.jpeg') }}" alt="" class="">
                </a>
            </div>
        </div>
    </div>
</div>
