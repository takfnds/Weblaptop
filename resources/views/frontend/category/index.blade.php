@extends('layouts.app_frontend')
@section('title', $title ?? '')
@section('content')
    <div class="container">
        <!-- HERO SECTION-->
        <div class="bsc-block">
            <section>
                <ul class="breadcrumb">
                    <li><a href="{{ route('get.product') }}" title="Sản phẩm">Sản phẩm</a></li>
                    @if(isset($category))
                        <li class="">{{ $category->c_name }}</li>
                    @endif
                    @if(isset($keyword))
                        <li class="">{{ $keyword->k_name }}</li>
                    @endif
                </ul>
            </section>
        </div>
        <div class="box-filter top-box block-scroll-main">
            <section>
                <div class="jsfix scrolling_inner scroll-right">
                    <div class="box-filter block-scroll-main scrolling">
                        <div class="scroll-btn show-right" style="display: none;">
                            <div class="btn-right-scroll" style="display: block;"></div>
                        </div>
                        <div class="filter-item warpper-price-outside">
                            <div class="filter-item__title jsTitle active">
                                <div class="arrow-filter"></div>
                                <span class="filter-item-value">Giá</span>
                            </div>
                            <div class="filter-show" style="display: none;">
                                <div class="filter-list price">
                                    @foreach(config('setting.filter.price') as $key => $item)
                                        <a href="{{ request()->fullUrlWithQuery(['price'=> $key]) }}" data-value="{{ $item }}"
                                           class="c-btnbox js-load-search">{{ $item }}</a>
                                    @endforeach
                                </div>
                                <div class="filter-button" style="display: block;">
                                    <a href="javascript:void(0)" data-value="Giá" class="btn-filter-close">Bỏ chọn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-quicklink  child-filter-outer block-scroll-main">
                    <div id="filter-follow-manu" class="props props-child">
                        @foreach($manufacturers ?? [] as $item)
                            <a href="{{ request()->fullUrlWithQuery(['m'=> $item->id]) }}"
                               class="c-btnbox js-load-search">{{ $item->m_name }}</a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        <div class="js-box-products" style="position: relative;min-height: 40vh">
            @include('frontend.category.include._inc_products')
        </div>
    </div>
@stop

