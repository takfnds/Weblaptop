<aside class="col-lg-4">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
        <header>
            <h3 class="h6">Tìm kiếm</h3>
        </header>
        <form action="{{ route('get.blog.search') }}" class="search-form">
            <div class="form-group">
                <input type="search" name="k" value="{{ Request::get('k') }}" placeholder="Từ khoá tìm kiếm">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
        </form>
    </div>
    <!-- Widget [Latest Posts Widget]        -->
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">Bài viết mới nhất</h3>
        </header>
        <div class="blog-posts">
            @foreach($articlesLatest ?? []  as $item)
                <a href="{{ route('get.article_detail', ['slug' => $item->a_slug]) }}" title="{{ $item->a_name }}">
                    <div class="item d-flex align-items-center">
                        <div class="image">
                            <img src="{{ pare_url_file($item->a_avatar) }}" alt="{{ $item->a_name }}" class="img-fluid">
                        </div>
                        <div class="title">
                            <strong>{{ $item->a_name }}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views"><i class="icon-eye"></i> {{ $item->a_view }}</div>
                                <div class="comments"><i class="icon-clock"></i>{{ $item->created_at }}</div>
{{--                                <div class="comments"><i class="icon-comment"></i>{{ $item->created_at }}</div>--}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
        <header>
            <h3 class="h6">Menus</h3>
        </header>
        @foreach($menus ?? [] as $item)
            <div class="item d-flex justify-content-between">
                <a href="{{ route('get.menu',['slug' => $item->mn_slug]) }}" title="{{ $item->mn_name }}">{{ $item->mn_name }}</a>
                <span>{{ $item->articles_count }}</span>
            </div>
        @endforeach
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
            <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach($tags ?? []  as $item)
                <li class="list-inline-item">
                    <a href="{{ route('get.tag', ['slug' => $item->t_slug]) }}" class="tag" title="{{ $item->t_name }}">#{{ $item->t_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
