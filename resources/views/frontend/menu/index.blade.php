@extends('layouts.app_blog')
@section('title','Bài viết')
@section('content')
    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        @foreach($articles as $article)
                            @include('frontend.components._inc_article_item',['item' => $article])
                        @endforeach
                        {!! $articles->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                    <!-- Pagination -->
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination pagination-template d-flex justify-content-center">--}}
{{--                            <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link active">1</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">3</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                </div>
            </main>
            @include('frontend.components._inc_sidebar_blog')
        </div>
    </div>
@stop

