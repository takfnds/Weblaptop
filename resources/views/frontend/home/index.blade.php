@extends('layouts.app_frontend')
@section('title','Trang chủ')
@section('content')
    <div class="container-fluid">
        @include('frontend.home.include._inc_slide')
    </div>
    <div class="container">
        <div class="box-common">
            <div class="box-common__top clearfix">
                <h2 class="box-common__title">Sản phẩm nổi bật</h2>
            </div>
            <div class="box-common__main">
                <div class="listproduct">
                    @foreach($productsHot ?? []  as $item)
                        @include('frontend.home.include._inc_product_item')
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-common">
            <div class="box-common__top clearfix">
                <h2 class="box-common__title">Thương hiệu nổi bật</h2>
            </div>
            @if(isset($manufacturers))
                <div class="box-common__main">
                    <div class="lists lists-manufacturers">
                        @foreach($manufacturers as $item)
                            <div class="item">
                                <a href="">
                                    <img src="{{ pare_url_file($item->m_image) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="dongho clearfix" style="background-color:#203E4E">
            <div class="dongho__left">
                <a aria-label="slide" data-cate="0" data-place="1576">
                    <img loading="lazy" class=" ls-is-cached lazyloaded" style="height: 410px"
                         alt="Banner Block đồng hồ trang chủ"
                         src="{{ asset('images/banner_home_1.png') }}"></a>
            </div>
            <div class="dongho__right">
                <ul class="dongho-tab">
                    <li class="item act" data-cate-id="7077" data-html-id="3482">Đồng hồ thông minh</li>
                    <li class="item" data-cate-id="7264" data-prop-id="134705" data-html-id="3483">Đồng hồ thời trang Nam</li>
                    <li class="item" data-cate-id="7264" data-prop-id="134706" data-html-id="3484">Đồng hồ thời trang Nữ</li>
                    <li class="item" data-cate-id="7077" data-prop-id="147889" data-html-id="3485">Định vị trẻ em</li>
                </ul>
                <div class="dongho-show active relative">
                    <div class="preloader">
                        <div class="loaderweb"></div>
                    </div>
                    <div class="dongho__content" data-cate-id="7077" data-html-id="3482">
                        <div class="listproduct js-products-slide slider-dongho owl-carousel owl-loaded owl-drag" data-size="8">
                            @foreach($productsHot ?? []  as $item)
                                @include('frontend.home.include._inc_product_item')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="box-common">
            <div class="box-common__top clearfix">
                <h2 class="box-common__title">Sản phẩm mới</h2>
            </div>
            <div class="box-common__main">
                <div class="listproduct">
                    @foreach($productsNews ?? []  as $item)
                        @include('frontend.home.include._inc_product_item')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
