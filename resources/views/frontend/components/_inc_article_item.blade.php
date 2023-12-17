<div class="post col-xl-6">
    <div class="post-thumbnail">
        <a href="{{ route('get.article_detail',['slug' => $item->a_slug]) }}" title="{{ $item->a_name }}">
            <img src="{{ pare_url_file($item->a_avatar) }}" alt="{{ $item->a_name }}" class="img-fluid">
        </a>
    </div>
    <div class="post-details">
        <div class="post-meta d-flex justify-content-between">
            <div class="date meta-last">{{ $item->created_at }}</div>
            <div class="category"><a href="" title="{{ $item->menu->mn_name ?? "" }}">{{ $item->menu->mn_name ?? "" }}</a></div>
        </div>
        <a href="{{ route('get.article_detail',['slug' => $item->a_slug]) }}" title="{{ $item->a_name }}">
            <h3 class="h4">{{ $item->a_name }}</h3>
        </a>
        <p class="text-muted">{{ $item->a_description }}</p>
{{--        <footer class="post-footer d-flex align-items-center">--}}
{{--            <a href="#" class="author d-flex align-items-center flex-wrap">--}}
{{--                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>--}}
{{--                <div class="title"><span>John Doe</span></div>--}}
{{--            </a>--}}
{{--            <div class="date"><i class="icon-clock"></i> 2 months ago</div>--}}
{{--            <div class="comments meta-last"><i class="icon-comment"></i>12</div>--}}
{{--        </footer>--}}
    </div>
</div>
