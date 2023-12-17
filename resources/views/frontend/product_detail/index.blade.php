@extends('layouts.app_frontend')
@section('title', $product->pro_name)
@section('content')
    <div class="container">
        <div class="bsc-block">
            <section>
                <ul class="breadcrumb">
                    <li><a href="{{ route('get.product') }}" title="Sản phẩm">Sản phẩm</a></li>
                    @if (isset($product->category->c_name))
                        <li>
                            <a href="{{ route('get.category', $product->category->c_slug) }}"
                               title="{{ $product->category->c_name }}">{{ $product->category->c_name }}</a>
                            <meta property="position" content="1">
                        </li>
                    @endif
                    <li>
                        <a href="#" title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
                        <meta property="position" content="2">
                    </li>
                </ul>
            </section>
        </div>
        <h1 class="title-heading">{{ $product->pro_name }}</h1>
        <div class="box02">
            <div class="box02__left">
                <div class="detail-rate">
                    <p>
                        <i class="icondetail-star"></i>
                        <i class="icondetail-star"></i>
                        <i class="icondetail-star"></i>
                        <i class="icondetail-star"></i>
                        <i class="icondetail-star-dark"></i>
                    </p>
                    <p class="detail-rate-total">77 <span>đánh giá</span></p>
                </div>
            </div>
        </div>
        <div class="box_main">
            <div class="box_left">
                <div class="box01">
                    <div class="box01__show">
                        <a href="">
                            <img src="{{ pare_url_file($product->pro_avatar) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="policy_intuitive cate42 scenarioNomal">
                    <div class="policy">
                        <ul class="policy__list">
                            <li>
                                <div class="iconl">
                                    <i class="icondetail-doimoi"></i>
                                </div>
                                <p>
                                    Hư gì đổi nấy <b>12 tháng</b> tại 2532 siêu thị toàn quốc (miễn phí tháng đầu)
                                </p>
                            </li>
                            <li data-field="IsSameBHAndDT">
                                <div class="iconl">
                                    <i class="icondetail-baohanh"></i>
                                </div>
                                <p>
                                    Bảo hành <b>chính hãng điện thoại 1 năm</b>
                                </p>
                            </li>
                            <li>
                                <div class="iconl"><i class="icondetail-sachhd"></i></div>
                                <p>Bộ sản phẩm gồm</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="box-available"></div>
                <div class="border7"></div>
                <div class="article content-t-wrap">
                    <div class="article__content short">
                        <h3>Nội dung sản phẩm</h3>
                        {!! $product->pro_content !!}
                    </div>
                </div>

            </div>
            <div class="box_right">
                <div class="box04 box_normal">
                    <div class="price-one">
                        <div class="box-price">
                            <p class="box-price-present">9.390.000₫ *</p>
                            <p class="box-price-old">10.290.000₫</p>
                            <p class="box-price-percent">-8%</p>
                            <span class="label label--black">Trả góp 0%</span>
                        </div>
                    </div>
{{--                    <div class="banner-detail ">--}}
{{--                        <a data-cate="42" data-place="1288" href="https://www.thegioididong.com/mua-online-gia-re#dtdd"--}}
{{--                           onclick="jQuery.ajax({ url: 'https://www.thegioididong.com/bannertracking?bid=39055&amp;r='+ (new Date).getTime(), async: true, cache: false });"><img--}}
{{--                                    style="cursor:pointer"--}}
{{--                                    src="https://cdn.tgdd.vn/2021/07/banner/Desk920x230-920x230.png"--}}
{{--                                    alt="Online mùa dịch" width="920" height="230"></a>--}}
{{--                    </div>--}}
                    <div class="block block-price1">
                        <div class="block__promo">
                            <div class="pr-top">
                                <p class="pr-txtb">Khuyến mãi </p>
                                <i class="pr-txt">Giá và khuyến mãi dự kiến áp dụng đến 23:00 18/07</i>
                            </div>
{{--                            <div class="pr-content">--}}
{{--                                <div class="pr-item">--}}
{{--                                    <div class="divb t2" data-promotion="734778" data-group="WebNote" data-discount="0"--}}
{{--                                         data-productcode="" data-tovalue="5000">--}}
{{--                                        <span class="nb">1</span>--}}
{{--                                        <div class="divb-right">--}}
{{--                                            <p>Giảm giá 300,000đ khi tham gia thu cũ đổi mới <a--}}
{{--                                                        href="https://www.thegioididong.com/thu-cu-doi-moi"> Xem chi--}}
{{--                                                    tiết</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="divb t2" data-promotion="739213" data-group="WebNote" data-discount="0"--}}
{{--                                         data-productcode="" data-tovalue="0">--}}
{{--                                        <span class="nb">2</span>--}}
{{--                                        <div class="divb-right">--}}
{{--                                            <p>Nhập mã HPBD17 giảm 3% tối đa 100.000đ khi thanh toán quét QRcode qua App--}}
{{--                                                của ngân hàng <a--}}
{{--                                                        href="http://www.thegioididong.com/tin-tuc/mung-sinh-nhat-giam-gia-qua-vnpay-1366413"--}}
{{--                                                        target="_blank">(click xem chi tiết)</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="pr-item text">--}}
{{--                                    <p><span class="note">(*)</span> Giá hoặc khuyến mãi không áp dụng trả góp lãi suất--}}
{{--                                        đặc biệt (0%, 0.5%, 1%)</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="spmarket"></div>
                        <div class="block-button normal">
                            <a href="{{ route('get_ajax.shopping.add', $product->id) }}" class="btn-buynow jsBuy js-add-cart">MUA NGAY</a>
                        </div>
                    </div>
                </div>
                <div class="border7"></div>
                <p class="parameter__title">Cấu hình {{ $product->pro_name }}</p>
                <div class="parameter">
                    <ul class="parameter__list 236085 active">
                        @if($cconfiguration =  json_decode($product->pro_configuration, true))
                            @foreach($cconfiguration['key'] ?? [] as $key => $value)
                                <li data-index="0" data-prop="0">
                                    <p class="lileft">{{ $value }}</p>
                                    <div class="liright">
                                        <span class="">{{ $cconfiguration['value'][$key] }}</span>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-common">
            <div class="box-common__top clearfix">
                <h2 class="box-common__title">Sản phẩm liên quan</h2>
            </div>
            <div class="box-common__main">
                <div class="listproduct">
                    @foreach($productsRelated ?? []  as $item)
                        @include('frontend.home.include._inc_product_item')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

