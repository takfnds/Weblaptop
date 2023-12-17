<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{ asset('vendor/lightbox2/css/lightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel2/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel2/assets/owl.theme.default.css') }}">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->

    <meta property="og:image" content="">
    <meta property="og:image:height" content="315">
    <meta property="og:image:width" content="600">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
{{--    <style>--}}
    {{--    .listproduct h3 {--}}
    {{--        color: red !important;--}}
    {{--    }--}}
    {{--</style>--}}
    <style>.product-overlay .list-inline-item:first-child{ display: none}</style>
</head>
<body>
<div class="page-holder">
    <!-- navbar-->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="padding: 0 !important;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.home') }}" title="Trang chủ"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>

                        @foreach($categoriesGlobal as $item)
                            @php
                                $flagSubMenu = (isset($item->childs) && !$item->childs->isEmpty()) ?  true : false;
                            @endphp
                            <li class="{{ $flagSubMenu ? 'dropdown' : '' }}">
                                <a class="nav-link {{ $flagSubMenu ? 'dropdown-toggle' : '' }}" {{ $flagSubMenu ? 'data-toggle=dropdown' : "" }} role="button" aria-haspopup="true" aria-expanded="true"
                                   title="{{ $item->c_name }}"
                                   href="{{ route('get.category', $item->c_slug) }}">{{ $item->c_name }}</a>
                                @if(isset($item->childs) && !$item->childs->isEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach($item->childs as $item)
                                        <li><a href="{{ route('get.category', $item->c_slug) }}">{{ $item->c_name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.blog') }}" title="Bài viết">Bài viết</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.shopping') }}" title="Giỏ hàng">
                                <i class="fas fa-dolly-flatbed mr-1"></i>Giỏ hàng<small
                                    class="" id="totalCart">({{ \Cart::count() }})</small>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small
                                    class=""> (0)</small></a></li>
                        @if(get_data_user('web'))
                            <div class="dropdown">
                                <a href="{{ route('get_user.home') }}" class="btn btn-primary btn-menu-account dropdown-toggle" data-toggle="dropdown">
                                    {{ get_data_user('web','name') }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('get_user.transaction.index') }}">Đơn hàng</a>
                                    <a class="dropdown-item" href="{{ route('get.logout') }}">Đăng xuất</a>
                                </div>
                            </div>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get.login') }}"> <i
                                        class="fas fa-user-alt mr-1 "></i>Đăng nhập</a></li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
    </div>
    <!-- HERO SECTION-->
    @yield('content')
    @include('frontend.components._inc_footer')
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="{{ asset('js/finter_search.js') }}"></script>

    <script>
        $(function () {
            $(".js-preview-product").click(function (event) {
                event.preventDefault()
                let $this = $(this)
                let URL = $this.attr('href')
                $.ajax({
                    url: URL,
                }).done(function (results) {
                    if (results.status === 200) {
                        $("#productView").html(results.html).modal({
                            show: true
                        })
                    }
                    console.log(results)
                });
            })

            $("body").on('click', '.js-add-cart', function (event) {
                // $(".js-add-cart").click( function (event){
                event.preventDefault()
                let $this = $(this)
                let URL = $this.attr('href')
                let qty = 1
                let $elementQty = $this.parents('.box-qty').find(".val-qty")
                if ($elementQty.length) {
                    qty = $elementQty.val()
                }

                $.ajax({
                    url: URL,
                    data: {
                        qty: qty
                    }
                }).done(function (results) {
                    alert(results.message)
                    if(typeof results.totalCart !== "undefined")
                        $("#totalCart").text("(" + results.totalCart + ")")
                });
            })

            $("body").on('click', '.js-delete-cart', function (event) {
                event.preventDefault()
                let $this = $(this)
                let URL = $this.attr('href')
                $.ajax({
                    url: URL,
                }).done(function (results) {
                    alert(results.message)
                    if (results.status === 200) {
                        $this.parents('tr').remove()

                        if(typeof results.totalCart !== "undefined")
                            $("#totalCart").text("(" + results.totalCart + ")")

                    }
                });
            })
            $(".js-select-sort").change( function (){
                this.form.submit();
            })
            $("body").on('click', '.js-update-cart', function (event) {
                event.preventDefault()
                let $this = $(this)
                let URL = $this.attr('href')
                let $elementQty = $this.parents('tr').find(".val-qty")
                if ($elementQty.length) {
                    qty = $elementQty.val()
                }
                console.log(qty)
                $.ajax({
                    url: URL,
                    data: {
                        qty: qty
                    }
                }).done(function (results) {
                    alert(results.message)
                    if(typeof results.totalCart !== "undefined")
                        $("#totalCart").text("(" + results.totalCart + ")")
                    location.reload();
                });
            })

            $("body").on("click",".js-submit-email", function(event){
                event.preventDefault();
                let $this = $(this);
                let $domForm = $this.closest('form');
                let URL = $("#formEmail").attr('action')

                let data = new FormData($this.parents('form')[0])
                let valueEmail = $("#email").val();
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!emailReg.test(valueEmail))
                {
                    $domForm[0].reset();
                    alert("Email không hợp lệ")
                    return;
                }

                $.ajax({
                    url: URL,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data:data,
                }).done(function (results) {
                    $domForm[0].reset();
                    alert(results.message)
                }).fail(function (results) {
                    console.log(results)
                });
            });
        })
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
</div>
</body>
</html>
